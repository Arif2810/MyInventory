<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Inventory System</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <strong>Inventory System</strong>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else 
                                <li><a href="{{ url('/product')}}"><!-- <i class="fa fa-tags"></i> --><span class="glyphicon glyphicon-tags"></span> Product</a></li>
                                <li><a href="{{ url('/purchase')}}"><i class="fa fa-truck"></i> Pembelian</a></li>
                                <li><a href="{{ url('/sell')}}"><span class="glyphicon glyphicon-shopping-cart"></span><strong> Penjualan</strong></a></li> 

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-asterisk"></span> Lain - Lain<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/category') }}"><i class="glyphicon glyphicon-menu-right"></i> Kategori</a></li>
                                        <li><a href="{{ url('/supplier') }}"><i class="glyphicon glyphicon-menu-right"></i> Supplier</a></li>
                                        <li><a href="{{ url('/customer') }}"><i class="glyphicon glyphicon-menu-right"></i> Konsumen</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-tasks"></span> Laporan<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('purchase.report') }}"><i class="fa fa-angle-right"></i> Laporan Pembelian</a></li>
                                        <li><a href="{{ route('sell.report') }}"><i class="fa fa-angle-right"></i> Laporan Penjualan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                        <span class="glyphicon glyphicon-cog"></span> Pengaturan<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/setting/user') }}"><i class="glyphicon glyphicon-menu-right"></i> Pengaturan User</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="page-footer font-smalls">

          <!-- Copyright -->
          <div class="footer-copyright text-center" style="padding-top: 50px"> 
            &copy; 2018 Inventory System by Arif Rusman | Universitas Muhammadiyah Riau 
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('bootstrap/js/jquery-3.3.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
        <<!-- script src="{{  asset('js/bootbox.min.js') }}"></script> -->

    </body>
</html>
