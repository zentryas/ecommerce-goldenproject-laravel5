<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Golden Face Store | Cetak Laporan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body onload="window.print();" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center py-3">
                <img src="{{ asset('crovex/images/logo-new.png')}}" alt="logo" width="100"> <br>
                Alamat : Gg. Megatruh, Karang Wuni, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 <br>
                Nomor HP : 081335884919
            </div>
        </div>
        <hr style="border: 2px solid #000;">
        <div class="row">
            <div class="col-lg-12">
                <strong>Laporan Transaksi Rentang Tanggal</strong> <br>
                 Tanggal Mulai {{ date("d/m/Y", strtotime($tgl_mulai)) }} <br>
                 Tanggal Selesai {{ date("d/m/Y", strtotime($tgl_selesai)) }} <br>
                <table class="table table-bordered mt-3">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Kode Pesanan</th>
                        <th>Nama Pembeli</th>
                        <th>Harga Ongkir</th>
                        <th>Harga Belanja</th>
                        <th>Sub Total</th>
                    </tr>
                    <tbody>
                        @php
                            $no = 1;
                            $harga_total = 0;
                        @endphp
                        @foreach ($pembayaran as $data)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ date("d/m/Y", strtotime($data->tgl_pesanan)) }}</td>
                            <td>{{ $data->kode_pesanan }}</td>
                            <td>{{ $data->pelanggan->name }}</td>
                            <td>Rp. {{ number_format($data->biaya_ongkir) }}</td>
                            <td>Rp. {{ number_format($data->total_harga) }}</td>
                            <td>Rp. {{ number_format($data->biaya_ongkir+$data->total_harga) }}</td>
                        </tr>
                        @php
                            $no++;
                            $harga_total += $data->biaya_ongkir+$data->total_harga;
                        @endphp
                        @endforeach
                        <tr>
                            <th colspan="6" class="text-center">Total Pemasukan dari tanggal {{ date("d/m/Y", strtotime($tgl_mulai)) }} sampai tanggal {{ date("d/m/Y", strtotime($tgl_selesai)) }}</th>
                            <td>Rp. {{ number_format($harga_total) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>