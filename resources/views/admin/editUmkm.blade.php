<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{url('css/admin/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{url('css/admin/ready.css')}}">
	<link rel="stylesheet" href="{{url('css/admin/demo.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	 <!-- Icon Font Stylesheet -->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{url('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
		<link href="{{url('css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
		<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@4.2.0/dist/geosearch.css" />		

	</head>
<body>
   <!-- Topbar Start -->
   <div class="container-fluid bg-primary px-5 d-none d-lg-block topbar">
		<div class="row gx-0 justify-content-end"> <!-- Tambahkan justify-content-end -->
   			<div class="col-lg-4 text-end"> <!-- Gunakan text-end agar teks sejajar ke kanan -->
                <div class="d-inline-flex align-items-center justify-content-end" style="height: 45px; width: 500px">
					<small class="me-3 text-light"><i class="fa fa-user me-2"></i>{{ $wilayaheach->nama_wilayah }}</small>
                    @if(Auth::check() && Auth::user()->role==='superadmin')
					<a href="#" data-bs-toggle="modal" data-bs-target="#modal_removeAdmin"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Remove Admin</small></a>
                    <a href="{{url('admin/createadmin')}}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Add Admin</small></a>
                    @endif
                    <a href="{{url('logout')}}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Logout</small></a>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Remove Admin  -->
	<div class="modal fade" id="modal_removeAdmin" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   		<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Remove Admin</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
					<form action="{{ route('removeAdmin')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="admin">Nama Admin*</label>
							<select name="admin" class="form-control" required>
							    <option value="">-- Pilih Admin --</option>
							    @foreach ($users as $items)
							        <option value="{{ $items->id }}">
									{{ $items->name }}
									</option>
							    @endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary form-control">Save changes</button>
					</form>
	            </div>
	        </div>
	    </div>
	</div>

        <!-- Topbar End -->
		<div class="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a href="{{ route('admin') }}">
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.kegiatan') }}">
							<p>Kegiatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.profilWilayah') }}">
							<p>Profil Wilayah</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.penduduk') }}">
							<p>Kependudukan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.berita') }}">
							<p>Berita</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.wisata') }}">
							<p>Wisata</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.paketWisata') }}">
							<p>Paket Wisata</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.penginapan') }}">
							<p>Penginapan</p>
						</a>
					</li>
					<li class="nav-item active">
						<a href="{{ route('admin.umkm') }}">
							<p>UMKM</p>
						</a>
					</li>
					@if(Auth::check() && Auth::user()->role==='superadmin')
					<li class="nav-item">
						<a href="{{ route('admin.adminLog') }}">
							<p>Admin Log</p>
						</a>
					</li>
					@endif
				</ul>
		</div>

			<div class="main-panel">
				<div class="container-fluid">
					@if (Session::has('message'))
						<p class="alert alert-success mt-2">{{ Session::get('message') }}</p>
					@endif
					@if(Session::has('error'))
						    <div class="alert alert-danger mt-2">
						        {{ Session::get('error') }}
						    </div>
						@endif
					<a href="{{ route('admin.umkm') }}">
						<p style="font-size: 18px; text-decoration: underline; margin-top:10px">Back</p>
					</a>
		  			<!-- Daftar UMKM -->
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-2">Form Edit UMKM</h4>
					</div>
					
					<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
                                        <h4 class="page-title mt-1">Pilih Lokasi Berdasarkan Peta*</h4>
                                        <div id="map" style="height:400px"></div>
                                        @foreach ($umkm as $itemUMKM)
                                        <form action="{{ route('admin.updateUmkm', $itemUMKM->id_umkm)}}" method="post" enctype="multipart/form-data">
										    @csrf
                                            <div class="form-group row">
                                                <div class="col col-md-6">
                                                    <label for="latitude">Latitude*</label>
                                                    <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $itemUMKM->latitude }}" required>
                                                </div>
                                                <div class="col col-md-6">
                                                    <label for="longitude">Longitude*</label>
                                                    <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $itemUMKM->longitude }}" required>
                                                </div>
                                            </div>
										    <div class="form-group row">
                                                <div class="col col-md-4">
									    		    <label for="nama_umkm">Nama UMKM*</label>
									    		    <input type="text" class="form-control" name="nama_umkm" id="nama_umkm" value="{{ $itemUMKM->nama_umkm }}" required>
                                                </div>
                                                <div class="col col-md-4">
									    		    <label for="nama_wilayah">Nama Wilayah*</label>
                                                    @if (Auth::check() && Auth::user()->role === 'superadmin')
									    		        <select name="nama_wilayah" class="form-control" required>
									    		            <option value="">-- Pilih Wilayah --</option>
									    		            @foreach ($wilayahNoKec as $item)
									    		                <option value="{{ $item->id_wilayah }}" {{ $item->id_wilayah == $itemUMKM->id_wilayah ? 'selected' : '' }}>{{ $item->nama_wilayah }}</option>
									    		            @endforeach
									    		        </select>
                                                    @elseif (Auth::check() && Auth::user()->role === 'admin')
                                                        <select name="nama_wilayah" class="form-control" required>
									    		            <option value="{{ $wilayahUser->id_wilayah }}">{{ $wilayahUser->nama_wilayah }}</option>
									    		        </select>
                                                    @endif
                                                </div>
									    	    <div class="col col-md-4">
									    	    	<label for="jenis_umkm">Jenis UMKM*</label>
									    	    	<select name="jenis_umkm" class="form-control" required>
									    	    		<option value="">-- Pilih Jenis UMKM --</option>
									    	    		@foreach ($jenis_umkm as $itemJenisUMKM)
									    	    		    <option value="{{ $itemJenisUMKM->id_jenis_umkm }}" {{ $itemJenisUMKM->id_jenis_umkm == $itemUMKM->id_jenis_umkm ? 'selected' : '' }}>{{ $itemJenisUMKM->jenis_umkm }}</option>
									    	    		@endforeach
									    	    	</select>
									    	    </div>
                                            </div>
											<div class="form-group">
												<label for="alamat">Alamat*</label>
												<input type="text" class="form-control" id="alamat" name="alamat" value="{{ $itemUMKM->alamat }}" required>
											</div>
										    <div class="form-group">
										    	<label for="keterangan">Keterangan*</label>
										    	<textarea name="keterangan" class="form-control" id="keterangan" cols="50" rows="4" required>{{ $itemUMKM->keterangan }}</textarea>
										    </div>
										    <div class="form-group">					
										    	<label for="gambar_umkm">Gambar UMKM</label><br>
												<img src="{{ asset('storage/' . $itemUMKM->gambar_umkm) }}" id="preview" alt="" width="300" height="200" class="mb-3">
										    	<input type="file" name="gambar_umkm" id="gambar_umkm" class="form-control-file" accept="image/*" onchange="previewImage(event)">
										    </div>
											<div class="form-group row" id="dokum-wrapper">
											    <label>Gambar Lainnya UMKM</label>
											    	@foreach($dokum_umkm as $itemDokum)
											    	    <div class="mb-3 text-center col col-md-4">
											    	        <img src="{{ asset('storage/' . $itemDokum->gambar) }}" id="preview_{{ $itemDokum->id }}" class="img-fluid rounded" alt="Gambar Dokumentasi" style="height: 250px; width: 90%; object-fit:cover;">
											    	        <br>
											    	        <button type="button" class="btn btn-link mt-2" onclick="document.getElementById('input_{{ $itemDokum->id }}').click()">Ubah Gambar</button>
											    	        <input type="file" name="dokumentasi[{{ $itemDokum->id }}]" id="input_{{ $itemDokum->id }}" style="display: none;" accept="image/*" onchange="previewMultiple(event, {{ $itemDokum->id }})">

															<div class="form-check">
        													    <input class="form-check-input" type="checkbox" name="hapus_dokumentasi[]" value="{{ $itemDokum->id }}" id="hapus_{{ $itemDokum->id }}">
        													    <label class="form-check-label" for="hapus_{{ $itemDokum->id }}">Hapus gambar ini</label>
        													</div>
											    	    </div>
											    	@endforeach
												<div class="col-12 mt-2 mb-2">
												    <button type="button" class="btn btn-sm btn-success" onclick="tambahDokum()">+ Tambah Gambar</button>
												</div>
											</div>
											

                						    <button type="submit" class="btn btn-primary form-control">Save changes</button>
									    </form>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	
	<script src="{{url('js/admin/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{url('js/admin/core/popper.min.js')}}"></script>
	<script src="{{url('js/admin/core/bootstrap.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/chartist/chartist.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/chart-circle/circles.min.js')}}"></script>
	<script src="{{url('js/admin/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<script src="{{url('js/admin/ready.min.js')}}"></script>
	<script src="{{url('js/admin/demo.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	
	<script>
		// Pastikan script hanya berjalan jika elemen dengan ID "map" ada
		let currentmarker;
		
		var map = L.map("map").setView([
			{!! json_encode($wilayahUser->latitude) !!},
			{!! json_encode($wilayahUser->longitude) !!}
		], 15);
		
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '© OpenStreetMap contributors'
		}).addTo(map);
		
		var GeoSearchControl = window.GeoSearch.GeoSearchControl;
		var OpenStreetMapProvider = window.GeoSearch.OpenStreetMapProvider;
		
		var provider = new OpenStreetMapProvider();
		var searchControl = new GeoSearchControl({
			provider: provider,
			style: 'bar',
			showMarker: false,
			searchLabel: 'Cari Lokasi...',
			autoClose: true
		});
		
		map.addControl(searchControl);
		
		map.on('geosearch/showlocation', function(e) {
			const { x, y } = e.location;
			
			if (currentmarker) {
				map.removeLayer(currentmarker);
			}
			
			currentmarker = L.marker([y, x]).addTo(map);
			document.getElementById('latitude').value = y;
			document.getElementById('longitude').value = x;
		});
		
		@foreach($umkm as $itemUmkm)
		currentmarker = L.marker([
			{!! json_encode($itemUmkm->latitude) !!},
			{!! json_encode($itemUmkm->longitude) !!}
		]).addTo(map);
		@endforeach
		
		map.on('click', function(e) {
			var lat = e.latlng.lat;
			var lng = e.latlng.lng;
			
			document.getElementById('latitude').value = lat;
			document.getElementById('longitude').value = lng;
			
			if (currentmarker) {
				map.removeLayer(currentmarker);
			}
			
			currentmarker = L.marker([lat, lng]).addTo(map);
		});

		CKEDITOR.replace('keterangan');

		function previewImage(event) {
	  const file = event.target.files[0];
	  if (file) {
	    const reader = new FileReader();
	
	    reader.onload = function(e) {
	      document.getElementById('preview').src = e.target.result;
	    };

	    reader.readAsDataURL(file);
	  }
	};

    function previewMultiple(event, id) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview_' + id).src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    };

	function tambahDokum() {
        const wrapper = document.getElementById('dokum-wrapper');
        const row = document.createElement('div');
        row.classList.add('form-row', 'align-items-center', 'mb-2');
        row.innerHTML = `
            <div class="col-md-5">
                <input type="file" name="dokumentasi_baru[]" class="form-control-file" accept="image/*">
            </div>
			<div class="col-md-1">
	            <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.form-row').remove()">X</button>
	        </div>
        `;
        wrapper.appendChild(row);
    };
		
		</script>
</body>
</html>