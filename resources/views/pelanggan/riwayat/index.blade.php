@extends('layouts.app')
@section('title','Riwayat Pesanan')
@section('content')
<div class="container-fluid mb-5 mt-5">
	<div class="row">
		<div class="col-lg-12 px-5">
			<h5>Halaman Riwayat Transaksi Anda</h5>
			<div class="table-responsive mt-3">
				<table class="table table-bordered text-center">
					<tr>
						<th>No</th>
						<th>Tanggal Pesanan</th>
						<th>Kode Pesanan</th>
						<th>Status Pesanan</th>
						<th>Harga Belanja</th>
						<th>Aksi</th>
					</tr>
					<tbody>
						<?php $no = 1; ?>
						@foreach($pesanans as $pesanan)
						<tr> 
							<td align="center">{{ $no++ }}</td>
							<td align="center">{{ date("d/m/Y", strtotime($pesanan->tgl_pesanan)) }}</td>
							<td>{{ $pesanan->kode_pesanan }}</td>
							<td align="center">
								@if($pesanan->status_pesanan == 1)
									Belum Checkout
								@elseif($pesanan->status_pesanan == 2)
									Sudah mendapat nomor rekening & belum bayar
								@elseif($pesanan->status_pesanan == 3)
									Sudah bayar & pesanan sedang dikemas
								@elseif($pesanan->status_pesanan == 4)
									Sedang dikirim dengan no resi {{ $pesanan->nomor_resi }}
								@elseif($pesanan->status_pesanan == 5)
									Produk sudah sampai dengan no resi {{ $pesanan->nomor_resi }}
								@elseif($pesanan->status_pesanan == 6)
									Pesanan dibatalkan @if($pesanan->kurir == NULL) oleh pelanggan. @else oleh sistem. @endif
								@endif
							</td>
							<td align="center">Rp. {{ number_format($pesanan->total_harga) }}</td>
							<td align="center">
								@if($pesanan->status_pesanan == 1)
									<a href="/keranjang/checkout_detail/{{ $pesanan->id }}" class="btn btn-warning btn-sm"><i class="flaticon-bag"></i> Lanjutkan Checkout</a>
								@else($pesanan->status_pesanan == 2)
								    @if($pesanan->kurir == NULL)
								        <button class="btn btn-danger btn-sm">Dibatalkan</button>
								    @else
									    <a href="/riwayat/pesanan/{{ $pesanan->id }}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i> Rincian</a>
								    @endif
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop
