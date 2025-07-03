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
					<li class="nav-item active">
						<a href="{{ route('admin.paketWisata') }}">
							<p>Paket Wisata</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.penginapan') }}">
							<p>Penginapan</p>
						</a>
					</li>
					<li class="nav-item">
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
		  				<!-- Daftar Wisata -->
                        <a href="{{ route('admin.paketWisata') }}">
							<p style="font-size: 18px; text-decoration: underline; margin-top:10px">Back</p>
						</a>
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-1">Form Edit Paket Wisata</h4>
					</div>
						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
                                        <form action="{{ route('admin.updatePaket', $paket_wisata->id_paket) }}" method="post" enctype="multipart/form-data">
									    @csrf
											<div class="form-group row">
                                                <div class="col col-md-4 text-center">
										    	    <label for="gambar_paket">Gambar Utama Paket*</label><br>
                                                    <img src="{{ asset('storage/' . $paket_wisata->gambar_paket) }}" id="preview" alt="" width="300" height="200"><br>
												    <button type="button" class="btn btn-primary mb-4 mt-3" onclick="document.getElementById('gambar_paket').click()">Tambah Gambar</button>
										    	    <input type="file" class="form-control-file" name="gambar_paket" accept="image/*" style="display:none;" onchange="previewImage(event)" id="gambar_paket">
                                                </div>
                                                <div class="col col-md-8">
                                                    <div class="row">
                                                        <label for="nama_paket">Nama Paket</label>
                                                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" value="{{ $paket_wisata->nama_paket }}" required>
                                                    </div>
                                                    <div class="row">
                                                        <label for="tentang_paket">Tentang Paket</label>
                                                        <textarea name="tentang_paket" class="form-control" id="tentang_paket" cols="50" rows="4" required>{{ $paket_wisata->tentang_paket }}</textarea>
                                                    </div>
													@if(Auth::check() && Auth::user()->role === 'superadmin')
                                                		<div class="row"> <!-- Wisata -->
                                                		    <label for="wisata">Tempat Wisata*</label>
                                                		    <select class="form-control" name="wisata" id="wisata" required>
        														<option value="">-- Pilih Tempat Wisata --</option>
        													    	@foreach ($wisata as $itemWisata)
																		<option value="{{ $itemWisata->id_wisata }}" {{ $itemWisata->id_wisata == $paket_wisata->id_wisata ? 'selected' : '' }}>{{ $itemWisata->nama_tempat }}</option>
        													    	@endforeach
        													</select>
                                                		</div>
													@elseif(Auth::check() && Auth::user()->role === 'admin')
														<div class="row"> <!-- Wisata -->
                                                		    <label for="wilayah">Tempat Wisata*</label>
                                                		    <select class="form-control" name="wisata" id="wisata">
                                                	            <option value="">-- Pilih Tempat Wisata --</option>
                                                	            @foreach($wisata->where('wisata.id_wilayah', $wilayaheach->id_wilayah) as $itemWisata)
																    <option value="{{ $itemWisata->id_wisata }}">{{ $itemWisata->nama_depan }}</option>
                                                	            @endforeach
															</select>
														</div>
													@endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
												<div class="col col-md-4">
													<label for="fasilitas_umum">Fasilitas Umum</label>
													<textarea name="fasilitas_umum" id="fasilitas_umum" class="form-control">{{ $paket_wisata->fasilitas_umum }}</textarea>
												</div>
												<div class="col col-md-4">
													<label for="fasilitas_hiburan">Fasilitas Hiburan</label>
													<textarea name="fasilitas_hiburan" id="fasilitas_hiburan" class="form-control">{{ $paket_wisata->fasilitas_hiburan }}</textarea>
												</div>
												<div class="col col-md-4">
													<label for="fasilitas_kenyamanan">Fasilitas Kenyamanan</label>
													<textarea name="fasilitas_kenyamanan" id="fasilitas_kenyamanan" class="form-control">{{ $paket_wisata->fasilitas_kenyamanan }}</textarea>
												</div>
                                            </div>
											<div class="form-group row">
												<div class="col col-md-4">
													<label for="fasilitas_keamanan">Fasilitas Keamanan</label>
													<textarea name="fasilitas_keamanan" id="fasilitas_keamanan" class="form-control">{{ $paket_wisata->fasilitas_keamanan }}</textarea>
												</div>
												<div class="col col-md-4">
													<label for="kuliner_belanja">Kuliner dan Belanja</label>
													<textarea name="kuliner_belanja" id="kuliner_belanja" class="form-control">{{ $paket_wisata->kuliner_belanja }}</textarea>
												</div>
												<div class="col col-md-4">
													<label for="aksesibilitas">Aksesibilitas</label>
													<textarea name="aksesibilitas" id="aksesbilitas" class="form-control">{{ $paket_wisata->aksesibilitas }}</textarea>
												</div>
                                            </div>
											<div class="form-group row">
												<label for="no_whatsapp">Nomor yang Dapat Dihubungi</label>
												<input type="text" class="form-control" name="no_whatsapp" id="no_whatsapp" value="{{ $paket_wisata->no_whatsapp }}">
											</div>
											<div class="form-group row">
											    <label>Gambar Pelengkap Paket</label>
											    @foreach($dokum_paket as $itemDokum)
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
											</div>
											<div class="form-group row">
											    <label class="col-12">Galeri Aktivitas*</label>
											    <div id="galeri-wrapper" class="col-12">
											        @foreach($galeri_aktivitas as $itemGaleri)
											            <div class="form-row align-items-center mb-2">
											                <div class="col-md-2">
											                    <img src="{{ asset('storage/' . $itemGaleri->gambar_aktivitas) }}"
											                         id="preview_galeri_{{ $itemGaleri->id }}"
											                         class="img-fluid rounded"
											                         alt="Gambar Aktivitas"
											                         style="height: 100px; width: 100%; object-fit: cover;">
											                </div>
											                <div class="col-md-3">
											                    <input type="file"
											                           name="galeri_aktivitas[{{ $itemGaleri->id }}]"
											                           class="form-control-file"
																	   accept="image/*"
											                           onchange="previewGaleri(event, {{ $itemGaleri->id }})">
											                </div>
											                <div class="col-md-3">
											                    <input type="text"
											                           name="nama_aktivitas[{{ $itemGaleri->id }}]"
											                           class="form-control"
											                           value="{{ $itemGaleri->nama_aktivitas }}"
											                           placeholder="Nama Aktivitas">
											                </div>
															<div class="form-check col-md-3 ml-5">
        													    <input class="form-check-input" type="checkbox" name="hapus_galeri[]" value="{{ $itemGaleri->id }}" id="hapus_{{ $itemGaleri->id }}">
        													    <label class="form-check-label" for="hapus_{{ $itemGaleri->id }}">Hapus gambar ini</label>
        													</div>
											            </div>
											        @endforeach
											    </div>
											    <div class="col-12 mt-2">
											        <button type="button" class="btn btn-sm btn-success" onclick="tambahGaleri()">+ Tambah Galeri</button>
											    </div>
											</div>

											<button type="submit" class="btn btn-primary form-control">Ubah</button>
								        </form>
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
        };
	}

		function tambahGaleri() {
    	    const wrapper = document.getElementById('galeri-wrapper');

    	    const row = document.createElement('div');
    	    row.classList.add('form-row', 'align-items-center', 'mb-2');

    	    row.innerHTML = `
    	        <div class="col-md-5">
    	            <input type="file" name="galeri_baru[]" class="form-control-file" accept="image/*">
    	        </div>
    	        <div class="col-md-6">
    	            <input type="text" name="nama_baru[]" class="form-control" placeholder="Nama Aktivitas">
    	        </div>
				<div class="col-md-1">
		            <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.form-row').remove()">X</button>
		        </div>
    	    `;

    	    wrapper.appendChild(row);
    	};

    	function previewGaleri(event, id) {
    	    const reader = new FileReader();
    	    reader.onload = function () {
    	        const preview = document.getElementById('preview_galeri_' + id);
    	        preview.src = reader.result;
    	    };
    	    reader.readAsDataURL(event.target.files[0]);
    	}

		CKEDITOR.replace('keterangan');
		CKEDITOR.replace('fasilitas_umum');
		CKEDITOR.replace('fasilitas_hiburan');
		CKEDITOR.replace('fasilitas_kenyamanan');
		CKEDITOR.replace('fasilitas_keamanan');
		CKEDITOR.replace('kuliner_belanja');
		CKEDITOR.replace('aksesibilitas');
		</script>
	</body>
</html>