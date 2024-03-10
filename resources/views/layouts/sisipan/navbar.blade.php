
<ul class="list-unstyled topbar-nav float-right mb-0"> 
    <li class="dropdown">
        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset('crovex') }}/images/logo-new.png" alt="profile-user" class="rounded-circle" /> 
            <span class="ml-1 nav-user-name hidden-sm">Hi, {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- <a class="dropdown-item" href="{{ route('admin.profile', Auth::user()->id ) }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
            <a class="dropdown-item" href="{{ route('admin.ganti', Auth::user()->id ) }}"><i class="ti-lock text-muted mr-2"></i> Ganti Password</a>
            <div class="dropdown-divider mb-0"></div> -->
            <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ti-power-off text-muted mr-2"></i> Logout</a>
        </div>
    </li>
</ul><!--end topbar-nav-->

<ul class="list-unstyled topbar-nav mb-0">                        
    <li>
        <button class="nav-link button-menu-mobile waves-effect waves-light">
            <i class="ti-menu nav-icon"></i>
        </button>
    </li>
    {{-- <li class="hide-phone app-search">
        <form role="search" class="">
            <input type="text" id="AllCompo" placeholder="Search..." class="form-control">
            <a href=""><i class="fas fa-search"></i></a>
        </form>
    </li> --}}
</ul>
            