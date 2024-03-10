<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pembayaran;
use App\Pesanan;
use App\PesananDetail;
use App\Produk;
use \Midtrans\Config;
use \Midtrans\Snap;
use \Midtrans\Notification;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
    protected $response;
 
    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
      
        $this->request = $request;
 
       \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
       \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
       \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
       \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    /**
     * Submit pembayaran.
     *
     * @return array
     */
    public function bayarkan()
    {
        DB::transaction(function(){
            // Save donasi ke database
            $tanggal_pembayaran = Carbon::now();
            $pesanan = Pesanan::where('id', $this->request->pesanan_id)->first();
            $pesanan->provinsi_id    = $this->request->province_destination;
            $pesanan->kota_id        = $this->request->city_destination;
            $pesanan->kurir_id       = $this->request->courier_id;
            $pesanan->biaya_ongkir   = $this->request->harga_paket;
            $pesanan->kurir          = $this->request->kurir;
            $pesanan->berat          = $this->request->weight;
            $pesanan->paket_kurir    = $this->request->tipe_paket;
            $pesanan->estimasi       = $this->request->durasi_kirim;
            $pesanan->alamat_kirim   = $this->request->alamat_kirim;
            $pesanan->status_pesanan = 2;
            $pesanan->update();

            $pesanan_details = PesananDetail::where('pesanan_id', $this->request->pesanan_id)->get();
            foreach ($pesanan_details as $pesanan_detail) 
            {
                $produk       = Produk::where('id', $pesanan_detail->produk_id)->first();
                $ada          = $pesanan_detail->ukuran;
                $produk->$ada = $produk->$ada-$pesanan_detail->jumlah;//pengurangan produk
                $produk->update();
            }

            $pembayaran = Pembayaran::create([
                'pesanan_id' => $this->request->pesanan_id,
                'total_pembayaran' => floatval($this->request->total_pembayaran),
            ]);
 
            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $pembayaran->id,
                    'gross_amount'  => $pembayaran->total_pembayaran,
                ],
                'customer_details' => [
                    'first_name'    => $pembayaran->pesanan->pelanggan->name,
                    'email'         => $pembayaran->pesanan->pelanggan->email,
                    'phone'         => $pembayaran->pesanan->pelanggan->no_hp,
                    // 'address'       => '',
                ],
                'item_details' => [
                    [
                        'id'       => $pembayaran->id,
                        'price'    => $pembayaran->total_pembayaran,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $pembayaran->pesanan->kode_pesanan))
                    ]
                ]
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $pembayaran->snap_token = $snapToken;
            $pembayaran->save();
 
            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });
 
        return response()->json($this->response);
    }
 
    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new \Midtrans\Notification();
        DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $pembayaran = Pembayaran::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $pembayaran->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $pembayaran->setPending();
                $pesanan = Pesanan::find($pembayaran->pesanan_id)->update([
                  'status_pesanan'=>'2'
                ]);
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $pembayaran->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $pembayaran->setSuccess();
                $pesanan = Pesanan::find($pembayaran->pesanan_id)->update([
                  'status_pesanan'=>'3'
                ]);
                $pesananDetail = PesananDetail::where('pesanan_id', $pembayaran->pesanan_id)->get();
                foreach ($pesananDetail as $data) {
                  $produk = Produk::where('id', $data->produk_id)->first();
                  $hitung = $produk[$data->ukuran] - $data->jumlah_beli;
                  $produk->update([
                    $data->ukuran => $hitung
                  ]);
                }
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            // TODO set payment status in merchant's database to 'Settlement'
            // $pembayaran->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $pembayaran->setSuccess();
            $pesanan = Pesanan::find($pembayaran->pesanan_id)->update([
              'status_pesanan'=>'3'
            ]);
            $pesananDetail = PesananDetail::where('pesanan_id', $pembayaran->pesanan_id)->get();
            foreach ($pesananDetail as $data) {
              $produk = Produk::where('id', $data->produk_id)->first();
              $hitung = $produk[$data->ukuran] - $data->jumlah_beli;
              $produk->update([
                $data->ukuran => $hitung
              ]);
            }
 
          } elseif($transaction == 'pending'){
 
            // TODO set payment status in merchant's database to 'Pending'
            // $pembayaran->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $pembayaran->setPending();
            $pesanan = Pesanan::find($pembayaran->pesanan_id)->update([
              'status_pesanan'=>'2'
            ]);
 
          } elseif ($transaction == 'deny') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $pembayaran->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $pembayaran->setFailed();
 
          } elseif ($transaction == 'expire') {
 
            // TODO set payment status in merchant's database to 'expire'
            // $pembayaran->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $pembayaran->setExpired();
            $pesanan = Pesanan::find($pembayaran->pesanan_id)->update([
              'status_pesanan'=>'6'
            ]);
 
          } elseif ($transaction == 'cancel') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $pembayaran->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $pembayaran->setFailed();
 
          }
 
        });
 
        return;
    }
}
