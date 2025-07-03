<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    @foreach ($wilayaheach as $itemWilayah)
    <title>{{ $itemWilayah->nama_wilayah }}</title>
    @endforeach
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ url('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('css/leaflet.css') }}" rel="stylesheet" />

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
      /* PROFILE DESA */
      .small-text {
        font-size: 0.7em; /* Ukuran lebih kecil */
        font-weight: normal; /* Supaya gak terlalu tebal */
      }

      .containerProDes {
        display: flex;
        width: 80%;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        margin: 0 auto; /* Ini bikin container ke tengah */
        align-items: center;
        justify-content: center; /* Biar konten di dalamnya juga tengah */
      }

      .proDes {
        width: 50%;
        padding: 20px;
      }

      .gmbrDesa {
        width: 50%;
      }
      .gmbrDesa img {
        width: 100%;
        height: 90%;
        border: none;
      }
      .proDes h2 {
        margin-top: 0;
        color: #222;
        font-size: 35px;
      }
      .proDes p {
        font-size: 20px;
      }
      .proDes table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
      }
      .proDes td {
        padding: 8px 0;
      }
      .proDes {
        font-weight: bold;
        color: #333;
      }

      /* CARD WISATA */
        .containerWisata {
            max-width: 3000px;
            margin: auto;
            text-align: center;
            padding: 50px;
        }

        .gridWisata {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(600px, 1fr));
            gap: 20px;
        }

        .cardW {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            width: 100%;
        }

        .cardW img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .cardW:hover img {
            transform: scale(1.05);
            cursor: pointer;
        }

        .cardW .info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            text-align: left;
        }
        /* UMKM CSS */
        .containerUMKM {
            max-width: 3000px;
            margin: auto;
            text-align: center;
            padding: 50px;
        }

        .gridUMKM {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 20px;
        }
        
        .cardU {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .cardU img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .cardU:hover img {
            /* transform: scale(1.05); */
            cursor: pointer;
        }

        .cardU .info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            text-align: left;
        }
        .umkm-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            text-align: center;
            
            /* Efek transisi */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

          .umkm-overlay {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background: rgba(0, 0, 0, 0.5);
              
              /* Efek transisi */
              opacity: 0;
              visibility: hidden;
              transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
          }

          /* Saat popup aktif */
          .umkm-popup.show {
              opacity: 1;
              visibility: visible;
          }

          .umkm-overlay.show {
              opacity: 1;
              visibility: visible;
          }

          .close-btn {
               background: red;
               color: white;
               padding: 5px 10px;
               border: none;
               cursor: pointer;
               border-radius: 5px;
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
                .p-3 h4{
                    font-size: 16px;
                }
                .p-3 h1 {
                    font-size: 25px;
                }
                
                .text-white.display-3 {
                  /* border: 2px solid red; */
                  font-size: 35px;
                }
                .mx-auto h3 {
                    font-size: 20px;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                  height: 675px;
                  padding: 15px;
                }
                .mx-auto.text-center.mb-5.wisata, .mx-auto.text-center.mb-5.umkm{
                  margin-bottom: 0px !important;
                }
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
                    font-size: 13px;
                }
                .mx-auto h1 {
                    font-size: 19px;
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
                .proDes h2 {
                  margin-top: 0;
                  color: #222;
                  font-size: 18px;
                  /* border: 2px solid blue; */
                }
                .proDes p {
                  font-size: 12px;
                  /* border: 2px solid blue; */
                }
                .proDes table {
                  width: 100%;
                  border-collapse: collapse;
                  /* border: 2px solid blue; */
                  font-size: 12px;
                }
                .proDes td {
                  padding: 8px 0;
                }
                .proDes {
                  font-weight: bold;
                  color: #333;
                }
                
                /* HERO */
                .container-fluid.bg-breadcrumb {
                    height: 60% !important;
                }

               /* WISATA */
                .mx-auto.text-center.mb-5.wisata {
                  margin-bottom: 0px !important;
                }
               .containerWisata {
                  padding: 2px;
                  /* border: 2px solid red !important; */
                  width: 100%;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                  height: 700px;
                  padding-inline: 17px;
                }
                .cardW .info {
                  font-size: 15px;
                }

                /* UMKM */
                .mx-auto h5 {
                    font-size: 15px;
                }
                .mx-auto.text-center.mb-5.umkm {
                    margin-bottom: 0px !important;
                }
                .containerUMKM {
                  padding-block: 15px !important;
                  padding-inline: 17px !important;
                }
                .gridUMKM {
                  /* border: 2px solid blue; */
                  /* padding: 5px; */
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                  height: 450px;
                  gap: 20px;
                }
                .cardU .info {
                  font-size: 15px;
                }
            }
            @media (min-width: 322px) and (max-width: 380px) {
                /* NAVBAR */
                .mx-auto h5 {
                    font-size: 15px;
                }
                .mx-auto h1 {
                    font-size: 19px;
                }
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

                /* PROFILE DESA */
                .proDes h2 {
                  margin-top: 0;
                  color: #222;
                  font-size: 18px;
                  /* border: 2px solid blue; */
                }
                .proDes p {
                  font-size: 12px;
                  /* border: 2px solid blue; */
                }
                .proDes table {
                  width: 100%;
                  border-collapse: collapse;
                  /* border: 2px solid blue; */
                  font-size: 12px;
                }
                .proDes td {
                  padding: 8px 0;
                }
                .proDes {
                  font-weight: bold;
                  color: #333;
                }
              
                /* WISATA */
                .mx-auto.text-center.mb-5.wisata {
                    margin-bottom: 0px !important;
                }
               .containerWisata {
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  padding: 15px;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                  height: 700px;
                  /* padding: 10px; */
                }
                .cardW .info {
                  font-size: 15px;
                }

                /* UMKM */
                .mx-auto.text-center.mb-5.umkm {
                    margin-bottom: 0px !important;
                }
                .containerUMKM {
                  padding: 15px;
                }
                .gridUMKM {
                  /* border: 2px solid blue; */
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                  height: 450px;
                  gap: 20px;
                }
                .cardu .info {
                  font-size: 15px;
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
                .mx-auto h5 {
                    font-size: 15px;
                }
                .mx-auto h1 {
                    font-size: 19px;
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
                    flex-wrap: nowrap;
                    overflow-x: scroll;
                    max-width: 100%;
                    justify-content: flex-start !important;
                }
                .col-12.col-sm-6 {
                    width: 300px;
                    margin-left: 40px;
                }

                /* PROFILE DESA */
                .proDes h2 {
                  font-size: 18px;
                  /* border: 2px solid blue; */
                }
                .proDes p {
                  font-size: 12px;
                  /* border: 2px solid blue; */
                }
                .proDes table {
                  width: 100%;
                  border-collapse: collapse;
                  /* border: 2px solid blue; */
                  font-size: 12px;
                }
                
                /* WISATA */
                .mx-auto.text-center.mb-5.wisata {
                    margin-bottom: 0px !important;
                }
               .containerWisata {
                  padding-block: 15px !important;
                  /* border: 2px solid red !important; */
                  width: 100%;
                  padding-inline: 15px;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                  height: 800px;
                }
                .cardW .info {
                  font-size: 15px;
                }

                /* UMKM */
                .mx-auto.text-center.mb-5.umkm {
                    margin-bottom: 0px !important;
                }
                .containerUMKM {
                  padding-block: 20px !important;
                  padding-inline: 15px !important;
                }
                .gridUMKM {
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                  height: 450px;
                  gap: 20px;
                }
                .cardU .info {
                  font-size: 15px;
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
                    font-size: 25px;
                }
                .navbar-brand .subtext {
                    font-size: 18px;
                    margin: 0px !important;
                }
                .navbar-brand .fa {
                    font-size: 20px !important;
                }

                /* PROFILE DESA */
                .proDes h2 {
                  margin-top: 0;
                  font-size: 20px;
                  /* border: 2px solid blue; */
                }
                .proDes p {
                  font-size: 16px;
                  /* border: 2px solid blue; */
                }
                .proDes table {
                  width: 100%;
                  border-collapse: collapse;
                  /* border: 2px solid blue; */
                  font-size: 14px;
                }
              
                /* WISATA */
                .mx-auto.text-center.mb-5.wisata {
                  margin-bottom: 0px !important;
                }
               .containerWisata {
                  /* border: 2px solid red !important; */
                  width: 100%;
                  padding: 15px !important;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                  height: 675px;
                }
                .cardW .info {
                  font-size: 15px;
                }

                /* UMKM */
                .mx-auto.text-center.mb-5.umkm {
                  margin-bottom: 0px !important;
                }
                .containerUMKM {
                  padding: 10px;
                }
                .gridUMKM {
                  /* border: 2px solid blue; */
                  padding: 15px;
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                  height: 450px;
                  gap: 20px;
                }
                .cardu .info {
                  font-size: 15px;
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
            @media (min-width: 1026px) and (max-width: 1441px) {
              .text-white.display-3 .small-text.d-block {
                font-size: 25px;
              }
              .text-white.display-3 {
                font-size: 45px;
              }
              .mx-auto.text-center {
                margin-bottom: 10px !important;
              }
              .mx-auto h5 {
                font-size: 17px;
              }
              .mx-auto h1 {
                font-size: 30px;
              }
              .containerProDes {
                padding-top: 10px;
              }
              /* WISATA */
              .containerWisata {
                  /* border: 2px solid red !important; */
                  width: 100%;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
                  height: 700px;
                  padding: 15px;
                }
                .cardW img {
                  height: 250px;
                }
                .cardW .info {
                  font-size: 20px;
                }

                /* UMKM */
                .gridUMKM {
                  /* border: 2px solid blue; */
                  padding: 15px;
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                  height: 450px;
                  gap: 20px;
                }
                .cardU .info {
                  font-size: 20px;
                }
            }
            @media (min-width: 2000px) {
                
                .mx-auto h5 {
                    font-size: 35px !important;
                }
                .mx-auto h1 {
                    font-size: 50px;
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
                .container-fluid.py-5 select {
                    width: 250px;
                    height: 30px;
                }
                #categoryFilter {
                    font-size: 1.5rem;
                }
                #categoryFilter option {
                    font-size: 15px !important; /* ukuran font di dalam pilihan dropdown */
                }
                #map {
                    height: 700px !important;
                }
                /* PROFILE DESA */
                .containerProDes {
                  width: 60%;
                }
                .proDes {
                  padding-left: 50px;
                }
                .proDes h2 {
                  font-size: 60px;
                }
                .proDes p {
                  font-size: 35px;
                }
                .proDes td {
                  font-size: 30px;
                }
                .gmbrDesa {
                  width: 50% !important;
                }

                /* WISATA */
               .containerWisata {
                  overflow: hidden;
                  width: 2500px;
                  padding: 80px !important;
                }
                .gridWisata {
                  grid-template-columns: repeat(auto-fit, minmax(850px, 1fr));
                  height: 900px;
                  /* padding: 15px; */
                }
                .cardW .info {
                  margin-left: 4px;
                  font-size: 30px;
                }
                .cardW img {
                  height: 300px;
                }

                /* UMKM */
                .containerUMKM {
                  /* border: 2px solid red; */
                  padding: 80px;
                  margin: 25px;
                }
                .gridUMKM {
                  /* border: 2px solid blue; */
                  /* padding: 15px; */
                  display: grid;
                  grid-template-columns: repeat(auto-fit, minmax(700px, 1fr));
                  height: 600px;
                  gap: 20px;
                }
                .cardU img {
                  height: 300px;
                }
                .cardU .info {
                  font-size: 30px;
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
                        <a href="{{ url('infografis') }}" class="nav-item nav-link">Infografis</a>
                        <a href="{{ url('maps') }}" class="nav-item nav-link">Maps</a>
                        <a href="{{ url('berita') }}" class="nav-item nav-link">Berita</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Profile Desa</a>
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
    @foreach ($wilayaheach as $itemWilayah)
      <h3 class="text-white display-3 mb-4 text-center">
        <span class="small-text d-block">{{ $itemWilayah->jenis_wilayah }}</span>
        {{ $itemWilayah->nama_wilayah }}
      </h3>
      @endforeach
    </div>
    <!-- Header End -->

    <!-- Profil -->
    <div class="mx-auto text-center mb-5" style="max-width: 900px; margin-top: 100px;">
      <h5 class="section-title px-3"> perkenalkan </h5>
      <h1 class="mb-0">Profil Desa</h1>
    </div>
    <div class="containerProDes">
      <div class="proDes">
        @foreach ($wilayaheach as $itemWilayah)
        <h2>{{ $itemWilayah->nama_wilayah }}</h2>
        <p><strong>Batas {{ $itemWilayah->jenis_wilayah }}</strong></p>
        <table>
          <tr>
            <td class="highlight">Utara :</td>
            <td>{{ $itemWilayah->batas_utara }}</td>
          </tr>
          <tr>
            <td class="highlight">Timur :</td>
            <td>{{ $itemWilayah->batas_timur }}</td>
          </tr>
          <tr>
            <td class="highlight">Selatan :</td>
            <td>{{ $itemWilayah->batas_selatan }}</td>
          </tr>
          <tr>
            <td class="highlight">Barat :</td>
            <td>{{ $itemWilayah->batas_barat }}</td>
          </tr>
        </table>
        <p><strong>Luas Desa:</strong> {{ number_format($itemWilayah->luas_wilayah, 0, ',', '.') }} Ha</p>
        <p><strong>Jumlah Penduduk:</strong> {{ number_format($jumlah_penduduk->jumlah_penduduk, 0, ',', '.') }} Jiwa</p>
      </div>

      <div class="gmbrDesa">
        <img
          src="{{ asset('storage/' . $itemWilayah->gambar_wilayah) }}"
          class="img-fluid rounded shadow-lg"
          alt="Gambar Desa"
        />
      </div>
      @endforeach
    </div>
    <!-- Profil end -->

    <!-- Infografis start -->
    <div class="container-fluid bg-light service py-5">
      <div class="container py-5">
          <div class="mx-auto text-center mb-5" style="max-width: 900px;">
              <h5 class="section-title px-3">Demografi</h5>
              <h1 class="mb-0">Penduduk</h1>
          </div>
          <div class="row g-4">
              <div class="col-lg-6">
                  <div class="row g-4">
                      <div class="col-12">
                          <a href="#berdasarkan-dusun" class="service-content-inner d-flex justify-content-end align-items-center bg-white border border-primary rounded p-4 pe-0">
                              <div class="service-content text-end">
                                  <h5 class="mb-4">Berdasarkan Jenis Kelamin</h5>
                                  <p class="mb-0">Dolor sit amet consectetur adipisicing elit...</p>
                              </div>
                              <div class="service-icon p-4">
                                  <i class="fa fa-user fa-4x text-primary"></i>
                              </div>
                          </a>
                      </div>
                      
                      <div class="col-12">
                          <a href="#berdasarkan-umur" class="service-content-inner d-flex justify-content-end align-items-center bg-white border border-primary rounded p-4 pe-0">
                              <div class="service-content text-end">
                                  <h5 class="mb-4">Berdasarkan Kelompok Umur</h5>
                                  <p class="mb-0">Dolor sit amet consectetur adipisicing elit...</p>
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
                                  <p class="mb-0">Dolor sit amet consectetur adipisicing elit...</p>
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
                                  <p class="mb-0">Dolor sit amet consectetur adipisicing elit...</p>
                              </div>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="d-flex justify-content-center mt-4">
              <a href="#berdasarkan-pendidikan" class="service-content-inner d-flex align-items-center justify-content-center bg-white border border-primary rounded p-4" style="width: 50%;">
                  <div class="service-icon p-4">
                      <i class="fa fa-user fa-4x text-primary"></i>
                  </div>
                  <div class="service-content text-center">
                      <h5 class="mb-4">Berdasarkan Pendidikan</h5>
                      <p class="mb-0">Dolor sit amet consectetur adipisicing elit...</p>
                  </div>
              </a>
          </div>  
      </div>
  </div>

   <!--  Berdasarkan Dusun-->
  <div class="container-fluid testimonial py-5" id="berdasarkan-jen-kel">
      <div class="container py-5">
          <div class="mx-auto text-center" style="max-width: 500px;">
              <h1 class="mb-0">Berdasarkan Jenis Kelamin</h1>
              <canvas id="Chart1"></canvas>
          </div>
      </div>
  </div>
  <!-- END -->

  <!-- Berdasarkan kelompok umur  -->
  <div class="container-fluid testimonial py-5" id="berdasarkan-umur">
      <div class="container py-5">
          <div class="mx-auto text-center" style="max-width: 600px;">
              <h1 class="mb-0">Berdasarkan Kelompok Umur</h1>
              <canvas id="Chart2"></canvas>
          </div>
      </div>
  </div>
  <!-- END -->

   <!-- Berdasarkan pekerjaan  -->
   <div class="container-fluid testimonial py-5" id="berdasarkan-pekerjaan">
      <div class="container py-5">
          <div class="mx-auto text-center" style="max-width: 900px;">
              <h1 class="mb-0">Berdasarkan Pekerjaan</h1>
              <canvas id="Chart3"></canvas>
          </div>
      </div>
  </div>
  <!-- END -->

  <!-- Berdasarkan agama  -->
  <div class="container-fluid testimonial py-5" id="berdasarkan-agama">
      <div class="container py-5">
          <div class="mx-auto text-center" style="max-width: 900px;">
              <h1 class="mb-0">Berdasarkan Agama</h1>
              <canvas id="Chart4"></canvas>
          </div>
      </div>
  </div>
  <!-- END -->

  <!-- Berdasarkan pendidikan  -->
  <div class="container-fluid testimonial py-5" id="berdasarkan-pendidikan">
      <div class="container py-5">
          <div class="mx-auto text-center" style="max-width: 900px;">
              <h1 class="mb-0">Berdasarkan Pendidikan</h1>
              <canvas id="Chart5"></canvas>
          </div>
      </div>
  </div>
  <!-- END -->

  <!-- Infografis END -->



    <!-- Wisata start -->
    <div class="mx-auto text-center mb-5" style="max-width: 900px; margin-top: 100px;">
      <h5 class="section-title px-3"> Wisata </h5>
      @foreach ($wilayaheach as $itemWilayah)
      <h1 class="mb-0">Jelajahi Wisata Lokal {{ $itemWilayah->nama_wilayah }}</h1>
      @endforeach
    </div>
    <div class="containerWisata">
      <div class="gridWisata">
          @foreach($wisata as $itemWisata)
          <div class="cardW">
            <a href="{{ url('profildesa/' . $itemWisata->id_wilayah . '/wisata/' . $itemWisata->id_wisata) }}">
              <img src="{{ asset('storage/' . $itemWisata->gambar_wisata) }}" alt="{{ $itemWisata->nama_tempat }}"></a>
              <div class="info">{{ $itemWisata->nama_tempat }}</div>
          </div>
          @endforeach
      </div>
  </div>

  <!-- UMKM start -->
  <div class="mx-auto text-center mb-5" style="max-width: 900px; margin-top: 100px;">
    <h5 class="section-title px-3"> UMKM </h5>
    @foreach ($wilayaheach as $itemWilayah)
    <h1 class="mb-0">Produk Khas Daerah {{ $itemWilayah->nama_wilayah }}</h1>
    @endforeach
  </div>
  <div class="containerUMKM" style="margin-bottom: 50px;"> 
    <div class="gridUMKM">
        @foreach ($jenis_umkm as $itemJenisUmkm)
        <div class="cardU" data-bs-toggle="modal" data-bs-target="#umkmModal-{{ $itemJenisUmkm->id_jenis_umkm }}">
            <img src="{{ asset('storage/' . $itemJenisUmkm->gambar_jenis_umkm) }}" alt="">
            <div class="info">{{ $itemJenisUmkm->jenis_umkm }}</div>
        </div>
        @endforeach
    </div>
</div>

<@foreach ($jenis_umkm as $itemJenisUmkm)
<div class="modal fade" id="umkmModal-{{ $itemJenisUmkm->id_jenis_umkm }}" tabindex="-1" aria-labelledby="umkmModalLabel-{{ $itemJenisUmkm->id_jenis_umkm }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" style="margin-top: 73px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="umkmModalLabel-{{ $itemJenisUmkm->id_jenis_umkm }}">
            {{ $itemJenisUmkm->jenis_umkm }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        @foreach ($umkm->where('id_jenis_umkm', $itemJenisUmkm->id_jenis_umkm) as $itemUmkm)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $itemUmkm->gambar_umkm) }}" class="img-fluid rounded-start" alt="{{ $itemUmkm->nama_umkm }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $itemUmkm->nama_umkm }}</h5>
                        <p class="card-text">{!! $itemUmkm->keterangan !!}</p>
                        <a href="{{ url('profildesa/' . $itemUmkm->id_wilayah . '/detailumkm/' . $itemUmkm->id_umkm) }}" class="btn btn-primary rounded-pill mt-3 align-self-start">Info Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endforeach


<!-- Kegiatan Start -->
        <!-- Kegiatan Terbaru -->
        <div class="container-fluid destination py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-3" style="max-width: 900px;">
                    <h5 class="section-title px-3">Galeri</h5>
                    @foreach ($wilayaheach as $itemWilayah)
                    <h1 class="mb-0">Kegiatan {{ $itemWilayah->nama_wilayah }}</h1>
                    @endforeach
                </div>
                <div class="container-fluid mb-4">
                    <div class="container py-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-md-5">
                                <div class="h-100" >
                                  @if($kegiatanterbaru && $kegiatanterbaru->gambar_kegiatan)
                                    <img src="{{asset('storage/' . $kegiatanterbaru->gambar_kegiatan)}}" class="img-fluid" style="width: 400px; height: auto; margin-left: 40px;" alt="">
                                  @else
                                  <p>Belum ada Gambar</p>
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
                                                            <p class="mb-4">{!! $keg->keterangan !!}</p>                        
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


        <!-- BERITA -->
        <div class="container mb-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Highlight</h5>
                @foreach($wilayaheach as $itemWilayah)
                <h1 class="mb-0">Berita Terbaru {{ $itemWilayah->nama_wilayah }}</h1>
                @endforeach
            </div>
            <div class="row">
                @foreach ($berita as $itemBerita)
                <div class="col-md-4">
                    <div class="card">
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
        <script src="{{ url('js/leaflet.js') }}"></script>

    </body>
    <script>
    function showUmkmPopup(title, content) {
    let popup = document.getElementById('umkm-popup');
    let overlay = document.getElementById('umkm-overlay');

    document.getElementById('umkm-popup-title').innerText = title;
    document.getElementById('umkm-popup-content').innerText = content;

    popup.classList.add('show');
    overlay.classList.add('show');
}

function closeUmkmPopup() {
    let popup = document.getElementById('umkm-popup');
    let overlay = document.getElementById('umkm-overlay');

    popup.classList.remove('show');
    overlay.classList.remove('show');
}

    const ctx1 = document.getElementById('Chart1');
        new Chart(ctx1, {
          type: 'pie',
          data: {
            labels: ['Laki-Laki', 'Perempuan'], 
            datasets: [{
              label: 'Jumlah Penduduk',
              data: {!! json_encode(array_values($rasio_jenis_kelamin)) !!}, 
              backgroundColor: [
			  'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)' 
              ]
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

	const ctx2 = document.getElementById('Chart2');
        new Chart(ctx2, {
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


    const ctx3 = document.getElementById('Chart3');
        new Chart(ctx3, {
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


    const ctx4 = document.getElementById('Chart4');
        new Chart(ctx4, {
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


    const ctx5 = document.getElementById('Chart5');
        new Chart(ctx5, {
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
</html>