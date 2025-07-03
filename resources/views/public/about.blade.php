<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title> Tentang Kami</title>
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
        <!-- <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"> -->


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ url('css/style.css') }}" rel="stylesheet">

        <style>
            .visi-container, .misi-container {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .guide-item {
                width: 80%;
            }
            .col-6.col-md-3 {
                display: flex; 
                justify-content: center; 
                align-items: center;
            }

            .map-container {
                width: 100%;
                max-width: 600px; /* Sesuaikan dengan kebutuhan */
                height: 400px; /* Sesuaikan */
                margin: auto; /* Agar tetap di tengah */
                }

            .map-container iframe {
                width: 100%;
                height: 100%;
                border-radius: 10px;
                }
            .containerInfoMap {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                gap: 50px;
                flex-wrap: wrap;
                max-width: 900px;
                margin: auto;
            }
            .info {
                flex: 1;
                min-width: 300px;
            }
            .map-container {
                flex: 1;
                min-width: 300px;
            }
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
                margin-left: 6px;
            }
            .dropdown-menu {
                max-height: 250px;
                overflow-y: auto;
                overflow-x: hidden;
                scroll-behavior: smooth;
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
                    font-size: 20px;
                }
                .p-3 h1 {
                    font-size: 35px;
                    border: 2px solid red;
                }
                .container h3 {
                    font-size: 35px;
                    /* border: 2px solid red; */
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 20px;
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
            @media (max-width: 992px) {
                .navbar-brand .fa {
                    font-size: 25px !important;
                }
                .navbar-brand .subtext {
                    margin: 0px !important;
                }
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
                /* LOGO */
                .h-100 {
                    width: 50%;
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
            @media (min-width: 249px) and (max-width: 321px){
                /* NAVBAR */
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
                /* LOGO */
                .h-100 {
                   width: 200px !important;

                }
                /* VISI MISI */
                .col-lg-7 {
                    font-size: 15px;
                    /* border: 2px solid rgb(255, 42, 0); */
                }
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 20px !important;
                    /* border: 2px solid blue; */
                }
                .section-title {
                    font-size: 13px !important;
                    max-width: 120px !important;
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 15px;
                }
                .mx-auto h1 {
                    font-size: 19px;
                }
                .visi-container h1 {
                    font-size: 20px !important;
                }
                .visi-container p, ul{
                    font-size: 13px;
                }
                .misi-container h1 {
                    font-size: 20px !important;
                }
                .misi-container p, ul{
                    font-size: 13px;
                }
                /* PERANGKAT DESA */
                .mx-auto.text-center.mb-5 .mb-0 {
                    /* border: 2px solid blue; */
                    font-size: 19px;
                }
                .row.g-4 {
                    /* border: 2px solid red; */
                    width: 110%;
                }
                .btn.btn-square {
                    height: 25px;
                    width: 30px;
                    /* border: 2px solid red; */
                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 2px solid red; */
                    display: flex;
                    /* gap: -3px; */
                    width: 130px;
                }
                .guide-item {
                    width: 100%;
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 15px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 17px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 14px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    width: 90% !important;
                    margin-left: 15px !important;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 17px;
                }
                .containerInfoMap .info p {
                    font-size: 14px;
                }
                .containerInfoMap .info table {
                    font-size: 14px;
                }
            }
            @media (min-width: 322px) and (max-width: 380px) {
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
                
                /* LOGO */
                .col-lg-5 {
                    padding-left: 85px;
                    display: flex;
                    align-items: center !important;
                }
                .h-100 {
                    width: 100%;
                }
                /* VISI MISI */
                .col-lg-7 {
                    font-size: 15px;
                    /* border: 2px solid rgb(255, 42, 0); */
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 13px !important;
                }
                .mx-auto h1 {
                    font-size: 19px !important;
                }
                .section-title {
                    font-size: 13px;
                    /* border: 2px solid blue; */
                }
                .visi-container h1 {
                    font-size: 20px !important;
                }
                .visi-container p, ul{
                    font-size: 13px;
                }
                .misi-container h1 {
                    font-size: 20px !important;
                }
                .misi-container p, ul{
                    font-size: 13px;
                }

                /* PERANGKAT */
                .btn.btn-square {
                    height: 24px;
                    width: 25px;

                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 2px solid red; */
                    display: flex;
                    /* gap: -3px; */
                    width: 155px;
                }
                .guide-item {
                    width: 100%;
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 15px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 17px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 14px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    width: 90% !important;
                    margin-left: 20px !important;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 17px;
                }
                .containerInfoMap .info p {
                    font-size: 14px;
                }
                .containerInfoMap .info table {
                    font-size: 14px;
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
            @media (min-width: 381px) and (max-width: 427px) {
                .navbar-brand .fa { 
                    font-size: 20px !important; /*logo*/
                    margin-right: 5px !important;
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
                .col-12.col-sm-6 {
                    width: 300px;
                    margin-left: 40px;
                }
                /* LOGO */
                .h-100 {
                    width: 200px !important;
                }
                /* VISI MISI */
                .col-lg-7 {
                    font-size: 20px;
                    /* border: 2px solid rgb(255, 42, 0); */
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 13px !important;
                }
                .mx-auto h1 {
                    font-size: 19px !important;
                } 
                .mx-auto.text-center.mb-5 .mb-0 { /* bawahnya tulisan biru yang ada garis*/
                    font-size: 19px;
                }
                .visi-container h1 {
                    font-size: 25px !important;
                }
                .visi-container p, ul{
                    font-size: 13px;
                }
                .misi-container h1 {
                    font-size: 25px !important;
                }
                .misi-container p, ul{
                    font-size: 13px;
                }

                /* PERANGKAT */
                
                .btn.btn-square {
                    /* border: 2px solid red; */
                    height: 27px;
                    width: 30px;
                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 2px solid red; */
                    display: flex;
                    gap: 2px;
                    width: 180px;
                }
                .guide-item {
                    width: 100%;
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 15px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 17px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 14px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    width: 90% !important;
                    margin-left: 23px !important;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 17px;
                }
                .containerInfoMap .info p {
                    font-size: 14px;
                }
                .containerInfoMap .info table {
                    font-size: 14px;
                }
            }
            
            @media (min-width: 427px) and (max-width: 769px){
                /* NAVBAR */
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
                    /* border: 2px solid red; */
                }
                /* LOGO */
                .h-100 {
                    width: 50% !important;
                    display: flex;
                }
                /* VISI MISI */
                .col-lg-7 {
                    font-size: 20px;
                    /* border: 2px solid rgb(255, 42, 0); */
                }
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 18px !important;
                }
                .mx-auto h1 {
                    font-size: 25px !important;
                } 
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 20px !important;
                    /* border: 2px solid blue; */
                }
                .visi-container h1 {
                    font-size: 25px !important;
                }
                .visi-container p, ul{
                    font-size: 14px;
                }
                .misi-container h1 {
                    font-size: 25px !important;
                }
                .misi-container p, ul{
                    font-size: 14px;
                }
                
                /* PERANGKAT */
                .col-6.col-md-3 {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    /* border: 2px solid red; */
                    /* padding: 0px; */
                }
                .guide-item {
                    /* border: 2px solid blue; */
                    width: 80%;
                }
                .btn.btn-square {
                    height: 27px;
                    width: 30px;
                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 2px solid red; */
                    display: flex;
                    gap: 2px;
                    width: 180px;
                    
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 15px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 17px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 14px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    width: 90% !important;
                    margin-left: 40px !important;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 17px;
                }
                .containerInfoMap .info p {
                    font-size: 14px;
                }
                .containerInfoMap .info table {
                    font-size: 14px;
                }
            }

            @media (min-width: 771) and (max-width: 1120px) {
                
                 /* LOGO */
                .col-lg-5 {
                    padding-left: 300px;
                    /* border: 2px solid blue; */

                }
                .h-100 {
                    /* border: 2px solid blue; */
                    width: 500px !important;
                }
                /* VISI MISI */
                .row.g-5.align-items-center {
                    /* border: 2px solid red; */
                    margin-top: 20px;
                    margin-bottom: 150px;
                }
                .col-lg-7 {
                    font-size: 35px;
                    /* border: 2px solid rgb(255, 42, 0); */
                    padding-right: 100px !important;
                }
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 20px !important;
                    /* border: 2px solid blue; */
                }
                .section-title { /* tulisan biru yang per section */
                    font-size: 35px;
                }
                .mx-auto.text-center.mb-5 .mb-0 { /* bawahnya tulisan biru yang ada garis*/
                    font-size: 37px;
                }
                .visi-container h1 {
                    font-size: 40px;
                }
                .visi-container p, ul{
                    font-size: 30px;
                }
                .misi-container h1 {
                    font-size: 40px;
                }
                .misi-container p, ul{
                    font-size: 30px;
                }
                .imageStruktur img {
                    margin-bottom: 150px;
                }
                
                /* PERANGKAT */
                
                .container-fluid.guide.py-5 {
                    /* border: 2px solid red; */
                    margin-bottom: 150px;
                }
                .container.py-5 {
                    margin: 0px;
                }
                .btn.btn-square {
                    height: 55px;
                    width: 17%;
                    /* border: 5px solid rebeccapurple; */
                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 5px solid red; */
                    display: flex;
                    gap: 2px;
                    width: 70%;
                    height: 80px;
                    
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 25px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 35px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 30px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    margin-top: 60px;
                    max-width: 100%;
                    width: 78%;
                    height: 600px;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 40px;
                }
                .containerInfoMap .info p {
                    font-size: 30px;
                }
                .containerInfoMap .info table {
                    font-size: 26px;
                }
                .map-container {
                    /* border: 2px solid blue; */
                    max-width: 100%;
                    height: 100%;
                    width: 100%;
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
            @media (max-width: 1441px) {
                .mx-auto.text-center.mb-5 h3 {
                    font-size: 20px;
                }
                .mx-auto h1 {
                    font-size: 40px;
                } 
            }
            @media  (min-width: 2000px) {
                /* NAVBAR */
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
                 /* LOGO */
                .col-lg-5 {
                    padding-left: 300px;
                    /* border: 2px solid blue; */

                }
                .h-100 {
                    /* border: 2px solid blue; */
                    width: 500px !important;
                }
                /* VISI MISI */
                .row.g-5.align-items-center {
                    /* border: 2px solid red; */
                    margin-top: 20px;
                    margin-bottom: 150px;
                }
                .col-lg-7 {
                    font-size: 35px;
                    /* border: 2px solid rgb(255, 42, 0); */
                    padding-right: 100px !important;
                }
                .mx-auto.text-center.mb-5 {
                    margin-bottom: 20px !important;
                    /* border: 2px solid blue; */
                }
                .section-title { /* tulisan biru yang per section */
                    font-size: 35px;
                }
                .mx-auto.text-center.mb-5 .mb-0 { /* bawahnya tulisan biru yang ada garis*/
                    font-size: 50px;
                }
                .visi-container h1 {
                    font-size: 40px;
                }
                .visi-container p, ul{
                    font-size: 30px;
                }
                .misi-container h1 {
                    font-size: 40px;
                }
                .misi-container p, ul{
                    font-size: 30px;
                }
                .imageStruktur img {
                    margin-bottom: 150px;
                }
                
                /* PERANGKAT */
                .container-fluid.guide.py-5 {
                    /* border: 2px solid red; */
                    margin-bottom: 150px;
                }
                .container.py-5 {
                    margin: 0px;
                }
                .btn.btn-square {
                    height: 55px;
                    width: 17%;
                    /* border: 5px solid rebeccapurple; */
                }
                .guide-img .guide-icon.rounded-pill.p-2 {
                    /* border: 5px solid red; */
                    display: flex;
                    gap: 2px;
                    width: 70%;
                    height: 80px;
                    
                }
                .guide-img .guide-icon.rounded-pill.p-2 .btn {
                    font-size: 25px !important;
                }
                .guide-title-inner .mt-3 {
                    font-size: 35px;
                }
                .guide-title-inner .mb-0 {
                    font-size: 30px;
                }

                /* LOKASI KECAMATAN */
                .containerInfoMap {
                    /* border: 2px solid red; */
                    margin-top: 60px;
                    max-width: 100%;
                    width: 78%;
                    height: 600px;
                }
                .info {
                    padding: 30px;
                }
                .containerInfoMap .info h2 {
                    font-size: 40px;
                }
                .containerInfoMap .info p {
                    font-size: 30px;
                }
                .containerInfoMap .info table {
                    font-size: 26px;
                }
                .map-container {
                    /* border: 2px solid blue; */
                    max-width: 100%;
                    height: 100%;
                    width: 100%;
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
            @media (max-width: 576px) {
                .bg-breadcrumb h3 {
                    font-size: 2rem !important;
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
                        <a href="{{ url('about') }}" class="nav-item nav-link active">Tentang Kami</a>
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
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Tentang Kami</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container-fluid py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h3 class="section-title px-3"> Visi Misi </h3>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5" style="padding: 0px; display: flex; justify-content: center;" >
                        <div class="h-100" style="display: flex; justify-content: center; align-items: center;">
                            @if ($about_us && $about_us->gambar_about)
                                <img src="{{ asset('storage/' . $about_us->gambar_about) }}" class="img-fluid w-50 h-100" alt="">
                            @else
                                <p>No image available yet.</p>
                            @endif                        
                        </div>
                    </div>
            
                    <div class="col-lg-7" style="padding: 30px; background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8))">

                        <!-- Container untuk Visi -->
                        @if($about_us)
                        <div class="visi-container p-4 mb-4" >
                            <h1 class="mb-4" style="font-size: 35px;">Visi</h1>
                            <p class="mb-4">{!! $about_us->visi !!}</p>
                        </div>

                        <!-- Container untuk Misi -->
                        <div class="misi-container p-4">
                            <h1 class="mb-4" style="font-size: 35px;">Misi</h1>
                            <p class="mb-0">{!! $about_us->misi !!}</p>
                        </div>
                        @else
                            <p>Belum ada Data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Struktur organisasi -->
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h3 class="section-title px-3"> Bagan Organisasi</h3>
            <h1 class="mb-0"> Struktur Pemerintahan Kecamatan </h1>
        </div>
        <div class="imageStruktur" style="display: flex; align-items: center; justify-content: center;">
            @if ($about_us && $about_us->bagan_organisasi)
                <img src="{{ asset('storage/' . $about_us->bagan_organisasi) }}" alt="Struktur Pemerintahan Kecamatan" class="img-fluid mt-3" style="width: 70%; height: auto;">
            @else
                <p>No image available yet.</p>
            @endif  
        </div>
        <!--  Struktur organisasi end-->

         <!-- Perangkat Start -->
         <div class="container-fluid guide py-5">
            <div class="container-fluid py-5" style="width: 100%; max-width: 100%;">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3"> Perangkat Kecamatan </h5>
                    <h1 class="mb-0"> Daftar nama dan Jabatan </h1>
                </div>
                <br>
                <div class="row g-4">
                    @foreach($camat as $itemCamat)
                    <div class="col-6 col-md-3">
                        <div class="guide-item">
                            <div class="guide-img">
                                <div class="guide-img-efects">
                                    @if ($itemCamat && $itemCamat->gambar_perangkat)
                                        <img src="{{ asset('storage/' . $itemCamat->gambar_perangkat) }}" style="height: 300px; width:100%; object-fit:cover" class="img-fluid w-100 rounded-top" alt="Image">
                                    @else
                                        <p>No image available yet.</p>
                                    @endif 
                                </div>
                                @if($itemCamat)
                                <div class="guide-icon rounded-pill p-2">
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemCamat->link_facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemCamat->link_instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemCamat->link_tiktok }}"><i class="fab fa-tiktok"></i></a> 
                                </div>
                                @endif
                            </div>
                            <div class="guide-title text-center rounded-bottom p-4">
                                @if($itemCamat)
                                <div class="guide-title-inner" style="min-height: 100px">
                                    <h4 class="mt-3">{{ $itemCamat->nama }}</h4>
                                    <p class="mb-0">{{ $itemCamat->jabatan }}</p>
                                </div>
                                @else
                                    <p>Belum ada Data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach($sekretaris as $itemSekretaris)
                    <div class="col-6 col-md-3">
                        <div class="guide-item">
                            <div class="guide-img">
                                <div class="guide-img-efects">
                                    @if ($itemSekretaris && $itemSekretaris->gambar_perangkat)
                                        <img src="{{ asset('storage/' . $itemSekretaris->gambar_perangkat) }}" style="height: 300px; width:100%; object-fit:cover" class="img-fluid w-100 rounded-top" alt="Image">
                                    @else
                                        <p>No image available yet.</p>
                                    @endif                                
                                </div>
                                <div class="guide-icon rounded-pill p-2">
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemSekretaris->link_facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemSekretaris->link_instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $itemSekretaris->link_tiktok }}"><i class="fab fa-tiktok"></i></a> 
                                </div>
                            </div>
                            <div class="guide-title text-center rounded-bottom p-4">
                                @if($itemSekretaris)
                                <div class="guide-title-inner" style="min-height:100px">
                                    <h4 class="mt-3">{{ $itemSekretaris->nama }}</h4>
                                    <p class="mb-0">{{ $itemSekretaris->jabatan }}</p>
                                </div>
                                @else
                                    <p>Belum ada Data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($kasi as $kepala_seksi)
                    <div class="col-6 col-md-3">
                        <div class="guide-item" >
                            <div class="guide-img">
                                <div class="guide-img-efects">
                                    @if ($kepala_seksi && $kepala_seksi->gambar_perangkat)
                                        <img src="{{ asset('storage/' . $kepala_seksi->gambar_perangkat) }}" style="height: 300px; width:100%; object-fit:cover" class="img-fluid w-100 rounded-top" alt="Image">
                                    @else
                                        <p>No image available yet.</p>
                                    @endif                                
                                </div>   
                                <div class="guide-icon rounded-pill p-2">
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kepala_seksi->link_facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kepala_seksi->link_instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kepala_seksi->link_tiktok }}"><i class="fab fa-tiktok"></i></a> 
                                </div>
                            </div>
                            <div class="guide-title text-center rounded-bottom p-4">
                                @if($kepala_seksi)
                                <div class="guide-title-inner" style="min-height: 100px">
                                    <h4 class="mt-3">{{ $kepala_seksi->nama }}</h4>
                                    <p class="mb-0">{{ $kepala_seksi->jabatan }}</p>
                                </div>
                                @else
                                    <p>Belum ada Data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($kepala_desa as $kades)
                    <div class="col-6 col-md-3">
                        <div class="guide-item">
                            <div class="guide-img">
                                <div class="guide-img-efects">
                                    <img src="{{ asset('storage/' . $kades->gambar_perangkat) }}" style="height: 300px; width:100%; object-fit:cover" class="img-fluid w-100 rounded-top" alt="Image">
                                </div>
                                <div class="guide-icon rounded-pill p-2">
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kades->link_facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kades->link_instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="{{ $kades->link_tiktok }}"><i class="fab fa-tiktok"></i></a> 
                                </div>
                            </div>
                            <div class="guide-title text-center rounded-bottom p-4">
                                <div class="guide-title-inner" style="min-height: 100px">
                                    <h4 class="mt-3">{{ $kades->nama }}</h4>
                                    <p class="mb-0">{{ $kades->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Perangkat End -->
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3"> Lokasi Desa </h5>
            <h1 class="mb-0"> Peta Lokasi Desa </h1>
        </div>
        

            <!-- Kotak Informasi -->
        <div class="containerInfoMap">
            <div class="info">
                <h2>Kecamatan Tigaraksa</h2>
                <p><strong>Batas Kecamatan</strong></p>
                <table>
                    <tr><td class="highlight">Utara</td><td>Kecamatan Cikupa - Balaraja</td></tr>
                    <tr><td class="highlight">Timur</td><td>Kecamatan Cikupa - Panongan </td></tr>
                    <tr><td class="highlight">Selatan</td><td>Kecamatan Jambe - Kabupaten Bogor</td></tr>
                    <tr><td class="highlight">Barat</td><td>Kecamatan Solear - Cisoka</td></tr>
                    <tr><td class="highlight">Luas Desa</td><td>{{ number_format($wilayahkecamatan->luas_wilayah, 0, ',', '.') }} Ha</td></tr>
                    <tr><td class="highlight">Jumlah Penduduk: </td><td>{{ number_format($jenis_kelamin_per_wilayah->laki_laki + $jenis_kelamin_per_wilayah->perempuan, 0, ',', '.') }} Jiwa</td></tr>
                </table>
            </div>
    
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126912.9796141675!2d106.38661133346228!3d-6.259697926417773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4206f20e931b2d%3A0xef390e4510eb920c!2sKec.%20Tigaraksa%2C%20Kabupaten%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1741580904300!5m2!1sid!2sid" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>

        <br>
        <br>
    

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
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>