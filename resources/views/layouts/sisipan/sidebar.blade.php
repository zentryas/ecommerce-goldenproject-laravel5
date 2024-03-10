<ul class="metismenu left-sidenav-menu">
    <li>
        <a href="/admin"><i class="ti-bar-chart"></i><span>Dashboard</span></a>
    </li>

    <li>
        <a href="{{ route('admin.customer') }}"><i class="ti-user"></i><span>Info Pelanggan</span></a>
    </li>

    <li>
        <a href="javascript: void(0);"><i class="ti-layout-media-center-alt"></i><span>Master Data</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.kategori') }}"><i class="ti-control-record"></i>Kategori</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.supplier') }}"><i class="ti-control-record"></i>Supplier</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.produk') }}"><i class="ti-control-record"></i>Produk</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript: void(0);"><i class="ti-stats-up"></i><span>Transaksi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.pesanan') }}"><i class="ti-control-record"></i>Menunggu Pembayaran</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.sudah-dibayar') }}"><i class="ti-control-record"></i>Sudah dibayar</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.sudah-dikirim') }}"><i class="ti-control-record"></i>Paket dikirim</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.selesai') }}"><i class="ti-control-record"></i>Selesai</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.batal') }}"><i class="ti-control-record"></i>Batal</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript: void(0);"><i class="ti-write"></i><span>Cetak Laporan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="ti-control-record"></i>Transaksi selesai</a></li>
        </ul>
    </li>
</ul>