<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Diva Sofa</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{ asset('assets/test/css/bootstrap.min.css') }}">
   <!-- style css -->
   <link rel="stylesheet" href="{{ asset('assets/test/css/style.css') }}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{ asset('assets/test/css/responsive.css') }}">
   <!-- fevicon -->
   <link rel="icon" href="{{ asset('assets/test/images/fevicon.png') }}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{ asset('assets/test/css/jquery.mCustomScrollbar.min.css') }}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout position_head">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{ asset('assets/test/images/loading.gif') }}" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html"><img src="{{ asset('assets/test/images/logo.png') }}" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item ">
                              <a class="nav-link {{ Route::currentRouteName() == 'produk' ? 'active' : '' }}"
                                 href="{{route('produk')}}">Produk</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ Route::currentRouteName() == 'keranjang' ? 'active' : '' }}"
                                 href="{{route('keranjang')}}">Keranjang</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ Route::currentRouteName() == 'pesanan' ? 'active' : '' }}"
                                 href="{{route('pesanan')}}">Pesanan</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ Route::currentRouteName() == 'voucher' ? 'active' : '' }}"
                                 href="{{route('voucher')}}">Voucher</a>
                           </li>
                           <li class="nav-item d_none login_btn">
                              <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                 @csrf
                                 <a class="nav-link" href="#" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                              </form>
                           </li>

                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   @yield('content')
   <!-- end Our  Glasses section -->
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Soekarno-Hatta</li>
                     <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +62853 1239 3213</li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> divasofa@gmail.com</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <script src="{{ asset('assets/test/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/test/js/popper.min.js') }}"></script>
   <script src="{{ asset('assets/test/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/test/js/jquery-3.0.0.min.js') }}"></script>
   <!-- sidebar -->
   <script src="{{ asset('assets/test/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
   <script src="{{ asset('assets/test/js/custom.js') }}"></script>
</body>

</html>