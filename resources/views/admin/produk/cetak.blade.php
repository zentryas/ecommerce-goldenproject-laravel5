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
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Info Produk</th>
                            <th>Supplier</th>
                            <th>Harga Supplier</th>
                            <th>Harga Jual</th>
                            <th colspan="5" class="text-center">Stok Size</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="4">
                                <th>39</th>
                                <th>40</th>
                                <th>41</th>
                                <th>42</th>
                                <th>43</th>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($produk as $data)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>
                            <img src="{{ asset($data->gambar_produk) }}" alt="" height="52">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $data->nama_produk }}</a> 
                                <br>
                                <span class="text-muted font-13">{{ $data->kategori->nama_kategori }}</span> 
                            </p>
                        </td>
                        <td>{{ $data->supplier->nama_supplier }}</td>
                        <td class="text-danger">Rp. {{ number_format($data->harga_supplier) }}</td>
                        <td class="text-success">Rp. {{ number_format($data->harga_jual) }}</td>
                        <td>
                            {{ $data->stok1 }} pcs
                        </td>
                        <td>
                            {{ $data->stok2 }} pcs
                        </td>
                        <td>
                            {{ $data->stok3 }} pcs
                        </td>
                        <td>
                            {{ $data->stok4 }} pcs
                        </td>
                        <td>
                            {{ $data->stok5 }} pcs
                        </td>
                    </tr>

                    @php
                        $no++;
                    @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>