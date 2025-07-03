<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Peta Kecamatan Tigaraksa</title>
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

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            #map { height: 500px; }

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

                /* MAPS */
                .container-fluid.py-5 {
                    width: 100% !important;
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
                    /* margin-left: 30px !important; */
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
                }
                .container h3 {
                    font-size: 35px;
                }
                .mx-auto h3 {
                    font-size: 20px;
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
            @media (min-width: 770) and (max-width: 1024px) {
                .mx-auto h5 {
                    font-size: 26px !important;
                }
                .mx-auto h1 {
                    font-size: 19px;
                }
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

            @media  (min-width: 2000px) {
                
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
                        <a href="{{ url('maps') }}" class="nav-item nav-link active">Maps</a>
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
                <h3 class="text-white display-3 mb-4">Maps</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Peta -->
        <div class="container-fluid packages py-5" >
            <div class="mx-auto text-center mb-5" style="max-width: 900px; margin-top: 100px;">
                <h5 class="section-title px-3">Peta Kecamatan</h5>
                <h1 class="mb-0">Menampilkan Peta Kecamatan Tigaraksa Dengan Penandaan Lokasi Setiap Desa</h1>
            </div>
            <div class="container-fluid py-5">
                <select id="categoryFilter">
                    <option class="pilihan" value="all">Semua</option>
                    <option value="Desa">Desa</option>
                    <option value="Kelurahan">Kelurahan</option>
                </select>
                <div id="map"></div>
                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                <br>
            </div>
        </div>
        <!-- Peta End -->

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
        <script src="{{ url('lib/easing/easing.min.js') }}"></script>
        <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ url('lib/lightbox/js/lightbox.min.js') }}"></script>
        

        <!-- Template Javascript -->
        <script src="{{ url('js/main.js') }}"></script>

        <script>
            // PETA
// Pastikan script hanya berjalan jika elemen dengan ID "map" ada
if (document.getElementById("map")) {
  // Inisialisasi Peta
  var map = L.map("map").setView([-6.256097964960715, 106.4710449399145], 12); // Pastikan koordinat sesuai lokasi

  // Definisi tile layer (peta jalan dan peta satelit)
  var streetLayer = L.tileLayer(
    "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
      attribution: "&copy; OpenStreetMap contributors",
    }
  );

  var satelliteLayer = L.tileLayer(
    "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
    {
      attribution: "&copy; Esri & Contributors",
    }
  );

  // Tambahkan layer default (peta jalan)
  streetLayer.addTo(map);

  // Kontrol untuk memilih peta
  var baseMaps = {
    "Peta Jalan": streetLayer,
    "Peta Satelit": satelliteLayer,
  };

  L.control.layers(baseMaps).addTo(map);

  // Data Interest Points dengan kategori Desa dan Kelurahan
  var interestPoints = [
    @foreach ($lokasi_wilayah as $lokasi)
    {
      id: {{ $lokasi->id_wilayah }},
      name: "{{ $lokasi->nama_wilayah }}",
      lat: {{ $lokasi->latitude }},
      lon: {{ $lokasi->longitude }},
      category: "{{ $lokasi->jenis_wilayah }}",
      url: "{{ route('profildesa', $lokasi->id_wilayah) }}"
    }@if (!$loop->last),@endif
    @endforeach
];

console.log(interestPoints);

  // Array untuk menyimpan marker
  var markers = [];
  var redIcon = new L.Icon({
    iconUrl: '{{ url('assets/marker-icon/marker-icon-red.png') }}',
    shadowUrl: '{{ url('assets/marker-icon/marker-shadow.png') }}',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });

  var blueIcon = new L.Icon({
    iconUrl: '{{ url('assets/marker-icon/marker-icon-blue.png') }}',
    shadowUrl: '{{ url('assets/marker-icon/marker-shadow.png') }}',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });

  // Fungsi untuk menampilkan marker berdasarkan kategori
  function addMarkers(category) {
    // Hapus semua marker sebelum menambahkan yang baru
    markers.forEach((marker) => map.removeLayer(marker));
    markers = [];

    interestPoints.forEach((point) => {
      if (category === "all" || point.category === category) {
        if(point.category === "Desa"){
            var marker = L.marker([point.lat, point.lon], {icon: blueIcon}).addTo(map);
        }
        else{
            var marker = L.marker([point.lat, point.lon], {icon: redIcon}).addTo(map);
        }

        // Tooltip menggantikan Popup agar tidak ada tombol X dan menghilang otomatis
        marker.bindTooltip(`<b>${point.name}</b><br>${point.category}`, {
          permanent: false, // Tooltip hanya muncul saat cursor di atas
          direction: "top", // Menampilkan tooltip di atas marker
          opacity: 0.9, // Sedikit transparan agar terlihat bagus
        });

      @foreach ($wilayahNoKec as $itemWilayah)
        marker.on('click', function(){
            window.location.href = point.url
        });
      @endforeach

        markers.push(marker);        
      }
    });
  }

  // Tambahkan semua marker pertama kali
  addMarkers("all");

  // Event untuk filter berdasarkan kategori (jika elemen ada)
  var categoryFilter = document.getElementById("categoryFilter");
  if (categoryFilter) {
    categoryFilter.addEventListener("change", function () {
      addMarkers(this.value);
    });
  }
}

// PETA END
        </script>
        
    
    </body>

</html>