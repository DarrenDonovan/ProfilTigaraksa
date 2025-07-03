<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Paket Wisata</title>

  <!-- Bootstrap CSS -->
  <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

  <!-- Custom CSS -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet" />
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      overflow-x: hidden;
      line-height: 1.6;
      color: #333;
    }

    section {
      padding: 20px 0;
    }

    /* Hero Section */
    .hero {
      position: relative;
      background: url('img/tour-booking-bg.jpg') center/cover no-repeat;
      height: 480px;
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

    .hero-text {
      position: relative;
      z-index: 2;
      width: 90%;
      max-width: 800px;
      padding: 20px;
      margin: 0 auto;
      text-align: center;
    }

    .hero-text h1 {
      font-size: clamp(1.5rem, 5vw, 3rem);
      font-weight: bold;
      color: #ddd;
      margin-bottom: 15px;
    }

    .hero-text h4 {
      font-size: clamp(1rem, 3.5vw, 1.5rem);
      color: #ddd;
      margin-bottom: 10px;
    }

    .hero-text p {
      font-size: clamp(0.875rem, 3vw, 1.125rem);
      color: #eee;
      margin-bottom: 0;
    }

    /* Back Button */
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
      transition: background 0.3s;
      z-index: 3;
    }

    .back-button:hover {
      background: rgba(255, 255, 255, 1);
    }

    /* Card Image */
    .photo-card {
      position: relative;
      border-radius: 10px;
      overflow: hidden;
      cursor: pointer;
    }

    .photo-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    /* Popup Gallery */
    .popup-gallery {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: rgba(0, 0, 0, 0.8);
      padding: 10px;
      border-radius: 5px;
      z-index: 100;
    }

    .popup-gallery img {
      width: 80px;
      height: 80px;
      margin: 5px;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Typography */
    h2 {
      font-size: clamp(1.5rem, 4vw, 2.25rem);
      font-weight: bold;
      margin-bottom: 40px;
    }

    h4,
    h5 {
      font-size: clamp(1rem, 3vw, 1.5rem);
      margin: 20px 0;
      color: #444;
    }

    ul {
      padding-left: 20px;
    }

    ul li {
      margin-bottom: 10px;
      font-size: clamp(0.875rem, 2.5vw, 1rem);
    }

    /* Table */
    table.table {
      background-color: #f8f9fa;
    }

    .table th,
    .table td {
      text-align: center;
      vertical-align: middle;
    }

    .list-group-item {
      background: #fff;
      border: none;
      padding-left: 0;
      font-size: clamp(0.875rem, 2vw, 1rem);
    }

    /* Image Hover */
    .img-fluid.rounded {
      transition: transform 0.3s ease;
    }

    .img-fluid.rounded:hover {
      transform: scale(1.05);
      z-index: 2;
      position: relative;
    }

    /* Grid Row */
    .row.g-3>div {
      margin-bottom: 15px;
    }

    .card-title {
      font-size: clamp(1rem, 2.5vw, 1.25rem);
      margin-bottom: 15px;
      font-weight: 600;
    }

    /* Fasilitas Section */
    .fasilitas {
      text-align: center;
      padding: 40px 20px;
    }

    .fasilitas-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 50px;
      margin-top: 20px;
    }

    .kolom {
      max-width: 250px;
      text-align: left;
    }

    .accommodation-wrapper {
      position: relative;
    }

    .accommodation-scroll {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding-bottom: 1rem;
      scroll-behavior: smooth;
    }

    /* Remove fixed height and use min-height instead */
    .accommodation-card {
      flex: 0 0 300px;
      /* Fixed width */
      min-height: 450px;
      /* Minimum height */
      display: flex;
      flex-direction: column;
      background-color: #fff;
      border-radius: 0.25rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      transition: box-shadow 0.3s ease;
    }

    .accommodation-card:hover {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .accommodation-card img.card-img-top {
      height: 180px;
      object-fit: cover;
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
      width: 100%;
    }

    .accommodation-card .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 1rem;
    }

    /* Ensure button stays at bottom */
    .accommodation-card .card-body .btn {
      margin-top: auto;
      align-self: flex-end;
      width: 100%;
    }

    .scroll-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 100;
      background: rgba(255, 255, 255, 0.8);
      color: #333;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 1.5rem;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .scroll-btn:hover {
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
    }

    .scroll-btn.left {
      left: 15px;
    }

    .scroll-btn.right {
      right: 15px;
    }

    /* Hide buttons when not needed */
    .scroll-btn.hidden {
      display: none;
    }

    /* Mengecilkan card Pilihan Paket Wisata */
    .card.pilihan-wisata {
      max-width: 300px;
      margin-left: auto;
      margin-right: auto;
      font-size: 0.95rem;
      padding: 0.5rem;
    }

    .card.pilihan-wisata img {
      height: 180px;
      object-fit: cover;
      border-radius: 0.5rem;
    }

    .card.pilihan-wisata .card-title {
      font-size: 1.1rem;
    }

    .card.pilihan-wisata .card-body p,
    .card.pilihan-wisata .card-body li {
      font-size: 0.9rem;
      line-height: 1.4;
    }

    .card.pilihan-wisata ul {
      padding-left: 1.2rem;
    }

    .gallery-wrapper {
      position: relative;
      width: 100%;
      max-width: 1140px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .gallery-scroll {
      overflow-x: auto;
      gap: 20px;
      padding: 10px 0;
      scrollbar-width: none;
      -ms-overflow-style: none;
      scroll-behavior: smooth;
    }

    .gallery-scroll::-webkit-scrollbar {
      display: none;
    }

    .gallery-scroll.d-flex {
      display: flex;
    }

    .gallery-item {
      min-width: 320px;
      flex-shrink: 0;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
      background: white;
      cursor: pointer;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .gallery-item:hover {
      transform: scale(1.05);
    }

    .gallery-item img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      display: block;
    }

    .gallery-caption {
      margin-top: 8px;
      font-weight: 600;
      font-size: 20px;
      color: #222;
    }

    .scroll-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(255, 255, 255, 0.9);
      border: none;
      cursor: pointer;
      font-size: 22px;
      padding: 8px 12px;
      border-radius: 50%;
      box-shadow: 0 0 6px rgba(0, 0, 0, 0.25);
      user-select: none;
      z-index: 10;
      transition: background-color 0.3s ease;
    }

    .scroll-btn.left {
      left: -50px;
    }

    .scroll-btn.right {
      right: -50px;
    }

    .scroll-btn:hover {
      background-color: rgba(255, 255, 255, 1);
    }

    .floating-btn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      z-index: 9999;
      background-color: #198754; /* Bootstrap success green */
      color: white;
      padding: 12px 15px;
      border-radius: 50%;
      text-align: center;
      font-size: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
      transition: background-color 0.3s ease, transform 0.3s ease;
      border: none;
    }
    
    .floating-btn:hover {
      background-color: #157347;
      transform: scale(1.1);
    }


    @media (min-width: 320px) and (max-width: 575px) {
      .hero {
        height: auto;
        padding: 60px 0;
        text-align: center;
      }

      .hero-text h1 {
        font-size: 1.75rem;
      }

      .hero-text h4 {
        font-size: 1rem;
      }

      .hero-text p {
        font-size: 0.875rem;
      }

      .back-button {
        top: 10px;
        left: 10px;
        font-size: 18px;
        padding: 6px 10px;
      }

      .photo-card img,
      .popup-gallery img {
        border-radius: 8px;
      }

      .fasilitas-container {
        align-items: center;
        gap: 24px;
        flex-direction: column;
      }

      .kolom h4 {
        margin-top: 1rem;
        color: #333;
      }

      .kolom {
        width: 90%;
        max-width: 360px;
        background-color: #fff;
        margin: 0 auto;
        text-align: left;
        padding: 12px 16px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      }

      .kolom ul {
        padding-left: 1.2rem;
        list-style-type: disc;
        margin-bottom: 1rem;
      }

      .container {
        max-width: 100%;
        padding-inline: 1rem;
      }

      .deskripsi-pantai {
        text-align: justify !important;
        font-size: 0.95rem;
        line-height: 1.6;
        padding-inline: 1rem;
        margin-top: 1rem;
      }

      /* Galeri Aktivitas */
      .gallery-wrapper {
        padding-inline: 0.5rem;
        overflow: hidden;
        position: relative;
      }

      .gallery-scroll {
        gap: 12px;
        padding: 10px 0;
      }

      .gallery-item {
        min-width: 200px;
        max-width: 220px;
        flex-shrink: 0;
        border-radius: 10px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
      }

      .gallery-item img {
        height: 150px;
        object-fit: cover;
        width: 100%;
        border-radius: 10px;
      }

      .gallery-caption {
        font-size: 0.85rem;
        padding: 6px 0;
      }

      .scroll-btn {
        width: 32px;
        height: 32px;
        font-size: 1.2rem;
        top: 45%;
      }

      .scroll-btn.left {
        left: 5px;
      }

      .scroll-btn.right {
        right: 5px;
      }
    }

    @media (max-width: 614px) {
      .kolom {
        max-width: 90%;
        margin: 0 auto;
        padding: 1rem;
      }
    }

    @media (min-width: 576px) and (max-width: 768px) {
      .hero {
        height: 320px;
      }

      .container {
        max-width: 100%;
        /* Biarkan kontainer full lebar */
        padding-inline: 1rem;
        /* Atau padding lebih kecil */
      }

      .fasilitas-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        /* Supaya tetap responsif */
        gap: 20px;
        padding-inline: 1rem;
        /* Bisa tambahkan padding */
      }

      .kolom {
        max-width: 90%;
        /* Perbesar lebar kolom */
        background-color: #fff;
        padding: 1rem;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        text-align: left;
      }

      .kolom h4 {
        margin-top: 1rem;
        color: #333;
      }

      .kolom ul {
        padding-left: 1.2rem;
        list-style-type: disc;
        margin-bottom: 1rem;
      }
    }

    @media (min-width: 768px) and (max-width: 1024px) {

      .hero-text {
        padding-inline: 2rem;
        max-width: 700px;
        margin: 0 auto;
      }

      .hero-text h1 {
        font-size: 2.5rem;
        text-align: center;
      }

      .hero-text p {
        font-size: 1rem;
        text-align: center;
      }

      /* Update paragraf container agar tidak terlalu melebar dan nyaman dibaca */
      section.container p {
        max-width: 800px;
        margin: 0 auto;
        text-align: justify;
        font-size: clamp(0.95rem, 1.2vw, 1.1rem);
        line-height: 1.7;
      }

      .container {
        max-width: 95%;
        padding-inline: 2rem;
      }
    }

    @media (min-width: 768px) and (max-width: 991px) {

      /* Ubah fasilitas dari 3 kolom ke 2 kolom supaya lebih nyaman di tablet */
      .fasilitas-container {
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
      }

      .kolom {
        width: 45%;
      }
    }

    @media (min-width: 769px) and (max-width: 991px) {
      .hero {
        height: 400px;
      }
    }

    @media (min-width: 992px) {
      .hero {
        height: 480px;
      }

      .photo-card img {
        border-radius: 12px;
      }

      .container {
        max-width: 90%;
        padding-inline: 3rem;
      }
    }

    @media (min-width: 2000px) {
      .container {
        max-width: 95%;
        padding-left: 5rem;
        padding-right: 5rem;
        margin: 0 auto;
      }

      .fasilitas-container {
        display: flex;
        justify-content: center;
        gap: 50px;
      }

      .kolom {
        max-width: 500px;
        /* Lebih lebar biar lega */
        padding: 2rem;
        /* Tambah padding biar nyaman */
        text-align: left;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }

      .hero-text h1 {
        font-size: 5rem;
        /* Lebih gede biar standout */
      }

      .hero-text h4 {
        font-size: 3rem;
      }

      .hero-text p {
        font-size: 2rem;
        max-width: 1300px;
        margin: 0 auto;
      }

      .deskripsi-pantai {
        font-size: 2.2rem !important;
        line-height: 2.3;
        max-width: 1400px;
        margin-inline: auto;
        text-align: justify;
      }

      section.container p,
      .card-body p,
      .card-body li {
        font-size: 1.5rem;
        line-height: 1.8;
      }

      .fasilitas-container ul li {
        font-size: 1.6rem;
        /* Tambah biar li di fasilitas lebih besar */
        line-height: 1.6;
      }

      .card.pilihan-wisata {
        max-width: 500px;
        font-size: 1.4rem;
        padding: 1.5rem;
      }

      .card.pilihan-wisata .card-title {
        font-size: 1.8rem;
      }

      .card.pilihan-wisata .card-body p,
      .card.pilihan-wisata .card-body li {
        font-size: 1.4rem;
      }

      .accommodation-card {
        flex: 0 0 450px;
        min-height: 600px;
      }

      .accommodation-card .card-body {
        padding: 2.2rem;
      }

      .accommodation-card .card-title {
        font-size: 1.7rem;
      }

      .gallery-caption {
        font-size: 1.7rem;
      }

      h2 {
        font-size: 3.5rem;
      }

      h4,
      h5 {
        font-size: 2.5rem;
      }
    }
  </style>


</head>

<body>

  <!-- Hero Section -->
  <header class="hero">
    <div class="overlay"></div>
    <a href="{{ url('profildesa/' . $paket_wisata->id_wilayah . '/wisata/' . $paket_wisata->id_wisata) }}" class="back-button">&#8592;</a>
    <div class="hero-text">
      <h4>Wisata</h4>
      <h1>{{ $paket_wisata->nama_paket }}</h1>
    </div>
  </header>

  <!-- Photo Gallery -->
<div class="container my-5">
  <div class="row">
    <!-- Main Image -->
    <div class="col-md-3 mb-4">
      <div class="photo-card">
        <img src="{{ asset('storage/' . $paket_wisata->gambar_paket) }}" alt="Main Image" class="img-fluid" style="height: 150px; object-fit: cover;" />
      </div>
    </div>
    @foreach($dokum_paket as $itemDokum)
    <div class="col-md-3 mb-4">
      <div class="photo-card">
        <img src="{{ asset('storage/' . $itemDokum->gambar) }}" alt="Photo {{ $itemDokum->id }}" class="img-fluid" style="height: 150px; object-fit: cover;" />
      </div>
    </div>
    @endforeach
  </div>
  </div>

  <!-- Deskripsi -->
  <section class="container my-5">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center">Tentang {{ $paket_wisata->nama_paket }}</h2>
        <p class="deskripsi-pantai text-justify mt-3">
          {!! $paket_wisata->tentang_paket !!}
        </p>
      </div>
    </div>
  </section>

  <!-- Fasilitas -->
  <section class="fasilitas">
    <h2 class="judul">Fasilitas {{ $paket_wisata->nama_paket }}</h2>
    <div class="fasilitas-container">
      <!-- Fasilitas 1 -->
      <div class="kolom">
        <h4><strong>Fasilitas Umum</strong></h4>
          {!! $paket_wisata->fasilitas_umum !!}
        <h4><strong>Fasilitas Keamanan</strong></h4>
          {!! $paket_wisata->fasilitas_keamanan !!}
      </div>

      <!-- Fasilitas 2 -->
      <div class="kolom">
        <h4><strong>Hiburan & Aktivitas</strong></h4>
          {!! $paket_wisata->fasilitas_hiburan !!}
        <h4><strong>Kuliner & Belanja</strong></h4>
          {!! $paket_wisata->kuliner_belanja !!}
      </div>

      <!-- Fasilitas 3 -->
      <div class="kolom">
        <h4><strong>Fasilitas Kenyamanan</strong></h4>
          {!! $paket_wisata->fasilitas_kenyamanan !!}
        <h4><strong>Aksesibilitas</strong></h4>
          {!! $paket_wisata->aksesibilitas !!}
      </div>
    </div>
  </section>

  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-5">Penginapan Sekitar Pantai</h2>
      <div class="accommodation-wrapper">
        <button class="scroll-btn left" aria-label="Scroll Left">&#8249;</button>
        <div class="accommodation-scroll d-flex">

          @foreach($penginapan as $itemPenginapan)
          <div class="accommodation-card card shadow-sm">
            <img src="{{ asset('storage/' . $itemPenginapan->gambar_penginapan) }}" class="card-img-top" alt="{{ $itemPenginapan->nama_penginapan }}">
            <div class="card-body">
              <h5 class="card-title">{{ $itemPenginapan->nama_penginapan }}</h5>
              <p class="mb-2 text-muted">
                {!! $itemPenginapan->keterangan !!}
              </p>
              <p class="mb-1">📍 {{ $itemPenginapan->estimasi_jarak }} dari {{ $paket_wisata->nama_tempat }}</p>
              <p class="mb-2"><strong>💰 {{ $itemPenginapan->harga_per_malam }}</strong></p>
              <div class="mb-3">
                {!! $itemPenginapan->fasilitas !!}
              </div>
              <a href="https://wa.me/{{ $itemPenginapan->no_whatsapp }}" target="_blank" class="btn btn-sm btn-success w-100">Hubungi via WhatsApp</a>
            </div>
          </div>
          @endforeach
        </div>
        <button class="scroll-btn right" aria-label="Scroll Right">&#8250;</button>
      </div>
    </div>

  </section>

  <section class="bg-white py-5">
    <div class="container">
        <section class="bg-white py-5">
          <div class="container">
            <h2 class="text-center mb-4">Galeri Aktivitas</h2>
            <div class="gallery-wrapper">
              <button class="scroll-btn left" aria-label="Scroll Left">&#8249;</button>
              <div class="gallery-scroll d-flex px-3">
                @foreach($galeri_aktivitas as $itemGaleri)
                <div class="gallery-item">
                  <img src="{{ asset('storage/' . $itemGaleri->gambar_aktivitas) }}" alt="{{ $itemGaleri->nama_aktivitas }}" />
                  <div class="gallery-caption">{{ $itemGaleri->nama_aktivitas }}</div>
                </div>
                @endforeach
              </div>
              <button class="scroll-btn right" aria-label="Scroll Right">&#8250;</button>
            </div>
          </div>
        </section>

        <a href="https://wa.me/{{ $paket_wisata->no_whatsapp }}" class="floating-btn" target="_blank" title="Hubungi Kami">
          <i class="bi bi-whatsapp"></i>
        </a>

        <!-- Bootstrap JS -->
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            // Accommodation carousel
            const accLeftBtn = document.querySelector('.accommodation-wrapper .scroll-btn.left');
            const accRightBtn = document.querySelector('.accommodation-wrapper .scroll-btn.right');
            const accScroll = document.querySelector('.accommodation-scroll');

            if (accLeftBtn && accRightBtn && accScroll) {
              accLeftBtn.addEventListener('click', () => {
                accScroll.scrollBy({ left: -320, behavior: 'smooth' });
              });

              accRightBtn.addEventListener('click', () => {
                accScroll.scrollBy({ left: 320, behavior: 'smooth' });
              });
            }

            // Gallery carousel
            const galleryLeftBtn = document.querySelector('.gallery-wrapper .scroll-btn.left');
            const galleryRightBtn = document.querySelector('.gallery-wrapper .scroll-btn.right');
            const galleryScroll = document.querySelector('.gallery-scroll');

            if (galleryLeftBtn && galleryRightBtn && galleryScroll) {
              galleryLeftBtn.addEventListener('click', () => {
                galleryScroll.scrollBy({ left: -320, behavior: 'smooth' });
              });

              galleryRightBtn.addEventListener('click', () => {
                galleryScroll.scrollBy({ left: 320, behavior: 'smooth' });
              });

              // Update button visibility based on scroll position
              function updateGalleryButtons() {
                galleryLeftBtn.classList.toggle('hidden', galleryScroll.scrollLeft === 0);
                galleryRightBtn.classList.toggle('hidden',
                  galleryScroll.scrollLeft + galleryScroll.clientWidth >= galleryScroll.scrollWidth - 10
                );
              }

              // Initial check
              updateGalleryButtons();

              // Update on scroll
              galleryScroll.addEventListener('scroll', updateGalleryButtons);
            }
          });
        </script>

</body>

</html>