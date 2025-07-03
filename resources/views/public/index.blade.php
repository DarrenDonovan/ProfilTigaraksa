<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>Website Kecamatan Tigaraksa</title>
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
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

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
            .display-2 {
                font-size: 50px;
            }
            .subtext{
                margin: 0px;
            }
            .kec {
                margin-left: 6px;
            }
            .dropdown-menu {
                max-height: 250px;
                overflow-y: auto;
                overflow-x: hidden;
                scroll-behavior: smooth;
            }
            .searchBox {
                width: 100%; 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                max-height: 100px;
            }
            .search-container {
                display: flex;
                align-items: center;
                border: 2px solid #2c3e50;
                border-radius: 6px;
                padding: 8px 12px;
                background-color: white;
                width: 100%; 
                height: 100%;
            }
            .search-icon {
                font-size: 18px;
                color: #2c3e50;
                border: none;
                background: transparent;
            }

            .search-input {
                border: none;
                outline: none;
                flex: 1;
                font-size: 16px;
                color: #2c3e50;
            }

            .search-input::placeholder {
                color: #ccc;
            }
            /* Default: disembunyikan */
            .teks-mobile {
                display: none;
                padding-top: 5px;
                margin: 0px;
                font-size: 13px;
            }
            .modal.fade.show {
                padding-top: 100px;
            }

            .col-12.col-sm-6.col-md-4.mb-4.berita{
                padding: 20px;
            }


            @media (min-width: 2000px) {
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
                }
                .navbar-nav {
                   /* border: 2px solid blue; */
                   height: 180px;
                }
                .navbar-brand .fa {
                    padding-right: 15px;
                    font-size: 50px !important;
                    /* border: 2px solid red; */
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
                /* HERO  SECTION */
                .carousel-caption.top-50 {
                    width: 100%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 40px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 85px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 35px !important;
                }
                 /* SEARCH */
                 .searchBox {
                    /* border: 2px solid red; */
                    height: 75px;
                }
                .search-container {
                    /* border: 2px solid blue; */
                    width: 100% !important;
                }
                .search-container button {
                    font-size: 40px;
                    padding-right: 5px;
                }
                .search-container input {
                    font-size: 30px;
                }
                /* BERITA */
                .container-fluid.mt-5 {
                    width: 100%;
                    padding: 50px;
                }
                .mx-auto {
                    /* border: 2px solid blue; */
                    margin-top: 150px;
                }
                .mx-auto h5{
                font-size: 35px;
                }
                .mx-auto h1 {
                font-size: 50px;
                }

                .card-title {
                    font-size: 40px; /* Sesuaikan ukuran judul berita */
                }

                .card-text {
                    font-size: 25px; /* Kecilkan teks isi berita */
                }

                .btn-primary {
                    font-size: 25px;
                    padding: 8px 12px; /* Kurangi padding tombol */
                }
                p.text-muted {
                    font-size: 1.5rem;
                }
                .col-12.col-sm-6 {
                    width: 700px;
                    margin-left: 50px;
                }
                /* KEGIATAN */
                .container-fluid.destination.py-5 {
                    width: 90% !important;
                }
                
                .nav.nav-pills {
                    width: 90% !important;
                    /* margin-left: 125px; */
                }
                .nav.nav-pills .nav-item {
                    width: 15%;
                    /* height: 2rem; */
                    font-size: 28px;
                    /* border: 2px solid salmon; */
                }
                .nav.nav-pills .nav-item .d-flex {
                    display: flex;
                    justify-content: center;
                }
                /* galery */
                .destination-img {
                    width: 100%;
                }
                .destination-overlay.p-4.text-start .text-white {
                    font-size: 30px !important;
                }
                .modal.fade.show {
                    /* border: 2px solid blue; */
                    padding-top: 180px !important;
                }
                .modal-lg {
                    max-width: 60% !important; /* Perbesar modal */
                }
                .modal-body .col-md-4 img {
                    width: 150% !important; /* Bisa lebih dari 100% */
                    height: auto; /* Agar proporsi tetap */
                }
                .modal-title {
                    font-size: 40px;
                }


                /* FOOTER */
                .footer {
                    padding: 0px 590px; /* Mengurangi padding agar lebih pas */
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
            @media (min-width: 1121px) and (max-width: 1442px) {
                .carousel-caption.top-50 {
                    width: 90%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 20px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 40px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 18px !important;
                }
                .searchBox, .search-container {
                    height: 80%;
                    width: 100% !important;
                }
                .mx-auto h5 {
                    font-size: 20px !important;
                }
                .mx-auto h1 {
                    font-size: 35px;
                }
            }
            @media (min-width: 769px) and (max-width: 1120px) {
                .mx-auto.text-center.mb-5 h5 {
                    font-size: 16px !important;
                }
                .mx-auto h1 {
                    font-size: 25px !important;
                }  
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
                .carousel-caption.top-50 {
                    width: 90%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 20px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 35px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 18px !important;
                }
                .searchBox, .search-container {
                    height: 80%;
                    width: 100% !important;
                }
                .footer {
                    padding: 20px 80px !important; /* Mengurangi padding agar lebih pas */
                }
                .footer-item h4 {
                    font-size: 22px; /* Mengecilkan ukuran heading */
                }

                .footer-item a {
                    font-size: 16px; /* Mengecilkan ukuran teks */
                    text-wrap: nowrap;

                }

                .footer-item i {
                    font-size: 16px; /* Mengecilkan ikon */
                }

                .footer .btn-square {
                    width: 35px; /* Mengecilkan tombol sosial media */
                    height: 35px;
                    font-size: 40px;
                    padding: 4px;
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
                
                /* KEGIATAN */
                .nav.nav-pills {
                    font-size: 15px;
                }
                .teks-mobile {
                    display: block;
                }

            }
            @media (max-width: 770px){
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
                .carousel-caption.top-50 {
                    width: 80%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                /* SECTION */
                .mx-auto h5 {
                    font-size: 18px;
                }
                .mx-auto h1 {
                    font-size: 23px;
                }
                /* MODAL */
                .modal.fade {
                    padding-top: 60px;
                }
                .modal-title {
                    font-size: 15px !important;
                }
            }
            @media (max-width: 469px) {
                /* FOOTER */
                .footer {
                    padding: 0px 20px !important; /* Mengurangi padding agar lebih pas */
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
                    width: 25px; /* Mengecilkan tombol sosial media */
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
            @media (max-width: 426px) {
                .navbar-brand .m-0 {
                    font-size: 23px;
                }
                .navbar-brand .subtext {
                    font-size: 15px;
                    margin: 0px !important;
                }
                .navbar-brand .fa {
                    font-size: 20px !important;
                }
                .navbar-brand h1 {
                    font-size: 20px !important;
                }
                .nav.nav-pills {
                    /* justify-content: flex-start;
                    align-items: flex-start; */
                    flex-wrap: nowrap;
                    overflow-x: scroll;
                    /* border: 1px solid red; */
                    max-width: 100%;
                    /* text-align: left !important; */
                    justify-content: flex-start !important;
                }
                .row {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .col-12.col-sm-6 {
                    width: 300px;
                     margin: 0px !important; 
                }
                /* HERO  SECTION */
                .carousel-caption.top-50 {
                    width: 80%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 18px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 28px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 15px !important;
                }
                .searchBox, .search-container {
                    height: 80%;
                    width: 100% !important;
                }

                /* BERITA */
                .container-fluid.mt-5 {
                    padding: 15px !important;
                }

                .mx-auto h5{
                font-size: 13px;
                }
                .mx-auto h1 {
                font-size: 19px;
                }

                .card-title {
                    font-size: 15px; /* Sesuaikan ukuran judul berita */
                }

                .card-text {
                    font-size: 13px; /* Kecilkan teks isi berita */
                }

                .btn-primary {
                    font-size: 13px;
                    padding: 8px 12px; /* Kurangi padding tombol */
                }
                
                .col-12.col-sm-6 {
                    /* border: 2px solid red; */
                    padding-bottom: 10px;
                    width: 90%;
                    /* margin-left: 60px; */
                }

                .dropdown.d-lg-none.d-block {
                    margin-bottom: 15px;
                }

                /* KEGIATAN */
                .tab-content {
                    padding: 5px !important;
                }
                .nav-pills span{
                    font-size: 15px !important;
                }
                /* MODAL */
                .modal.fade {
                    padding-top: 60px;
                }
                .modal-title {
                    font-size: 15px !important;
                }
            }
            @media (max-width: 380px) {
                /* NAVBAR */
                .navbar-brand .fa { 
                    font-size: 20px !important; 
                    margin-right: 5px !important;
                }
                .navbar-brand h1 {
                    font-size: 20px !important;
                    color: #ffff !important;
                }
                .navbar-brand h1 .subtext {
                    font-size: 15px !important;
                    margin: 0px !important;
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
                /* HERO */
                .carousel-caption.top-50 {
                    width: 80%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 15px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 25px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 15px !important;
                }
                .searchBox, .search-container {
                    height: 80%;
                    width: 100% !important;
                }
                
                /* SECTION */
                .mx-auto h5 {
                    font-size: 13px;
                }
                .mx-auto h1 {
                    font-size: 19px;
                }
                
                /* BERITA */
                .container-fluid.mt-5 {
                    padding: 15px !important;
                }
                .card-body h5 {
                    font-size: 15px;
                }
                .text-muted, .text-muted i {
                    font-size: 13px;
                    /* border: 2px solid red; */
                }
                .card-text {
                    font-size: 13px;
                }
                .btn.btn-primary {
                    font-size: 13px;
                }
                .col-12.col-sm-6 {
                    /* border: 2px solid blue; */
                    padding: 0px;
                    width: 90%;
                    padding-bottom: 10px;
                }
                .dropdown.d-lg-none.d-block {
                    margin-bottom: 15px;
                }
                /* GALERY */
                .tab-content {
                    padding: 5px !important;
                }
                /* MODAL */
                .modal.fade {
                    padding-top: 60px;
                }
                .modal-title {
                    font-size: 15px !important;
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
            @media (max-width: 322px){
                /* NAVBAR */
                .navbar.navbar-expand-lg.navbar-light {
                    /* border: 2px solid red; */
                    padding-left: 20px !important;
                }
                .navbar-brand .fa { 
                    font-size: 20px !important; 
                    margin-right: 5px !important;
                }
                .navbar-brand h1 {
                    font-size: 15px !important;
                    color: #ffff !important;
                }
                .navbar-brand h1 .subtext {
                    font-size: 13px !important;
                    margin: 0px !important;
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

                /* HERO */
                .carousel-caption.top-50 {
                    width: 90%;
                    height: 80%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .carousel-caption.top-50 .p-3 h4 {
                    font-size: 15px !important;
                }
                .carousel-caption.top-50 .p-3 h1 {
                    font-size: 25px !important;
                }
                .carousel-caption.top-50 .p-3 p {
                    font-size: 15px !important;
                }
                .searchBox, .search-container {
                    height: 80%;
                    width: 100% !important;
                }
                /* SECTION */
                .mx-auto h5 {
                    font-size: 13px;
                }
                .mx-auto h1 {
                    font-size: 19px;
                }
                
                /* BERITA */
                
                .row {
                    overflow: hidden;
                    /* width: 80%; */
                    /* border: 2px solid blue; */
                    margin: 0px;
                    padding: 0px;
                }
                .col-12.col-sm-6 {
                    margin: 5px !important;
                    padding: 0px !important;
                }
                .card-body h5 {
                    font-size: 15px;
                }
                .text-muted, .text-muted i {
                    font-size: 13px;
                    /* border: 2px solid red; */
                }
                .card-text {
                    font-size: 13px;
                }
                .btn.btn-primary {
                    font-size: 13px;
                }

                /* GALERY */
                .dropdown.d-lg-none.d-block {
                    margin-bottom: 0px !important;
                }
                .tab-class.text-center {
                    padding: 0px !important;
                }
                .tab-content {
                    padding: 0px !important;
                }
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 15px !important;
                }
                .col-xl-8 {
                    padding: 0px !important;
                }

                /* MODAL */
                .modal.fade {
                    padding-top: 60px;
                }
                .modal-title {
                    font-size: 15px !important;
                }

                    /* FOOTER */
                .col-md-6.col-lg-6.col-xl-3 {
                    padding: 0px !important;
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
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
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

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="3"></li>
                    </ol>
            
                    <!-- Carousel items -->
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/car-4.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            @if ($berita_terbaru && $berita_terbaru->gambar_berita)
                                <img src="{{ asset('storage/' . $berita_terbaru->gambar_berita) }}" class="img-fluid" alt="Image">
                            @else
                                <p>No image available yet.</p>
                            @endif
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/car-3.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            @if ($kegiatanterbaru && $kegiatanterbaru->gambar_kegiatan)
                                <img src="{{ asset('storage/' . $kegiatanterbaru->gambar_kegiatan) }}" class="img-fluid" alt="Image">
                            @else
                                <p>No image available yet.</p>
                            @endif
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-caption top-50 start-50 translate-middle text-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat Datang</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Website Kecamatan Tigaraksa</h1>
                            <p class="mb-5 fs-5">Sumber informasi terbaru tentang desa-desa yang ada di Kecamatan Tigaraksa</p>
                            <div class="searchBox" >
                                <div class="search-container position-relative">
                                    <span class="search-icon">🔍</span>
                                    <input type="text" class="search-input" id="search-input" placeholder="Search..." style="width: 80%;">
                                    <ul id="searchResults" class="list-group position-absolute w-100" style="z-index: 9999; top:100%; left:0; text-align: left; max-height: 200px; overflow-y:auto"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                      
            
                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        <!-- Navbar & Hero End -->

        <!-- BERITA -->
        <div class="container-fluid mt-5" style=" padding: 100px;">
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <h5 class="section-title px-3">Highlight</h5>
                <h1 class="mb-0">Berita Terbaru Kecamatan Tigaraksa</h1>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <!-- Berita 1 -->
                @foreach ($berita as $itemBerita)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $itemBerita->gambar_berita) }}" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title">{{ $itemBerita->judul_berita }}</h5>
                            <p class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $itemBerita->tanggal_berita }} &nbsp; 
                                <i class="bi bi-person"></i> {{ $itemBerita->penulis_berita }}
                            </p>
                            <p class="card-text">{!! Str::limit($itemBerita->konten_berita, 50, '...') !!}</p>
                            <a href="{{ url('berita/detailberita/' . $itemBerita->id_berita) }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- BERITA END -->

        <!-- Kegiatan Start -->
        <!-- Kegiatan Terbaru -->
        <div class="container-fluid destination py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-3" style="max-width: 900px;">
                    <h5 class="section-title px-3">Galeri</h5>
                    <h1 class="mb-0">Kegiatan Kecamatan Tigaraksa</h1>
                </div>
                <div class="container-fluid mb-4">
                    <div class="container py-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-md-5">
                                <div class="h-100" >
                                    @if ($kegiatanterbaru && $kegiatanterbaru->gambar_kegiatan)
                                        <img src="{{ asset('storage/' . $kegiatanterbaru->gambar_kegiatan) }}" class="img-fluid" style="width: 400px; height: auto; margin-left: 40px;" alt="Image">
                                    @else
                                        <p>No image available yet.</p>
                                    @endif
                                </div>
                            </div>
                            @if ($kegiatanterbaru)
                            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                                <h5 class="section-about-title pe-3">Kegiatan Terbaru</h5>
                                <h1 class="mb-4" class="text-primary">{{ $kegiatanterbaru->nama_kegiatan }}</h1>
                                <p class="mb-4">{!! $kegiatanterbaru->keterangan !!}</p>                        
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Daftar Kegiatan -->
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-flex flex-wrap justify-content-center gap-2 mb-5 d-lg-flex d-none" id="nav-pills">
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                                <span class="text-dark" style="width: 150px;">Semua</span>
                            </a>
                        </li>
                        @foreach ($jenis_kegiatan as $jenis)
                        <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $jenis->id_jenis_kegiatan }}">
                                <span class="text-dark" style="width: 150px;">{{ $jenis->nama_jenis_kegiatan }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- Dropdown untuk layar kecil -->
                    <div class="dropdown d-lg-none d-block">
                        <button class="btn btn-primary dropdown-toggle w-80" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Kategori
                        </button>
                        <ul class="dropdown-menu w-90 text-center" aria-labelledby="dropdownMenuButton">
                            @foreach ($jenis_kegiatan as $itemJenis)
                            <li><a class="dropdown-item2" href="#tab-{{ $itemJenis->id_jenis_kegiatan }}">{{ $itemJenis->nama_jenis_kegiatan }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Konten Kegiatan -->
                    <div class="tab-content">
                        <div id="tab-all" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="row g-4">
                                    @foreach ($kegiatan as $keg)
                                    <div class="col-lg-4">
                                        <div class="destination-img" style="width: 100%; object-fit:cover;">
                                            <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $keg->gambar_kegiatan) }}" data-bs-toggle="modal"  style="width: 432px; height: 250px; object-fit:cover;">
                                            <div class="destination-overlay p-4 text-start">
                                                @foreach($jumlah_dokum->where('id_kegiatan', $keg->id_kegiatan) as $jumlahDokum)
                                                <a class="btn btn-primary text-white rounded-pill border py-2 px-3" style="pointer-events: none;">{{ $jumlahDokum->jumlah_gambar }} Photos</a> 
                                                @endforeach                                                      
                                                <h4 class="text-white mb-2 mt-3">{{ $keg->nama_kegiatan }}</h4>
                                                <a href="#galleryModal{{ $keg->id_kegiatan }}" class="btn-hover text-white"  data-bs-toggle="modal" data-bs-target="#galleryModal{{ $keg->id_kegiatan }}">Lihat Semua Foto <i class="fa fa-arrow-right ms-2"></i>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- galeri pas di klik -->
                                    <div class="modal fade" id="galleryModal{{ $keg->id_kegiatan }}" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="galleryModalLabel">Galeri {{ $keg->nama_kegiatan }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-2">
                                                        <div class="col-md-4">
                                                            <div class="h-100" >
                                                                <img src="{{asset('storage/' . $keg->gambar_kegiatan)}}" class="img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                                                            <h1 class="mb-4" class="text-primary">{{ $keg->nama_kegiatan }}</h1>
                                                            <p class="mb-4">{!!$keg->keterangan !!}</p>                        
                                                        </div>
                                                    </div>
                                                    <h2 class="mt-5">Dokumentasi Kegiatan</h2>
                                                    <div class="row g-2 mt-3 mb-4">
                                                        @foreach($dokum_kegiatan->where('id_kegiatan', $keg->id_kegiatan) as $itemDokum)
                                                        <div class="col-md-4">
                                                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $itemDokum->gambar) }}" alt="Foto Kegiatan" style="height: 200px; width: 90%; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <!-- Kegiatan per kategori -->
                        @foreach ($jenis_kegiatan as $jenisKegiatan)
                        <div id="tab-{{ $jenisKegiatan->id_jenis_kegiatan }}" class="tab-pane fade p-0">
                            <div class="row g-4">
                                <div class="row g-4">
                                    @foreach ($kegiatan as $item)
                                        @if ($item->id_jenis_kegiatan == $jenisKegiatan->id_jenis_kegiatan)
                                        <div class="col-lg-4 col-md-6"> 
                                            <div class="destination-img" style="width: 100%; object-fit:cover;">
                                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $item->gambar_kegiatan) }}" style="object-fit: cover; width: 100%; height: 250px;">
                                                <div class="destination-overlay p-4 text-start">
                                                    @foreach($jumlah_dokum->where('id_kegiatan', $item->id_kegiatan) as $jumlahDokum)
                                                    <a class="btn btn-primary text-white rounded-pill border py-2 px-3" style="pointer-events: none;">{{ $jumlahDokum->jumlah_gambar }} Photos</a>
                                                    @endforeach                                                       
                                                    <h4 class="text-white mb-2 mt-3">{{ $item->nama_kegiatan }}</h4>
                                                    <a href="#galleryModal{{ $item->id_kegiatan }}-{{ $jenisKegiatan->id_jenis_kegiatan }}" class="btn-hover text-white" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $item->id_kegiatan }}-{{ $jenisKegiatan->id_jenis_kegiatan }}">Lihat Semua Foto <i class="fa fa-arrow-right ms-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="galleryModal{{ $item->id_kegiatan }}-{{ $jenisKegiatan->id_jenis_kegiatan }}" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="galleryModalLabel">Galeri {{ $item->nama_kegiatan }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="row g-2">
                                                        <div class="col-md-4">
                                                            <div class="h-100" >
                                                                <img src="{{asset('storage/' . $item->gambar_kegiatan)}}" class="img-fluid rounded w-100" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                                                            <h1 class="mb-4" class="text-primary">{{ $item->nama_kegiatan }}</h1>
                                                            <p class="mb-4">{!! $item->keterangan !!}</p>                        
                                                        </div>
                                                    </div>
                                                    <h2 class="mt-5">Dokumentasi Kegiatan</h2>
                                                    <div class="row g-2 mt-3 mb-4">
                                                        @foreach($dokum_kegiatan->where('id_kegiatan', $item->id_kegiatan) as $itemDokum)
                                                        <div class="col-md-4">
                                                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $itemDokum->gambar) }}" alt="Foto Kegiatan" style="height: 200px; width: 90%; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Kegiatan End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-6">
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
        <script src="{{url('lib/easing/easing.min.js')}}"></script>
        <script src="{{url('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{url('lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{url('lib/lightbox/js/lightbox.min.js')}}"></script>
        

        <!-- Template Javascript -->
        <script src="{{url('js/main.js')}}"></script>
    </body>

<script>
// FUNGSI BUAT DROPDOWN KEGIATAN PAS LAYARNYA KECIL
document.addEventListener("DOMContentLoaded", function () {
    const dropdownItems = document.querySelectorAll(".dropdown-item2");

    dropdownItems.forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault();

            const targetTabId = this.getAttribute("href");
            if (!targetTabId) return; // Cegah error jika href kosong

            const targetTab = document.querySelector(targetTabId);
            const allTabs = document.querySelectorAll(".tab-pane");
            const allNavLinks = document.querySelectorAll(".nav-link");

            // Remove active class from all tabs and nav links
            allTabs.forEach(tab => tab.classList.remove("show", "active"));
            allNavLinks.forEach(link => link.classList.remove("active"));

            // Activate the clicked tab
            if (targetTab) {
                targetTab.classList.add("show", "active");

                // Activate the corresponding nav-link
                const correspondingNavLink = document.querySelector(`.nav-link[href="${targetTabId}"]`);
                if (correspondingNavLink) {
                    correspondingNavLink.classList.add("active");
                }
            }
        });
    });
});

    const searchData = @json($data_search);

    const searchInput = document.getElementById('search-input');
    const resultList = document.getElementById('searchResults');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        resultList.innerHTML = '';

        if (keyword.length < 2) return;

        const filtered = searchData.filter(item =>
            item.nama.toLowerCase().includes(keyword)
        );

        filtered.forEach(item => {
            const li = document.createElement('li');
            li.classList.add('list-group-item');

            li.innerHTML = `<a href="${item.url}" class="text-decoration-none text-dark d-block">
                                ${item.nama} <span class="badge bg-secondary">${item.type}</span>
                            </a>`;
            resultList.appendChild(li);
        });

        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !resultList.contains(e.target)) {
                resultList.innerHTML = '';
            }
        });
    });

    </script>

</html>