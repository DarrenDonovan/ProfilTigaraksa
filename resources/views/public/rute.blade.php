<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Rute</title>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <!-- Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <!-- Leaflet Geocoder Plugin -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 500px;
            width: 100%;
        }

        /* Hero Section */
        .hero {
            position: relative;
            background: url('img/pantai.jpg') center/cover no-repeat;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
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
        }

        .hero-text h4 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #ddd;
        }

        .hero-text h1 {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #ddd;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.5;
        }

        /* Tombol Kembali */
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

        #map-container {
            width: 90%;
            max-width: 1100px;
            margin: 20px auto;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        #map {
            height: 600px;
        }

        .leaflet-routing-alt {
            margin-bottom: 20px;
        }

        .leaflet-routing-instructions {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .leaflet-routing-instruction {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .leaflet-routing-instruction:last-child {
            border-bottom: none;
        }

        .leaflet-routing-icon {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
        }

        .leaflet-routing-text {
            flex: 1;
            word-wrap: break-word;
        }

        .leaflet-routing-distance {
            margin-left: auto;
            font-weight: bold;
            color: #333;
            white-space: nowrap;
        }

        .panel-wrapper {
            width: 90%;
            max-width: 1100px;
            margin: 20px auto;
            box-sizing: border-box;
        }

        .panel-wrapper .leaflet-routing-container {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box;
            padding: 1rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        /* Default: vertical layout (map then directions) */
        #map-directions-wrapper {
            display: block;
        }

        /* === RESPONSIVE STYLES === */

        /* Horizontal layout: panel di samping map (≥1024px) */
        @media (min-width: 1024px) {
            #map-directions-wrapper {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: flex-start;
                gap: 20px;
                width: 90%;
                max-width: 1400px;
                margin: 0 auto;
            }

            #map-container {
                width: 65%;
                padding: 0;
            }

            #map {
                height: 600px;
                width: 100%;
            }

            #directions-container {
                width: 35%;
                max-height: 600px;
                overflow-y: auto;
            }

            .panel-wrapper .leaflet-routing-container {
                width: 100% !important;
                max-width: 100% !important;
                font-size: 1rem;
            }
        }

        /* Mobile Medium (≤768px) */
        @media (max-width: 768px) {
            .hero {
                height: 300px;
                padding: 15px;
            }

            .hero-text h1 {
                font-size: 28px;
            }

            .hero-text h4 {
                font-size: 16px;
            }

            .hero-text p {
                font-size: 14px;
            }

            .back-button {
                top: 10px;
                left: 10px;
                font-size: 20px;
                padding: 8px 12px;
            }

            #map-container {
                width: 100%;
                padding: 0 15px;
                box-sizing: border-box;
            }

            #map {
                height: 400px;
                width: 100%;
            }
        }

        /* Mobile Small (≤425px) */
        @media (max-width: 425px) {
            #map-container {
                width: 100% !important;
                padding: 0 12px;
                margin: 20px auto 0 auto;
                box-sizing: border-box;
            }

            #map {
                height: 300px !important;
                width: 100% !important;
            }

            body {
                padding-bottom: 50px;
            }
        }

        /* Super Wide Screens (≥2000px) */
        @media (min-width: 2000px) {
            .hero {
                height: 450px;
                padding: 30px;
            }

            .hero-text h1 {
                font-size: 60px;
            }

            .hero-text h4 {
                font-size: 26px;
            }

            .hero-text p {
                font-size: 22px;
            }

            .back-button {
                top: 30px;
                left: 30px;
                font-size: 28px;
                padding: 12px 18px;
            }

            #map-directions-wrapper {
                max-width: 1800px;
                margin: 0 auto;
                padding: 0 20px;
                display: flex;
                gap: 30px;
            }

            #map-container {
                width: 68%;
                padding: 0;
            }

            #map {
                height: 750px;
            }

            #directions-container {
                width: 32%;
                max-height: 750px;
                overflow-y: auto;
            }

            .leaflet-routing-container {
                font-size: 1.1rem;
                padding: 1.5rem;
            }
        }
    </style>

</head>

<body>
    <!-- Hero Section -->
    <header class="hero">
        <div class="overlay"></div>
        <a href="{{ url('profildesa/' . $wisata->id_wilayah . '/wisata/' . $wisata->id_wisata) }}" class="back-button">&#8592;</a>
        <div class="hero-text">
            <h4>Wisata</h4>
            <h1>{{ $wisata->nama_tempat }}</h1>
            <p>Temukan rute terbaik menuju lokasi {{ $wisata->nama_tempat }} dengan peta interaktif ini.</p>
        </div>
    </header>

    <!-- Map & Directions Wrapper -->
    <div id="map-directions-wrapper">
        <div id="map-container">
            <div id="map"></div>
        </div>

        <div id="directions-container" class="panel-wrapper"></div>
    </div>



    <script>
        const wisataLat = {!! $wisata->latitude !!}
        const wisataLng = {!! $wisata->longitude !!}
        const map = L.map('map').setView([-6.200000, 106.816666], 13); // Jakarta

        const tileLayer1 = L.tileLayer('https://tiles.mapindo.com/osm/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> & <a href="https://mapindo.com/">Mapindo</a>'
        });

        const tileLayer2 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; Tracking Maps'
        });

        tileLayer1.addTo(map);
        tileLayer1.on('tileerror', function () {
            map.removeLayer(tileLayer1);
            tileLayer2.addTo(map);
        });

        // Marker Lokasi Pengguna
        const userMarker = L.marker([-6.2514908482756955, 106.62807214954837]).addTo(map)
            .bindPopup("Lokasi Anda");

        // Routing
        const routingControl = L.Routing.control({
            waypoints: [
                L.latLng(-6.2514908482756955, 106.62807214954837),
                L.latLng(wisataLat, wisataLng)
            ],
            createMarker: function () { return null; },
            routeWhileDragging: true
        }).addTo(map);

        routingControl.on('routesfound', function () {
            const container = document.querySelector('.leaflet-routing-container');
            const wrapper = document.getElementById('directions-container');
            if (container && wrapper) {
                wrapper.innerHTML = '';
                wrapper.appendChild(container);
            }
        });

        // Marker tujuan awal
        let tujuanMarker = L.marker([wisataLat, wisataLng], {
            icon: L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            })
        }).addTo(map).bindPopup("Tujuan Anda");

        // Geocoder klik manual di peta
        L.Control.geocoder({
            defaultMarkGeocode: false
        })
            .on('markgeocode', function (e) {
                const latlng = e.geocode.center;

                if (tujuanMarker) {
                    map.removeLayer(tujuanMarker);
                }

                tujuanMarker = L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    })
                }).addTo(map)
                    .bindPopup(e.geocode.name)
                    .openPopup();

                const userLatLng = userMarker.getLatLng();
                routingControl.setWaypoints([
                    L.latLng(userLatLng.lat, userLatLng.lng),
                    latlng
                ]);

                map.setView(latlng, 15);
            }).addTo(map);

        // Lokasi real-time
        function updateUserLocation(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            userMarker.setLatLng([lat, lng]).update();

            if (tujuanMarker) {
                routingControl.setWaypoints([
                    L.latLng(lat, lng),
                    tujuanMarker.getLatLng()
                ]);
            }
        }

        function errorHandler(error) {
            console.log("Error mendapatkan lokasi:", error);
        }

        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(updateUserLocation, errorHandler, {
                enableHighAccuracy: true
            });
        } else {
            alert("Geolocation tidak didukung di browser ini.");
        }
    </script>

</body>

</html>