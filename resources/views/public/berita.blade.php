<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Berita Kecamatan Tigaraksa</title>
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
        
        /* Hilangkan margin & padding global untuk menghindari area putih di pinggir */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
        .navbar {
            position: fixed !important; /* Pastikan navbar tetap fixed */
            top: -1px;
            left: 0;
            width: 100%;
            height: fit-content;
            }
        .navbar-brand .m-0 {
            font-size: 28px;
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
        /* .footer, .container-fluid.copyright {
            width: 100%;
            margin: 0;
            padding: 50px 10px; 
            overflow-x: hidden; 
            border: 2px solid red;
        }
        .footer .container, 
        .container-fluid.copyright .container {
            width: 100%;
            max-width: 100%;
            padding: 0 15px;
            border: 2px solid blue;
        } */
        .row {
            margin: 0 !important;
        }

        /* .footer .row,
        .container-fluid.copyright .row {
        margin-left: 0;
        margin-right: 0;
        } */

        /* .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        } */
        .section-title {
        font-size: 1.5rem;
        }

        .mx-auto.text-center.mb-5 {
            padding: 0 15px;
        }
        
        .container {
            max-width: 100% !important;
        }
        
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 10px 0;
        }

                .pagination-container {
                display: inline-flex;
                flex-wrap: nowrap;
                gap: 6px;
                justify-content: center;
                }

                .pagination-number {
                padding: 8px 12px;
                background-color: #0c214c;
                color: white;
                border-radius: 6px;
                white-space: nowrap;
                flex-shrink: 0;
                text-align: center;
                }

                .pagination-number.arrow .arrow-text {
                display: none; /* Hemat ruang di layar kecil */
                }

                /* Tampilkan kembali teks panah di layar agak lebar */
        

                .blog-container{
                    /* background-color: black; */
                    padding: 0px 70px;
                    /* gap: 30px; */
                }

                .blog-container .rounded-pill{
                    border-radius: 10px !important;
                }
    

        /* RESPONSIVE SETTINGS */
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
                   height: 180px;
                }
                .navbar-brand .fa {
                    padding-right: 15px;
                    font-size: 50px !important;
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
                .p-3 h4{
                    font-size: 40px;
                }
                .p-3 h1 {
                    font-size: 100px;
                }
                .fs-5 {
                    font-size: 30px !important;
                }
                .p-3 {
                    max-width: 90% !important;
                }
                /* section */
                .mx-auto {
                    margin-top: 150px;
                }
                .mx-auto h5{
                font-size: 35px;
                }
                .mx-auto h1 {
                font-size: 50px;
                }
                /* BERITA */
                .row.g-4.justify-content-center {
                    padding: 0px 150px;
                }
                .blog-content p {
                    font-size: 25px;
                }
                .blog-content .h4  {
                    font-size: 35px;
                }
                .blog-content a {
                    font-size: 30px;
                }
                .pagination-wrapper.overflow-auto.mt-5 {
                    height: 100px;
                }
                .pagination-container.d-flex {
                    width: 100% !important;
                }
                .pagination-number {
                    height: 60px;
                    width: 60px;
                    font-size: 30px;
                }
                svg {
                    width: 30px;
                    height: 30px;
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
        @media (min-width: 1121px) and (max-width: 1441px) {
            /* FOOTER */
            .text-white.display-3 {
                    font-size: 40px;
                }
                .mx-auto h5 {
                    font-size: 20px !important;
                }
                .mx-auto h1 {
                    font-size: 35px !important;
                }
            
        }
        @media (max-width: 1120px) {
            .text-white.display-3 {
                    font-size: 35px;
                }
            .mx-auto {
                margin-bottom: 15px !important;
            }
            .mx-auto h5 {
                    font-size: 16px;
                }
                .mx-auto h1 {
                    font-size: 25px;
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
                .p-3 h4{
                    font-size: 20px !important;
                }
                .p-3 h1 {
                    font-size: 35px !important;
                }
                /* FOOTER */
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
            /* HERO SECTION */
            .p-3 h1{
                font-size: 50px;
            }
            .p-3 p {
                font-size: 18px !important;
            }
            /* SEARCH */
            .container-fluid.w-100.search-bar {
                width: 350px !important;
            }
            .container-fluid.w-100.search-bar .btn {
                font-size: 13px;
            }
            /* KEGIATAN */
            .nav.nav-pills {
                font-size: 15px;
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
                .p-3 h4{
                    font-size: 20px !important;
                }
                .p-3 h1 {
                    font-size: 35px !important;
                }
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 0px !important;
                }
                .mx-auto.text-center.mb-5 h5{
                font-size: 18px;
                }
                .mx-auto.text-center.mb-5 h1 {
                    font-size: 23px;
                }

            .section-title {
                font-size: 1.2rem;
            }
            .container-fluid.container-fluid.footer.py-5 {
                padding-top: 0px !important;
                /* padding-left: 80px !important; */
            }

        }
        @media (max-width: 576px) {
            .blog .col-lg-4, .blog .col-md-6 {
                padding-left: 1px !important;
                padding-right: 1px !important;
                margin-bottom: 20px;
            }

            .blog .blog-item {
                padding: 10px !important;
                font-size: 14px !important;
            }

            .blog .btn {
                font-size: 11px !important;
                padding: 6px 10px !important;
            }

            .blog .blog-img img {
                height: 120px !important;
                object-fit: cover !important;
            }
        
            .navbar {
                position: fixed !important; /* Pastikan navbar tetap fixed */
                top: -1px;
                left: 0;
                width: 100%;
                height: fit-content;
            }

            .navbar-brand .m-0 {
                font-size: 28px;
            }
            .bg-breadcrumb h3 {
                    font-size: 2rem !important;
                }
                /* ukuran paragraf */
                .blog-content p {
                    font-size: 12px !important;
                }

                /*  teks judul */
                .blog-content a.h4 {
                    font-size: 16px !important; 
                }
            
                /* tombol “Selengkapnya”. */
                .blog-content .btn {            
                    font-size: 15px !important;
                    padding: 6px 8px !important;
                }
                .pagination-number.arrow .arrow-text {
                display: inline;
            }
        }
        @media (max-width: 480px) {
            .mx-auto.text-center.mb-5 h1 {
                font-size: 1.4rem;
            }

            .mx-auto.text-center.mb-5 p {
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1rem;
            }
        }
        @media (max-width: 469px) {
                /* FOOTER */
                .footer {
                    padding: 0px 0px !important; /* Mengurangi padding agar lebih pas */
                }

                .footer-item h4 {
                    font-size: 16px !important; /* Mengecilkan ukuran heading */
                }

                .footer-item a {
                    font-size: 14px !important; /* Mengecilkan ukuran teks */
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
        @media (max-width: 450px) {
            .navbar-brand .m-0 {
                    font-size: 23px;
                }
                .navbar-brand .subtext {
                    font-size: 18px;
                    margin-left: 31px;
                }
                .navbar-brand .fa {
                    font-size: 20px !important;
                }
                /* HERO  SECTION */
                .p-3 h4{
                    font-size: 15px;
                }
                .p-3 h1 {
                    font-size: 25px;
                }
                .fs-5 {
                    font-size: 15px !important;
                }
                /* SEARCH */
                .container-fluid.w-100.search-bar {
                    width: 300px !important;
                }
                .container-fluid.w-100.search-bar .btn {
                    font-size: 10px;
                    margin-bottom: 3px;
                }
                .form-control {
                    height: 35px;
                    margin-top: -10px;
                }
                .position-relative.rounded-pill {
                    height: 50px;
                }
                /* BERITA */
                .container-fluid.mt-5 {
                    padding: 25px !important;
                }
                .mx-auto h5{
                font-size: 15px;
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
                

                /* KEGIATAN */
                .tab-content {
                    padding: 5px !important;
                }
                .nav-pills span{
                    font-size: 15px !important;
                }
            .footer-item h4 {
                font-size: 14px;
            }

            .footer-item a {
                font-size: 12px;
            }

            .footer .btn-square {
                width: 25px;
                height: 25px;
                font-size: 10px;
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
                    margin-right: 7px !important;
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
                /* SECTION */
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 0px !important;
                }
                .mx-auto.text-center.mb-5 h5{
                font-size: 13px;
                }
                .mx-auto.text-center.mb-5 h1 {
                    font-size: 19px;
                }
                /* BERITA */
                .col-12.col-sm-6 {
                    width: 300px;
                     margin: 0px !important; 
                }
                .blog-container{
                /* background-color: black; */
                padding: 0px 10px;
                /* gap: 30px; */
                }
                .blog-content .btn {            
                    font-size: 13px !important;
                    padding: 6px 8px !important;
                }
                .footer {
                    padding: 15px 10px;
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
            .blog .col-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
                /* FOOTER */
                .container-fluid.footer.py-5 {
                    padding: 0px 15px !important;
                }
                
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
                .col-md-6.col-lg-6.col-xl-3 {
                padding: 0px !important;
            }
                /* COPYRIGHT */
                .container-fluid.copyright .container .col-md-6 {
                    font-size: 12px;
                }
                .container-fluid.copyright .container .col-md-6 i, .text-white {
                    font-size: 12px;
                } 
            /* BERITA */
            .col-12.col-sm-6 {
                width: 300px;
                 margin: 25px !important; 
            }
            .blog-container{
                /* background-color: black; */
                padding: 0px 10px;
                /* gap: 30px; */
            }
            .blog-content .btn {            
                font-size: 13px !important;
                padding: 6px 8px !important;
            }
                
        }
        @media (max-width: 321px){
            .navbar.navbar-expand-lg.navbar-light {
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
            /* Section */
            .mx-auto.text-center.mb-5 {
                margin-bottom: 0px !important;
            }
            .mx-auto.text-center.mb-5 h5{
                font-size: 13px;
            }
            .mx-auto.text-center.mb-5 h1 {
                font-size: 19px;
            }
            /* Berita */
            .blog-container{
                /* background-color: black; */
                padding: 0px 7px;
                /* gap: 30px; */
            }
            .blog-content .btn {            
                    font-size: 13px !important;
                    padding: 6px 8px !important;
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
                        <a href="{{ url('berita') }}" class="nav-item nav-link active">Berita</a>
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
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Berita</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Berita Desa</h5>
                    <h1 class="mb-4">Menyajikan informasi terbaru tentang peristiwa dan berita terkini Kecamatan Tigaraksa</h1>
                </div>

                <div class="row g-4 justify-content-center blog-container">
                    @foreach ($berita as $item)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow border-0">
                                <div class="position-relative" style="height: 250px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $item->gambar_berita) }}" class="card-img-top w-100 h-100 object-fit-cover" alt="{{ $item->judul_berita }}">
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <small class="text-muted mb-2">Posted By: {{ $item->penulis_berita }}</small>
                                    <h5 class="card-title">{{ $item->judul_berita }}</h5>
                                    <p class="card-text flex-grow-1">{!! Str::limit($item->konten_berita, 80, '...') !!}</p>
                                    <a href="{{ url('berita/detailberita/' . $item->id_berita) }}" class="btn btn-primary rounded-pill mt-3 align-self-start">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $berita->links() }}
                </div>
            </div>
        </div>
        <!-- Blog End -->


        

        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Hubungi Kami</h4>
                            <a href=""><i class="fas fa-home me-2"></i> 123 Street, New York, USA</a>
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
                        Designed By <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
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
        

        <!-- Template Javascript -->
        <script src="{{ url('js/main.js') }}"></script>
    </body>

</html>