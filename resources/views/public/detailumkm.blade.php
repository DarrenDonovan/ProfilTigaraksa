<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Website Kecamatan Tigaraksa</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/bootstrap.min1.css') }}" rel="stylesheet">
        <link href="{{ url('css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ url('css/aos.css') }}" rel="stylesheet">
        <link href="{{ url('css/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ url('css/style.css') }}" rel="stylesheet">
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <style>
          /* Prevent horizontal scroll */
          html, body {
            overflow-x: hidden;
          }
        
          *, *::before, *::after {
            box-sizing: border-box;
          }
        
          img {
            max-width: 100%;
            height: auto;
            display: block;
          }
        
          /* =======================
             NAVBAR STYLING
          ======================= */
          .navbar {
            position: fixed !important;
            top: -1px;
            left: 0;
            width: 100%;
            background-color: #13357b;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            flex-wrap: nowrap;
          }
        
          .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
          }
        
          .navbar-brand i {
            font-size: 28px;
            color: white;
            display: flex;
            align-items: center;
          }
        
          .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.2;
          }
        
        
          .navbar-brand .subtext {
            font-size: 16px;
            margin: 0;
            color: #f8f9fa;
            opacity: 0.9;
          }
        
          .navbar-toggler {
            border: 1px solid #fff;
            background-color: #13357b;
            padding: 6px 10px;
            border-radius: 6px;
            margin-left: auto;
            z-index: 1050;
          }
        
          .navbar-toggler .fa-bars,
          .navbar-toggler-icon {
            color: white;
            font-size: 20px;
          }
        
          .navbar-collapse {
            justify-content: flex-end;
          }
        
          .navbar-nav {
            align-items: center;
          }
        
          .nav-item {
            height: 100%;
          }
        
          .nav-link {
            color: white;
            padding: 16px 15px;
            display: flex;
            align-items: center;
            height: 100%;
            transition: background-color 0.3s ease;
          }
        
          .nav-link:hover,
          .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            font-weight: 600;
          }
        
          .dropdown-menu {
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
          }
        
          .dropdown-item {
            color: #000;
            padding: 10px 15px;
          }
        
          .dropdown-item:hover {
            background-color: #e6e6e6;
          }
        
          .navbar-brand.scrolled i,
          .navbar-brand.scrolled .kec,
          .navbar-brand.scrolled .subtext {
            color: #13357b !important;
          }
        
          /* =======================
             MAIN LAYOUT
          ======================= */
          .main {
            padding-top: 80px !important;
          }
        
          .container-fluid {
            margin-top: 10px;
            padding: 0 15px;
          }
        
          .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
          }
        
          .article {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
          }
        
          
          /* =======================
             RESPONSIVE STYLES
          ======================= */
          @media (min-width: 2000px) {
            .container-fluid.containerUtama {
              margin-top: 100px;
            }
            .navbar {
                    height: 180px;
                }
                .navbar-brand .fa {
                    padding-right: 15px;
                    font-size: 50px !important;
                    /* border: 2px solid red; */
                }
                .navbar.navbar-expand-lg.navbar-light {
                    height: 180px !important;
                }
                .navbar-brand .m-0{
                    font-size: 50px;
                }
                .navbar-brand .subtext{ 
                    font-size: 30px;
                }
                .navbar-nav {
                   /* border: 2px solid blue; */
                   height: 180px;
                }

                .navbar-nav .nav-item {
                    font-size: 30px !important;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .navbar-nav .nav-item.dropdown .nav-link{
                    font-size: 30px !important;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .dropdown-menu {
                    font-size: 24px;
                }
          }
          @media (max-width: 1441px) {
            .navbar {
                    padding-inline: 30px !important;
                }
                .navbar-brand .m-0 {
                    font-size: 23px;
                }
                .navbar-brand .subtext {
                    font-size: 18px;
                    margin: 0px !important;
                }
                .navbar-brand .fa {
                    font-size: 20px !important;
                }
          }
          @media (max-width: 1025px) {
            .navbar {
                    padding-inline: 30px !important;
                }
                .navbar-brand .m-0 {
                    font-size: 23px;
                }
                .navbar-brand .subtext {
                    font-size: 18px;
                    margin: 0px !important;
                }
                .navbar-brand .fa {
                    font-size: 20px !important;
                    margin-right: 15px !important;
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 20px;
                }
            .col-lg-8,
            .col-lg-4 {
              width: 100%;
            }
          }
          @media (max-width: 992px) {
            .navbar.navbar-expand-lg {
              max-height: 95px;
            }
            .navbar {
              flex-wrap: wrap;
            }
            .kec {
              color: #fff;
            }
            .navbar-collapse {
              width: 100%;
              background-color: #fff;
              padding: 10px 0;
              margin-top: 10px;
              border-radius: 6px;
              box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
        
            .navbar-nav {
              flex-direction: column;
              align-items: flex-start;
              width: 100%;
            }
        
            .nav-link {
              width: 100%;
              color: #002c77 !important;
              padding: 12px 20px;
              text-align: left;
              border-bottom: 1px solid #eee;
            }
        
            .nav-link:hover {
              background-color: #f2f2f2;
            }
        
            .dropdown-menu {
              position: static;
              float: none;
              width: 100%;
              margin: 0;
              border: none;
              border-radius: 0;
              padding: 10px 20px;
              background-color: #f8f9fa;
              box-shadow: none;
            }
        
            .dropdown-item {
              width: 100%;
              padding: 8px 10px;
              color: #000 !important;
            }
        
            .dropdown-item:hover {
              background-color: #e6e6e6;
            }
        
            .dropdown-toggle::after {
              float: right;
              margin-top: 8px;
            }
          }
          @media (max-width: 769px) {
            .navbar-brand .fa { 
                    font-size: 20px !important; /*logo*/
                    margin-right: 15px !important;
                    /* border: 2px solid red; */
                }
                .navbar-brand h1 {
                    font-size: 23px !important;
                    color: #ffff !important;
                }
                .navbar-brand h1 .subtext {
                    font-size: 18px !important;
                    color: #ffff !important;
                    /* border: 2px solid blue; */
                }
                .nav.nav-pills {
                    flex-wrap: nowrap;
                    overflow-x: scroll;
                    max-width: 100%;
                    justify-content: flex-start !important;
                }
            .main {
              padding-top: 60px !important;
            }
        
            .hero-section h1 {
              font-size: 24px;
            }
        
            .hero-section .subtext {
              font-size: 14px;
            }
        
            .p-3 h1 {
              font-size: 22px !important;
              margin: 0 20px;
            }
        
            .p-3 h4 {
              font-size: 16px;
              margin-top: 30px;
            }
        
            .container-fluid {
              padding: 5px;
            }
        
            .navbar-brand .title {
              font-size: 18px;
            }
        
            .navbar-brand .subtext {
              font-size: 13px;
            }
        
            .sidebar {
              display: block;
              width: 100%;
              margin-top: 20px;
            }
        
            .row {
              flex-direction: column;
            }
          }
          @media (max-width: 576px) {
            .main {
              padding-top: 60px !important;
            }
        
            .container,
            .container-fluid {
              padding: 0 10px;
            }
        
            .navbar-brand .title {
              font-size: 16px;
            }
        
            .navbar-brand .subtext {
              font-size: 12px;
            }
          }
          @media (max-width: 469px) {
            .footer {
              padding: 20px 10px;
            }
        
            .footer-item h4,
            .footer-item a,
            .footer-item i {
              font-size: 14px;
            }
        
            .footer .btn-square {
              width: 25px;
              height: 25px;
              font-size: 14px;
              padding: 4px;
            }
        
            .container-fluid.copyright .col-md-6,
            .text-white {
              font-size: 12px;
            }
          }
          @media (max-width: 426px) {
            .navbar-brand .fa { 
                    font-size: 20px !important; /*logo*/
                    margin-right: 15px !important;
                    /* border: 2px solid red; */
                }
                .navbar-brand h1 {
                    font-size: 20px !important;
                    color: #ffff !important;
                }
                .navbar-brand h1 .subtext {
                    font-size: 15px !important;
                    color: #ffff !important;
                    /* border: 2px solid blue; */
                }
                .nav.nav-pills {
                    flex-wrap: nowrap;
                    overflow-x: scroll;
                    max-width: 100%;
                    justify-content: flex-start !important;
                }
            .container-fluid .row {
              flex-direction: column;
            }
        
            .sidebar {
              margin-top: 20px;
            }
          }
          @media (max-width: 376px) {
            .navbar-brand .fa { 
                    font-size: 20px !important; 
                    margin-right: 10px !important;
                } 
                .navbar-brand h1 {
                    font-size: 20px !important;
                    color: #ffff !important;
                }
                .navbar-brand h1 .subtext {
                    font-size: 15px !important;
                    color: #ffff !important;
                }
                .navbar-toggler  {
                    font-size: 15px;
                    padding: 0.3rem 0.6rem !important; 
                    color: #ffff !important;
                    border-color: #ffff !important;
                }
                .collapse {
                    font-size: 20px;
                }

            .search-input {
              font-size: 14px;
            }

            .main {
              padding-top: 65px !important;
            }

            .footer-item h4,
            .footer-item a,
            .footer-item i {
              font-size: 12px;
            }

            .footer .btn-square {
              width: 22px;
              height: 22px;
              font-size: 12px;
              padding: 3px;
            }

            .meta-top ul li,
            .meta-bottom,
            .meta-list a {
              font-size: 12px;
            }

            .container,
            .container-fluid {
              padding: 0 8px;
            }
          }
          @media (max-width: 321px) {
            .navbar.navbar-expand-lg {
              padding: 16px 20px !important;
            }
            .navbar-brand .fa { 
                      font-size: 20px !important; 
                      margin-right: 10px !important;
                  }
                  .navbar-brand h1 {
                      font-size: 15px !important;
                      color: #ffff !important;
                  }
                  .navbar-brand h1 .subtext {
                      font-size: 13px !important;
                      color: #ffff !important;
                  }
                  .navbar-toggler  {
                      font-size: 13px;
                      padding: 0.3rem 0.6rem !important; 
                      color: #ffff !important;
                      border-color: #ffff !important;
                  }
                  .collapse {
                      font-size: 20px;
                  }

            .nav-link,
            .dropdown-item {
              font-size: 13px;
              padding: 10px 14px;
            }

            .main {
              padding-top: 60px !important;
            }

            .p-3 h1 {
              font-size: 18px !important;
            }

            .p-3 h4 {
              font-size: 14px;
            }

            .footer-item h4,
            .footer-item a,
            .footer-item i {
              font-size: 11px;
            }

            .text-white {
              font-size: 11px;
            }
          }
        </style> 

    </head>

    <body class="single-post-page">
        <header>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="m-0 d-flex align-items-center">
                      <i class="fa fa-map-marker-alt me-2"></i>
                      <div class="kec" style="text-align: left;"> Kecamatan Tigaraksa<br> <span class="subtext">Kabupaten Tangerang</span></div>
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('about') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ url('infografis') }}" class="nav-item nav-link">Infografis</a>
                        <a href="{{ url('maps') }}" class="nav-item nav-link">Maps</a>
                        <a href="{{ url('berita') }}" class="nav-item nav-link">Berita</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile Desa</a>
                            <div class="dropdown-menu m-0">
                                @foreach ($wilayahNoKec as $item)
                                <a href="{{ url('profildesa/' . $item->id_wilayah) }}" class="dropdown-item">{{ $item->nama_wilayah }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </nav>

  <main class="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-12">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">
              <article class="article">
                <div class="post-img">
                    <div id="map" style="height:400px"></div>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                      @foreach($dokumentasi_umkm as $itemDokumentasi)
                      <div style="width: 297px; height: 197px; overflow: hidden;">
                          <img src="{{ asset('storage/' . $itemDokumentasi->gambar) }}" 
                               class="img-fluid w-100 h-100" 
                               style="object-fit: cover;" 
                               alt="">
                      </div>
                      @endforeach
                    </div>
                </div>
              <h2 class="title mt-4">{{ $detailumkm->nama_umkm }}</h2>
              <img src="{{ asset('storage/' . $detailumkm->gambar_umkm) }}" class="d-flex d-inline-flex mt-1 mb-3" width="350" height="250" alt=""> 
                <div class="meta-top d-flex d-inline">
                  <img src="{{ url('img/location-icon.svg') }}" alt="" width="23" height="23" style="margin-right: 8px">
                  <h5>{{ $detailumkm->alamat }}</h5>
                </div>
                <div class="content mt-6 mb-6">
                    <p>{!! $detailumkm->keterangan !!}</p>
                </div><!-- End post content -->
              </article>
            </div>
          </section><!-- /Blog Details Section -->


        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item card p-3 border rounded">
                <h3 class="widget-title mb-3">Tempat Lainnya</h3>
                @foreach($umkmlain as $itemUmkmLain)
                <div class="post-item d-flex border-bottom pb-2 mb-2">
                    <img src="{{ asset('storage/' . $itemUmkmLain->gambar_umkm) }}" alt="" class="flex-shrink-0 me-2 rounded" width="60" height="60">
                    <div>
                        <h4 class="h6 mb-1"><a href="{{ url('profildesa/' . $itemUmkmLain->id_wilayah . '/detailumkm/' . $itemUmkmLain->id_umkm) }}">{{ $itemUmkmLain->nama_umkm }}</a></h4>
                    </div>
                </div>

                @endforeach
            </div>

          </div>

        </div>

      </div>
    </div>

  </main>

   <!-- Footer Start -->
   <div class="container-fluid footer py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Hubungi Kami</h4>
                    <a href=""><i class="fas fa-home me-2"></i> Tangerang, Banten, Indonesia</a>
                    <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                    <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                    <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-share fa-2x text-white me-2"></i>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright text-body py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-end mb-md-0">
                <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Site Name</a>, All right reserved.
            </div>
            <div class="col-md-6 text-center text-md-start">
                <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                Designed By <a class="text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   


    
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Template Javascript -->
    <script src="{{ url('js/main.js') }}"></script>
    <script>
		// Pastikan script hanya berjalan jika elemen dengan ID "map" ada
		let currentmarker;
		
		var map = L.map("map").setView([
			{!! json_encode($detailumkm->latitude) !!},
			{!! json_encode($detailumkm->longitude) !!}
		], 15);
		
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '© OpenStreetMap contributors'
		}).addTo(map);
		
		currentmarker = L.marker([
			{!! json_encode($detailumkm->latitude) !!},
			{!! json_encode($detailumkm->longitude) !!}
		]).addTo(map);
				
		</script>
</body>

</html>