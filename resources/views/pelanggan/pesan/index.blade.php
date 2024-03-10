@extends('layouts.app')
@section('title','Tentukan Ukuran & Jumlah')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <div class="how-it-works d-flex mt-3">
                <div class="step1">
                    <span class="number"><span>1</span></span>
                    <span class="caption" style="font-size: 12px;">Login </span>
                </div>
                <div class="step1">
                    <span class="number"><span>2</span></span>
                    <span class="caption" style="font-size: 12px;">Pilih Produk</span>
                </div>
                <div class="step">
                    <span class="number"><span>3</span></span>
                    <span class="caption" style="font-size: 12px;">Tentukan Ukuran & Jumlah</span>
                </div>
                <div class="step">
                    <span class="number"><span>4</span></span>
                    <span class="caption" style="font-size: 12px;">Keranjang</span>
                </div>
                <div class="step">
                    <span class="number"><span>5</span></span>
                    <span class="caption" style="font-size: 12px;">Checkout</span>
                </div>
                <div class="step">
                    <span class="number"><span>6</span></span>
                    <span class="caption" style="font-size: 12px;">Pembayaran</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img class="pt-3 pb-3" src="{{ asset($produk->gambar_produk) }}" alt="" style="width:50%;">
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{ $produk->nama_produk }}</h2>
                <h1 class="text-success">Rp. {{ number_format($produk->harga_jual) }}</h1>
                <p>Deskripsi: {{ $produk->deskripsi }} <br> Kategori: {{ $produk->kategori->nama_kategori }}</p>

                <table class="table table-bordered text-center" style="font-size: 12px;">
                    <tr>
                        <th>39</th>
                        <th>40</th>
                        <th>41</th>
                        <th>42</th>
                        <th>43</th>
                    </tr>
                    <tr>
                        <td>{{ $produk->stok1 }}</td>
                        <td>{{ $produk->stok2 }}</td>
                        <td>{{ $produk->stok3 }}</td>
                        <td>{{ $produk->stok4 }}</td>
                        <td>{{ $produk->stok5 }}</td>
                    </tr>
                </table>

                <form action="/masukan-keranjang/{{ $produk->id }}" method="POST">
                @csrf
                    <div class="fw-size-choose">
                        <p>Ukuran</p>
                        <div class="sc-item">
                            <input type="radio" name="ukuran" id="stok1" value="stok1">
                            39
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="ukuran" id="stok2" value="stok2">
                            40
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="ukuran" id="stok3" value="stok3">
                            41
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="ukuran" id="stok4" value="stok4">
                            42
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="ukuran" id="stok5" value="stok5">
                            43
                        </div>
                    </div>
                    <div class="quantity">
                        <p>Jumlah Pesanan</p>
                        <div class="pro-qty"><input type="text" name="jumlah_beli" value="1"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-5 mt-5"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>   
                </form>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->

@stop