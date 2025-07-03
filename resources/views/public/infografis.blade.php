<!-- HARUS DIUPDATE -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Infografis Kecamatan Tigaraksa</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

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

        <!-- Template Stylesheet -->
        <link href="{{ url('css/style.css') }}" rel="stylesheet">

    <style>
            .navbar {
                position: fixed !important; /* Pastikan navbar tetap fixed */
                top: -1px;
                left: 0;
                width: 100%;
                /* border: 2px solid red;  */
                height: fit-content;
            }
            .navbar-brand .m-0 {
                font-size: 28px;
            }
            .subtext {
                margin: 0px;
            }
            .kec {
                /* border: 2px solid red; */
                margin-left: 6px;
            }
            .dropdown-menu {
                max-height: 250px;
                overflow-y: auto;
                overflow-x: hidden;
                scroll-behavior: smooth;
            }
            .teks-mobile {
                margin-top: 15px;
            }
            @media (min-width: 310px) and (max-width: 469px) {
            /* FOOTER */
            .footer-item h4 {
                    /* border: 2px solid red; */
                    font-size: 16px; /* Mengecilkan ukuran heading */
                }

                .footer-item a {
                    /* border: 2px solid red; */
                    font-size: 14px; /* Mengecilkan ukuran teks */
                }

                .footer-item i {
                    font-size: 14px; /* Mengecilkan ikon */
                }

                .footer .btn-square {
                    /* border: 2px solid red; */
                    width: 25px !important; /* Mengecilkan tombol sosial media */
                    height: 25px;
                    font-size: 14px;
                    padding: 4px;
                }
                /* COPYRIGHT */
                .container-fluid.copyright .container .col-md-6 {
                    font-size: 12px;
                }
                .container-fluid.copyright .container .col-md-6 i, .text-white {
                    font-size: 12px;
                }
            }
            @media (max-width: 321px){
                /* NAVBAR */
                .mx-auto h5 {
                    font-size: 13px !important;
                }
                .mx-auto h1 {
                    font-size: 18px !important;
                }
                .teks-mobile {
                    font-size: 13px;
                }
                /* NAVBAR */
                .navbar-brand .fa { 
                    font-size: 17px !important; 
                    margin-right: 5px !important;
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

                /* HERO */
                .container-fluid.bg-breadcrumb {
                    height: 60% !important;
                }
                .descriptionGrap {
                    display: none;
                }
                .row.g-4 {
                    /* border: 2px solid blue; */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .col-12 {
                    /* border: 2px solid black; */
                    /* width: 90% !important; */
                    height: 80px;
                }
                .col-12 .service-content-inner.d-flex.align-items-center {
                    /* border: 2px solid red !important; */
                    /* padding: 2px; */
                    height: 100%;
                }
                .service-content h5{
                    margin: 0px !important;
                }
                .service-content .mb-4 {
                    font-size: 15px;
                }
                .service-icon .fa {
                    font-size: 35px;
                }


            }
            @media (min-width: 322px) and (max-width: 380px) {
                /* NAVBAR */
                .mx-auto h5 {
                    font-size: 13px !important;
                }
                .mx-auto h1 {
                    font-size: 19px !important;
                }
                .teks-mobile {
                    font-size: 13px;
                }
                .navbar-brand .fa { 
                    font-size: 20px !important; /*logo*/
                    margin-right: 5px !important;
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

                .descriptionGrap {
                    display: none;
                }
                .row.g-4 {
                    /* border: 2px solid blue; */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .col-12 {
                    /* border: 2px solid black; */
                    width: 90% !important;
                    height: 80px;
                }
                .col-12 .service-content-inner.d-flex.align-items-center {
                    /* border: 2px solid red !important; */
                    padding: 2px;
                    height: 100%;
                }
                .service-content h5{
                    margin: 0px !important;
                }
                .service-content .mb-4 {
                    font-size: 15px;
                }
                .service-icon .fa {
                    font-size: 35px;
                }
                .mx-auto.text-center.mb-5 h5 {
                    font-size: 13px;
                }
                .mx-auto h1 {
                    font-size: 19px;
                } 

                /* FOOTER */
                .footer {
                    padding: 20px 10px; /* Mengurangi padding agar lebih pas */
                }

                .footer-item h4 {
                    font-size: 16px; /* Mengecilkan ukuran heading */
                }
                .footer-item a {
                    font-size: 14px; /* Mengecilkan ukuran teks */
                }

                .footer-item i {
                    font-size: 14px; /* Mengecilkan ikon */
                }

                .footer .btn-square {
                    width: 28px; /* Mengecilkan tombol sosial media */
                    height: 28px;
                    font-size: 12px;
                    padding: 4px;
                }
                /* COPYRIGHT */
                .container-fluid.copyright .container .col-md-6 {
                    font-size: 12px;
                }
                .container-fluid.copyright .container .col-md-6 i, .text-white {
                    font-size: 12px;
                }
            }

            @media (min-width: 381px) and (max-width: 426px) {
                .mx-auto.text-center.mb-5 h5 {
                    font-size: 13px !important;
                }
                .mx-auto h1 {
                    font-size: 19px !important;
                }   
                .teks-mobile {
                    font-size: 13px;
                }
                .navbar-brand .fa { 
                    font-size: 20px !important; /*logo*/
                    margin-right: 5px !important;
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
                .col-12.col-sm-6 {
                    width: 300px;
                    margin-left: 40px;
                }
                .descriptionGrap {
                    display: none;
                }
                .row.g-4 {
                    /* border: 2px solid blue; */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .col-12 {
                    /* border: 2px solid black; */
                    width: 90% !important;
                    height: 80px;
                }
                .col-12 .service-content-inner.d-flex.align-items-center {
                    /* border: 2px solid red !important; */
                    padding: 2px;
                    height: 100%;
                    margin: 0px;
                }
                .service-content {
                    margin: 0px;
                }
                .service-content h5{
                    margin: 0px !important;
                }
                .service-content .mb-4 {
                    font-size: 15px;
                }
                .service-icon .fa {
                    font-size: 35px;
                }
            }
            @media (max-width: 576px) {
                .bg-breadcrumb h3 {
                    font-size: 2rem !important;
                }
            }
            @media (min-width: 427px) and (max-width: 769px){
                /* NAVBAR */
                .mx-auto h5 {
                    font-size: 18px;
                }
                .mx-auto h1 {
                    font-size: 23px;
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
                .container h3 {
                    font-size: 35px !important;
                }
            }
            @media (max-width: 992px) {
                .navbar-toggler.scrolled {
                    color: #13357b !important;
                    border-color: #13357b !important;
                }

                .navbar-brand h1.scrolled {
                    color: #13357b !important;
                    border-color: #13357b !important;
                }

                .navbar-brand h1 .subtext.scrolled {
                    color: #13357b !important;
                    border-color: #13357b !important;
                    
                }
                .navbar-nav {
                    background-color: #ffff;
                    padding: 10px;
                    border-radius: 5px;
                }
                .navbar-brand h1 {
                    color: #ffff !important;
                }
                .navbar-toggler  {
                    color: #ffff !important;
                    border-color: #ffff !important;
                }
            }
            @media screen and (max-width: 1025px){
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
                .text-white.display-3 {
                    font-size: 35px;
                }
                .mx-auto h5 {
                    font-size: 16px;
                }
                .mx-auto h1 {
                    font-size: 25px;
                }
            }
            @media (min-width: 770) and (max-width: 1024px) {
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
                
                /* FOOTER */
                .footer {
                    /* border: 2px solid blue; */
                    padding: 20px 615px; /* Mengurangi padding agar lebih pas */
                }
                .footer-item {
                    width: 500px;
                    gap: 20px;
                }
                .footer-item h4 {
                    font-size: 35px; /* Mengecilkan ukuran heading */
                }
                .footer-item a {
                    font-size: 30px; /* Mengecilkan ukuran teks */
                    text-wrap: nowrap;

                }
                .footer-item i {
                    font-size: 35px; /* Mengecilkan ikon */
                }
                .footer .btn-square {
                    width: 60px; /* Mengecilkan tombol sosial media */
                    height: 60px;
                    font-size: 40px;
                    padding: 4px;
                }
            }
            @media (min-width: 1026px) and (max-width: 1442px) {
                .text-white.display-3 {
                    font-size: 40px;
                }
                .mx-auto h5 {
                    font-size: 20px !important;
                }
                .mx-auto h1 {
                    font-size: 35px;
                }
            }
            @media  (min-width: 2000px) {
                .text-white.display-3 {
                    font-size: 80px;
                }
                .mx-auto h5 {
                    font-size: 35px !important;
                }
                .mx-auto h1 {
                    font-size: 50px;
                }
                .teks-mobile {
                    font-size: 25px;
                }
                /* NAVBAR */
                .navbar {
                    height: 180px;
                }
                .navbar.navbar-expand-lg.navbar-light {
                    height: 180px !important;
                }
                .navbar-brand .m-0{
                    font-size: 50px;
                }
                .navbar-brand .subtext{ 
                    font-size: 30px;
                   /* border: 2px solid blue; */

                }
                .navbar-brand .fa {
                    font-size: 50px !important;
                    padding-right: 15px;
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
                .container-fluid.grafik {
                    /* border: 2px solid red; */
                    height: 1000px;
                }
                .service-content {
                    height: 250px;
                    padding: 30px;
                }
                .service-content h5 {
                    font-size: 35px;
                }
                .service-content p {
                    font-size: 25px;
                }
                /* FOOTER */
                .footer {
                    /* border: 2px solid blue; */
                    padding: 20px 615px; /* Mengurangi padding agar lebih pas */
                }
                .footer-item {
                    width: 500px;
                    gap: 20px;
                }
                .footer-item h4 {
                    font-size: 35px; /* Mengecilkan ukuran heading */
                }
                .footer-item a {
                    font-size: 30px; /* Mengecilkan ukuran teks */
                    text-wrap: nowrap;

                }
                .footer-item i {
                    font-size: 35px; /* Mengecilkan ikon */
                }
                .footer .btn-square {
                    width: 60px; /* Mengecilkan tombol sosial media */
                    height: 60px;
                    font-size: 40px;
                    padding: 4px;
                }
            } 
            
            
            
    </style>

    </head>

    <body>

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
                        <a href="{{ url('infografis') }}" class="nav-item nav-link active">Infografis</a>
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
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Infografis</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="mx-auto text-center mt-5 mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Demografi</h5>
                <h1 class="mb-0">Penduduk</h1>
            </div>
            <div class="container-fluid grafik" style="display: flex; justify-content: center; align-items: center;">
                <div class="row g-4" style="width: 80%;">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <a href="#jumlah-penduduk" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0" style="display: flex; justify-content: flex-end; align-items: flex-end;">
                                    <div class="service-content text-end" >
                                        <h5 class="mb-4">Jumlah Penduduk dan Kepala Keluarga</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-12">
                                <a href="#berdasarkan-jenis_kelamin" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0" style="display: flex; justify-content: flex-end; align-items: flex-end;">
                                    <div class="service-content text-end" >
                                        <h5 class="mb-4">Berdasarkan Jenis Kelamin</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12">
                                <a href="#berdasarkan-umur" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0" style="display: flex; justify-content: flex-end; align-items: flex-end;">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Berdasarkan Kelompok Umur</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <a href="#berdasarkan-pekerjaan" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Berdasarkan Pekerjaan</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="#berdasarkan-agama" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Berdasarkan Agama</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="#berdasarkan-pendidikan" class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Berdasarkan Pendidikan</h5>
                                        <p class="mb-0 descriptionGrap">
                                            Deskripsi max 30 kata
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

        <!-- Jumlah penduduk dan kepala keluarga -->
        <div class="container-fluid testimonia py-5l" id="jumlah-penduduk">
            <div class="container py-5">
                <div class="container-fluid testimonial py-5">
                    <div class="container py-5">
                        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                            <h1 class="mb-0" >Jumlah Penduduk per Wilayah</h1>
                            <div>
                              <canvas id="Chart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

         <!--  Berdasarkan Jenis Kelamin-->
        <div class="container-fluid testimonial py-5" id="berdasarkan-jenis_kelamin">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                    <h1 class="mb-0">Berdasarkan Jenis Kelamin</h1>
                    <div>
                      <canvas id="Chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

        <!-- Berdasarkan kelompok umur  -->
        <div class="container-fluid testimonialpy-5" id="berdasarkan-umur">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 600px;">
                    <h1 class="mb-0">Berdasarkan Kelompok Umur</h1>
                    <div>
                      <canvas id="Chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

         <!-- Berdasarkan pekerjaan  -->
         <div class="container-fluid testimonial py-5" id="berdasarkan-pekerjaan">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h1 class="mb-0">Berdasarkan Pekerjaan</h1>
                    <div>
                      <canvas id="Chart4"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

        <!-- Berdasarkan agama  -->
        <div class="container-fluid testimonial py-5" id="berdasarkan-agama">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h1 class="mb-0">Berdasarkan Agama</h1>
                    <div>
                      <canvas id="Chart5"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

        <!-- Berdasarkan pendidikan  -->
        <div class="container-fluid testimonial py-5" id="berdasarkan-pendidikan">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h1 class="mb-0">Berdasarkan Pendidikan</h1>
                    <div>
                      <canvas id="Chart6"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->


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
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Your Site Name</a>, All right reserved.
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
        <script src="{{ url('lib/easing/easing.min.js') }}"></script>
        <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ url('lib/lightbox/js/lightbox.min.js') }}"></script>
        
        <!-- Template Javascript -->
        <script src="{{ url('js/main.js') }}"></script>

        <script>
          const ctx1 = document.getElementById('Chart1');
          new Chart(ctx1, {
            type: 'bar',
            data: {
              labels: {!! json_encode($jumlah_penduduk->pluck('nama_wilayah')) !!},
              datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($jumlah_penduduk->pluck('jumlah_penduduk')) !!},
                borderWidth: 1,
                datalabels: {
                    anchor:'end',
                    align:'top',
                    offset: 5
                },
              }]
            },
            plugins: [ChartDataLabels],
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              plugins: {
                datalabels: {
                    formatter: function (value) {
                        return value.toLocaleString(); 
                        }
                    }
                }
            }
          });


          const ctx2 = document.getElementById('Chart2');
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: {!! json_encode(array_values($rasio_jenis_kelamin)) !!}, 
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        datalabels: {
                            color: 'black'
                        }
                    }]
                },
                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        datalabels: {
                            formatter: function (value) {
                                return value.toLocaleString();
                            },
                            color: 'black',
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            });




          const ctx3 = document.getElementById('Chart3');
          new Chart(ctx3, {
            type: 'doughnut',
            data: {
              labels: {!! json_encode($kelompok_umur_per_wilayah->pluck('kelompok_umur')) !!}, 
              datasets: [{
                label: 'Jumlah Orang',
                data: {!! json_encode($kelompok_umur_per_wilayah->pluck('jumlah_penduduk')) !!}, 
                backgroundColor: [
                  'rgba(255, 99, 132, 0.6)', 
                  'rgba(54, 162, 235, 0.6)', 
                  'rgba(255, 206, 86, 0.6)', 
                  'rgba(75, 192, 192, 0.6)',
                  'rgba(153, 102, 255, 0.6)',
                  'rgba(0, 255, 255, 0.6)'
                ]
              }]
            }
          });


          const ctx4 = document.getElementById('Chart4');
          new Chart(ctx4, {
            type: 'bar',
            data: {
              labels: {!! json_encode($pekerjaan->pluck('pekerjaan')) !!},
              datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($pekerjaan->pluck('jumlah_pekerja')) !!},
                borderWidth: 1,
                datalabels: {
                    anchor:'end',
                    align:'top',
                    offset: 5
                },
              }]
            },
            plugins: [ChartDataLabels],
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              plugins: {
                datalabels: {
                    formatter: function (value) {
                        return value.toLocaleString(); 
                        }
                    }
                }
            }
          });


          const ctx5 = document.getElementById('Chart5');
          new Chart(ctx5, {
            type: 'bar',
            data: {
              labels: {!! json_encode($agama->pluck('agama')) !!},
              datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($agama->pluck('jumlah_penganut')) !!},
                borderWidth: 1,
                datalabels: {
                    anchor:'end',
                    align:'top',
                    offset: 5
                },
              }]
            },
            plugins: [ChartDataLabels],
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              plugins: {
                datalabels: {
                    formatter: function (value) {
                        return value.toLocaleString(); 
                        }
                    }
                }
            }
          });


          const ctx6 = document.getElementById('Chart6');
          new Chart(ctx6, {
            type: 'bar',
            data: {
              labels: {!! json_encode($pendidikan->pluck('tingkat_pendidikan')) !!},
              datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($pendidikan->pluck('jumlah_peserta_didik')) !!},
                borderWidth: 1,
                datalabels: {
                    anchor:'end',
                    align:'top',
                    offset: 5
                },
              }]
            },
            plugins: [ChartDataLabels],
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              plugins: {
                datalabels: {
                    formatter: function (value) {
                        return value.toLocaleString(); 
                        }
                    }
                }
            }
          });

        </script>


    </body>

</html>