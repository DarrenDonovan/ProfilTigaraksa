<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Wisata</title>

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

    <!-- Bootstrap CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"/>
    
    <!-- STYLESHEET -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    <!-- 360 ESSENTIALS -->
    <link rel="stylesheet" href="{{ url('css/site.css') }}" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Leaflet Map Scripts -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      crossorigin=""
    ></script>
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css"
    />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <!-- Custom CSS -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      /* Hero Section */
      .hero {
        position: relative;
        background: url("img/pantai.jpg") center/cover no-repeat;
        height: 60dvh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 20px;
      }

      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
      }

      .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            background: rgba(255, 255, 255, 0.7);
            color: black;
            padding: 10px 15px;
            border-radius: 50%;
            text-decoration: none;
            transition: 0.3s;
            z-index: 3;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 1);
        }

      .hero-text {
        position: relative;
        z-index: 2;
      }

      .hero-text h4 {
        font-size: 35px;
        margin-bottom: 10px;
        color: #ddd;
      }

      .hero-text h1 {
        font-size: 60px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #ddd;
      }

      .hero-text p {
        font-size: 18px;
        line-height: 1.5;
        color: rgb(181, 187, 192);
        max-width: 800px;
      }

      /* 360 */
      .explore-360 {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px;
        margin-top: 100px;
        gap: 20px;
      }
      .text-container {
        text-align: center;
        max-width: 800px;
      }

      .text-container h2 {
        font-size: 30px;
        margin-bottom: 10px;
      }

      .text-container p {
        font-size: 16px;
        line-height: 1.5;
        color: #555;
      }

      @-webkit-keyframes spin {
        from {
          -webkit-transform: rotateY(0);
        }
        to {
          -webkit-transform: rotateY(-360deg);
        }
      }
      @keyframes spin {
        from {
          transform: rotateY(0);
        }
        to {
          transform: rotateY(-360deg);
        }
      }

      .vrContainer {
        width: 80%;
        height: 700px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
      }

      #viewer {
        position: absolute;
        /* left: 50%; */
        top: 0px;
        /* margin-left: -320px; */
        width: 100%;
        height: 100%;
        overflow: hidden;
        -webkit-transition: -webkit-transform 3s;
        transition: transform 3s;
        -webkit-perspective: 600px;
        perspective: 1000px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        border-radius: 10px;

      }
      #cube {
        width: 100%;
        height: 400px;
        position: absolute;
        transform-style: preserve-3d;
        -webkit-transform-style: preserve-3d;
        transform-origin: 50% 50% 750px;
        -webkit-transform-origin: 50% 50% 750px;
        transform: translateZ(-150px);
        -webkit-transform: translateZ(-150px);
      }

      #cube img {
        position: absolute;
        width: 1500px;
        height: 1500px;
        top: 50%;
        left: 50%;
        margin-top: -750px;
        margin-left: -750px;
        opacity: 0.8;
        -webkit-transition: -webkit-transform 3s;
        transition: transform 3s;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }
      .front {
        -webkit-transform: translateZ(750px) translateZ(-750px);
        transform: translateZ(750px) translateZ(-750px);
      }
      .right {
        -webkit-transform: translateZ(750px) rotateY(-90deg) translateZ(-750px);
        transform: translateZ(750px) rotateY(-90deg) translateZ(-750px);
      }
      .left {
        -webkit-transform: translateZ(750px) rotateY(90deg) translateZ(-750px);
        transform: translateZ(750px) rotateY(90deg) translateZ(-750px);
      }
      .rear {
        -webkit-transform: translateZ(750px) translateZ(750px) rotateY(180deg);
        transform: translateZ(750px) translateZ(750px) rotateY(180deg);
      }
      .roof {
        -webkit-transform: translateZ(750px) rotateX(-90deg) translateZ(-750px);
        transform: translateZ(750px) rotateX(-90deg) translateZ(-750px);
      }
      .floor {
        -webkit-transform: translateZ(750px) rotateX(90deg) translateZ(-750px);
        transform: translateZ(750px) rotateX(90deg) translateZ(-750px);
      }

      /* MAP */
      .explore-map {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: auto;
        margin: auto;
        gap: 20px;
      }

      .explore-map .text-container {
        text-align: center;
        max-width: 750px;
      }
      .explore-map .text-container h2 {
        font-size: 28px;
        margin-bottom: 10px;
      }

      .explore-map .text-container p {
        font-size: 16px;
        line-height: 1.5;
        color: #555;
      }

      .map-container {
        width: 75%;
      }
      /* CONTENT PAKETAN */
      .container-fluid.mt-5 {
        padding-top: 100px;
      }
      .mx-auto.text-center.mb-5 {
        margin-top: 100px;
      }
      .containerPaket {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
      }
      .contentPaketan {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        width: 90%;
      }

      .paket {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding-block: 10px;
      }

      .paket img {
        width: 100%;
        border-radius: 10px;
      }

      .btn {
        background-color: #13357b;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        width: 100%;
      }

      .btn:hover {
        background-color: #0a2a5c;
      }

      /* Responsif  */
      @media (min-width: 2000px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 50px;
        }
        .hero-text h1 {
            font-size: 70px;
        }
        .hero-text p {
            max-width: 900px;
            font-size: 25px;
        }
        /* 360 */
        .explore-360 {
            height: auto;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            max-width: 100% !important;
            width: 50%;
        }
        .text-container h2 {
            font-size: 50px;
        }
        .text-container p {
            font-size: 25px;
            
        }
        .vrContainer {
            width: 90%;
            height: 700px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 55px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 100%;
            text-align: center;
            width: 50%;
        }
        .explore-map .text-container h2 {
            font-size: 50px;
        }
        .explore-map .text-container p {
            font-size: 25px;
        }
        .map-container {
            width: 90%;
            height: 700px;
            margin-top: 20px;
        }
        #map {
            height: 100% !important;
            width: 100%;
        }
        /* PAKETAN */
        .container-fluid.mt-5 {
            padding-top: 0px;
        }
        .mx-auto.text-center.mb-5 {
            margin-bottom: 15px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 30px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 50px;
        }
        .contentPaketan {
            gap: 30px;
        }
        .paket a {
            font-size: 30px;
            font-weight: lighter;
        }
        .back-button {
            top: 30px;
            left: 30px;
            font-size: 28px;
            padding: 12px 18px;
        }
        /* FOOTER */
        .footer {
            padding: 20px 10px; /* Mengurangi padding agar lebih pas */
        }
        .footer-item.d-flex.flex-column {
            width: 600px;
            gap: 20px;
        }
        .footer-item h4 {
            font-size: 35px; /* Mengecilkan ukuran heading */
        }
        .footer-item a {
            font-size: 30px; /* Mengecilkan ukuran teks */
        }
        .footer-item i {
            font-size: 35px; /* Mengecilkan ikon */
        }
        
        .fas.fa-share.fa-2x.text-white.me-2{
            font-size: 40px;
        }
        .btn-square {
            width: 60px !important;
            height: 60px !important;
            padding: 4px;
        }
        
      }
      @media (max-width: 1441px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 30px;
        }
        .hero-text h1 {
            font-size: 45px;
        }
        .hero-text p {
            max-width: 750px;
            font-size: 17px;
        }
        /* 360 */
        .explore-360 {
            height: auto;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            width: 700px;
        }
        .text-container h2 {
            font-size: 25px;
        }
        .text-container p {
            font-size: 17px;
            
        }
        .vrContainer {
            width: 90%;
            height: 500px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 55px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 100%;
            text-align: center;
        }
        .explore-map .text-container h2 {
            font-size: 25px;
        }
        .explore-map .text-container p {
            font-size: 17px;
        }
        .map-container {
            width: 100%;
            /* height: 300px; */
            margin-top: 20px;
        }
        #map {
            /* height: 100% !important; */
            width: 100%;
        }
        /* PAKETAN */
        .container-fluid.mt-5 {
            padding-top: 0px;
        }
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 15px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 25px;
        }
        /* FOOTER */
        .footer {
            padding: 20px 10px; /* Mengurangi padding agar lebih pas */
        }

        .footer-item h4 {
            font-size: 24px; /* Mengecilkan ukuran heading */
        }
        .footer-item a {
            font-size: 16px; /* Mengecilkan ukuran teks */
        }
        .footer-item i {
            font-size: 16px; /* Mengecilkan ikon */
        }
        .footer .btn-square {
            width: 28px; /* Mengecilkan tombol sosial media */
            height: 28px;
            font-size: 12px;
            padding: 4px;
        }
        .fas.fa-share.fa-2x.text-white.me-2{
            font-size: 32px;
        }
        .btn-square {
            width: 35px !important;
            height: 35px !important;
        }
        
      }
      @media (max-width: 1025px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 25px;
        }
        .hero-text h1 {
            font-size: 40px;
        }
        .hero-text p {
            max-width: 700px;
            font-size: 15px;
        }
        /* 360 */
        .explore-360 {
            height: auto;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            width: 700px;
        }
        .text-container h2 {
            font-size: 25px;
        }
        .text-container p {
            font-size: 17px;
            
        }
        .vrContainer {
            width: 90%;
            height: 500px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 55px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 100%;
            text-align: center;
        }
        .explore-map .text-container h2 {
            font-size: 25px;
        }
        .explore-map .text-container p {
            font-size: 17px;
        }
        .map-container {
            width: 100%;
            /* height: 300px; */
            margin-top: 20px;
        }
        #map {
            /* height: 100% !important; */
            width: 100%;
        }
        /* PAKETAN */
        .container-fluid.mt-5 {
            padding-top: 0px;
        }
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 15px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 25px;
        }
        /* FOOTER */
        .footer {
            padding: 20px 10px; /* Mengurangi padding agar lebih pas */
        }

        .footer-item h4 {
            font-size: 22px; /* Mengecilkan ukuran heading */
        }
        .footer-item a {
            font-size: 16px; /* Mengecilkan ukuran teks */
        }
        .footer-item i {
            font-size: 16px; /* Mengecilkan ikon */
        }
        .footer .btn-square {
            width: 28px; /* Mengecilkan tombol sosial media */
            height: 28px;
            font-size: 12px;
            padding: 4px;
        }
        .fas.fa-share.fa-2x.text-white.me-2{
            font-size: 32px;
        }
        .btn-square {
            width: 30px !important;
            height: 30px !important;
        }
      }
      @media (max-width: 768px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 20px;
        }
        .hero-text h1 {
            font-size: 35px;
        }
        .hero-text p {
            max-width: 500px;
            font-size: 15px;
        }
        /* 360 */
        .explore-360 {
            flex-direction: column;
            height: auto;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            max-width: 600px;
        }
        .text-container h2 {
            font-size: 20px;
        }
        .text-container p {
            font-size: 12px;
        }
        .vrContainer {
            width: 100%;
            height: 400px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 55px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 100%;
            text-align: center;
        }
        .explore-map .text-container h2 {
            font-size: 20px;
        }
        .explore-map .text-container p {
            font-size: 12px;
        }
        .map-container {
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }
        #map {
            height: 100% !important;
            width: 100%;
        }
        /* PAKETAN */
        .container-fluid.mt-5 {
            padding-top: 0px;
        }
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 13px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 20px;
        }
        /* FOOTER */
        .footer {
            padding: 20px 10px; /* Mengurangi padding agar lebih pas */
        }

        .footer-item h4 {
            font-size: 22px; /* Mengecilkan ukuran heading */
        }
        .footer-item a {
            font-size: 16px; /* Mengecilkan ukuran teks */
        }
        .footer-item i {
            font-size: 16px; /* Mengecilkan ikon */
        }
        .footer .btn-square {
            width: 28px; /* Mengecilkan tombol sosial media */
            height: 28px;
            font-size: 12px;
            padding: 4px;
        }
        .fas.fa-share.fa-2x.text-white.me-2{
            font-size: 32px;
        }
        .btn-square {
            width: 30px !important;
            height: 30px !important;
        }
      }
      @media (max-width: 501px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 15px;
        }
        .hero-text h1 {
            font-size: 30px;
        }
        .hero-text p {
            max-width: 230px;
            font-size: 11px;
        }
        /* 360 */
        .explore-360 {
            margin: 15px;
            margin-top: 60px;
            padding-inline: 20px;
            /* max-width: 310px; */
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            max-width: 300px;
        }
        .text-container h2 {
            font-size: 20px;
        }
        .text-container p {
            font-size: 12px;
        }
        .vrContainer {
            width: 100%;
            height: 400px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 30px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 300px;
            text-align: center;
        }
        .explore-map .text-container h2 {
            font-size: 20px;
        }
        .explore-map .text-container p {
            font-size: 12px;
        }
        .map-container {
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }
        #map {
            height: 100% !important;
            width: 100%;
        }
        /* PAKETAN */
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 13px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 20px;
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
        .container-fluid.copyright .container .row.g-4 .col-md-6 {
            font-size: 12px;
        }
        .container-fluid.copyright .container .col-md-6 i, .text-white {
            font-size: 12px;
        }
      }
      @media (max-width: 376px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 15px;
        }
        .hero-text h1 {
            font-size: 30px;
        }
        .hero-text p {
            max-width: 230px;
            font-size: 11px;
        }
        /* 360 */
        .explore-360 {
            margin: 15px;
            margin-top: 60px;
            padding-inline: 10px;
            /* max-width: 310px; */
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            max-width: 300px;

        }
        .text-container h2 {
            font-size: 20px;
        }
        .text-container p {
            font-size: 12px;
        }
        .vrContainer {
            width: 100%;
            height: 400px;
        }
        /* MAP */
        .explore-map {
            height: auto; 
            padding: 20px;
        }
        .explore-map .text-container {
            padding-right: 0;
            max-width: 300px;
            text-align: center;
        }
        .explore-map .text-container h2 {
            font-size: 20px;
        }
        .explore-map .text-container p {
            font-size: 12px;
        }
        .map-container {
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }
        #map {
            height: 100% !important;
            width: 100%;
        }
        /* PAKETAN */
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;
        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 13px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 20px;
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
        .container-fluid.copyright .container .row.g-4 .col-md-6 {
            font-size: 12px;
        }
        .container-fluid.copyright .container .col-md-6 i, .text-white {
            font-size: 12px;
        }
      }
      @media (max-width: 322px) {
        /* HERO */
        .hero-text h4 {
            margin-top: 50px;
            margin-bottom: 10px;
            font-size: 15px;
        }
        .hero-text h1 {
            font-size: 30px;
        }
        .hero-text p {
            max-width: 230px;
            font-size: 11px;
        }
        /* 360 */
        .explore-360 {
            margin-top: 60px;
            padding-inline: 9px;
            flex-wrap: wrap;
        }
        .text-container {
            text-align: center;
            max-width: 250px;
        }
        .text-container h2 {
            font-size: 20px;
        }
        .text-container p {
            font-size: 12px;
        }
        .vrContainer {
            width: 100%;
            height: 400px;
        }
        /* MAP */
        .explore-map {
            padding: 20px;
            height: auto;
        }

        .explore-map .text-container {
            padding-right: 0;
            max-width: 100%;
            text-align: center;
        }

        .explore-map .text-container h2 {
            font-size: 20px;
        }

        .explore-map .text-container p {
            font-size: 12px;
        }

        .map-container {
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }

        #map {
            height: 100% !important;
            width: 100%;
        }
        /* PAKETAN */
        .mx-auto.text-center.mb-5 {
            margin-bottom: 0px !important;

        }
        .mx-auto.text-center.mb-5 h5 {
            font-size: 13px;
        }
        .mx-auto.text-center.mb-5 h1 {
            font-size: 20px;
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
        .container-fluid.copyright .container .row.g-4 .col-md-6 {
            font-size: 12px;
        }
        .container-fluid.copyright .container .col-md-6 i, .text-white {
            font-size: 12px;
        }
    }
    </style>
  </head>
  <body>
   <!-- Hero Section -->
   <header class="hero">
    <div class="overlay"></div>
    <a href="{{ url('profildesa/' . $wisata->id_wilayah) }}" class="back-button">&#8592;</a>
    <div class="hero-text">
        <h4>Wisata</h4>
        <h1>{{ $wisata->nama_tempat }}</h1>
    </div>
</header>

<!-- Container 360 -->
<section class="explore-360">
<div class="text-container">
    <h2>Jelajahi {{ $wisata->nama_tempat }} dalam 360°</h2>
</div>

<div class="vrContainer">
    <div id="viewer">
        <div id="cube">
            @if (!empty($wisata_vr->gambar_depan))
            <img class="front" src="{{ asset('storage/' . $wisata_vr->gambar_depan) }}" alt="" />
            <img class="right" src="{{ asset('storage/' . $wisata_vr->gambar_kanan) }}" alt="" />
            <img class="rear" src="{{ asset('storage/' . $wisata_vr->gambar_belakang) }}" alt="" />
            <img class="left" src="{{ asset('storage/' . $wisata_vr->gambar_kiri) }}" alt="" />
            <img class="roof" src="{{ asset('storage/' . $wisata_vr->gambar_atas) }}" alt="" />
            <img class="floor" src="{{ asset('storage/' . $wisata_vr->gambar_bawah) }}" alt="" />
            @else
            <p>Gambar belum diinput</p>
            @endif
        </div>
    </div>
</div>
</section>

<!-- Container Map dengan Tracking -->
    <section class="explore-map">
      <div class="text-container">
        <h2>Telusuri {{ $wisata->nama_tempat }} dengan Peta Interaktif</h2>
        <p>
          {!! $wisata->keterangan !!}
        </p>
        <a href="{{ route('rute', $wisata->id_wisata) }}" class="btn-detail">Lihat Peta Lengkap</a>
      </div>

      <div class="map-container">
        <div
          id="map"
          style="height: 500px; width: 100%; border-radius: 10px"
        ></div>
      </div>

      <script>
        const map = L.map("map").setView(
          [-6.2514908482756955, 106.62807214954837],
          13
        );

        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 19,
          attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">Tracking Maps</a>',
        }).addTo(map);

        const userMarker = L.marker([-6.2514908482756955, 106.62807214954837])
          .addTo(map)
          .bindPopup("Lokasi Anda");

        const wisataLat = {!! json_encode($wisata->latitude) !!}
        const wisataLng = {!! json_encode($wisata->longitude) !!}
        
        const routingControl = L.Routing.control({
          waypoints: [
            L.latLng(-6.2514908482756955, 106.62807214954837),
            L.latLng(wisataLat, wisataLng),
          ],
          createMarker: function () {
            return null;
          },
          routeWhileDragging: true,
          show: false, // Menyembunyikan panel instruksi
        }).addTo(map);

        // Tambahkan marker merah untuk tujuan
        const tujuanMarker = L.marker(
          [wisataLat, wisataLng],
          {
            icon: L.icon({
              iconUrl:
                "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png",
              shadowUrl:
                "https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png",
              iconSize: [25, 41],
              iconAnchor: [12, 41],
              popupAnchor: [1, -34],
              shadowSize: [41, 41],
            }),
          }
        )
          .addTo(map)
          .bindPopup("Tujuan Anda");

        function updateUserLocation(position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          userMarker.setLatLng([lat, lng]).update();

          routingControl.setWaypoints([
            L.latLng(lat, lng),
            L.latLng(wisataLat, wisataLng),
          ]);

          routingControl.on("routesfound", function (e) {
            const bounds = L.latLngBounds(
              e.routes[0].coordinates.map((coord) => [coord.lat, coord.lng])
            );
            map.fitBounds(bounds, { padding: [20, 20] });
          });
        }

        function errorHandler(error) {
          console.log("Error getting location:", error);
        }

        if (navigator.geolocation) {
          navigator.geolocation.watchPosition(
            updateUserLocation,
            errorHandler,
            {
              enableHighAccuracy: true,
            }
          );
        } else {
          alert("Geolocation tidak didukung oleh browser ini.");
        }
      </script>
    </section>

    <!-- CONTAINER PAKETAN -->
    <div class="container-fluid mt-5">
        <div class="mx-auto text-center mb-5" style="max-width: 800px;">
            <h5 class="section-title px-3">Paket Wisata</h5>
            <h1 class="mb-0">Tentukan Paket Wisatamu</h1>
        </div>
    </div>
    
    <div class="containerPaket">
        <div class="contentPaketan">
            @foreach ($paket_wisata as $itemPaket)
            <div class="paket">
                <img src="{{ asset('storage/' . $itemPaket->gambar_paket) }}" alt="" />
                <a href="{{ url('profildesa/' . $wisata->id_wilayah . '/wisata/' . $wisata->id_wisata . '/paketwisata/' . $itemPaket->id_paket) }}" class="btn">{{ $itemPaket->nama_paket }} </a>
            </div>
            @endforeach
        </div>
    </div>

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

<script>
      (function () {
  var x1, y1, moving = false,
    $viewer = $("#viewer"),
    $cube = $("#cube"),
    w_v = $viewer.width(),
    h_v = $viewer.height(),
    c_yaw = 0,
    c_pitch = 0,
    perspective = 525;

  function updateRotation(x2, y2) {
    var dist_x = x2 - x1,
        dist_y = y2 - y1,
        yaw = (Math.atan2(dist_y, perspective) / Math.PI) * 180,
        pitch = (-Math.atan2(dist_x, perspective) / Math.PI) * 180,
        vendors = ["-webkit-", "-moz-", ""];

    c_yaw += yaw;
    c_pitch += pitch;
    c_yaw = Math.min(90, c_yaw);
    c_yaw = Math.max(-90, c_yaw);
    c_pitch %= 360;

    yaw = c_yaw;
    pitch = c_pitch;

    for (let i in vendors) {
      $cube.css(
        vendors[i] + "transform",
        `translateZ(-150px) rotateX(${yaw}deg) rotateY(${pitch}deg)`
      );
    }

    x1 = x2;
    y1 = y2;
  }

  // Untuk desktop
  $viewer.on("mousedown", function (e) {
    x1 = e.pageX;
    y1 = e.pageY;
    moving = true;
    e.preventDefault();
  });

  $(document).on("mousemove", function (e) {
    if (moving) {
      updateRotation(e.pageX, e.pageY);
    }
  }).on("mouseup", function () {
    moving = false;
  });

  // Untuk touchscreen
  $viewer.on("touchstart", function (e) {
    x1 = e.originalEvent.touches[0].pageX;
    y1 = e.originalEvent.touches[0].pageY;
    moving = true;
    e.preventDefault();
  });

  $(document).on("touchmove", function (e) {
    if (moving) {
      updateRotation(
        e.originalEvent.touches[0].pageX,
        e.originalEvent.touches[0].pageY
      );
    }
  }).on("touchend", function () {
    moving = false;
  });

  // Hentikan rotasi kalau mouse/jari keluar dari viewer
  $(document).on("mousemove touchmove", function (e) {
    var offset = $viewer.offset();
    var mouseX = (e.pageX !== undefined) ? e.pageX : e.originalEvent.touches[0].pageX;
    var mouseY = (e.pageY !== undefined) ? e.pageY : e.originalEvent.touches[0].pageY;

    if (
      mouseX < offset.left ||
      mouseX > offset.left + $viewer.width() ||
      mouseY < offset.top ||
      mouseY > offset.top + $viewer.height()
    ) {
      moving = false;
    }
  });
})();

    </script>
  </body>
</html>
