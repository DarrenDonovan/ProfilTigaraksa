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
					<li class="nav-item active">
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
					<a href="{{ route('admin.kegiatan') }}">
						<p style="font-size: 18px; text-decoration: underline; margin-top:10px">Back</p>
					</a>
		  			<!-- Daftar UMKM -->
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-2">Form Tambah Kegiatan</h4>
					</div>

					<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
                                        <div class="row">
                                            <form action=" {{ route('admin.createKegiatan') }}" method="post" enctype="multipart/form-data" class="row">
											@csrf
                                            <div class="col col-md-4">
                                                <div class="form-group row text-center ml-2">
											        <label for="gambar_kegiatan">Gambar Kegiatan*</label>
                                                    <img src="{{ asset('img/dummy-image.jpg') }}" id="preview" alt="" width="300" height="200">
                                                    <button type="button" class="btn btn-primary mb-4 mt-3" onclick="document.getElementById('gambar_kegiatan').click()">Tambah Thumbnail</button>
										            <input type="file" class="form-control-file" name="gambar_kegiatan" accept="image/*" style="display:none;" onchange="previewImage(event)" id="gambar_kegiatan" required>
                						        </div>
                                            </div>
                                            <div class="col col-md-8">
											    <div class="form-group">
											    	<label for="nama_kegiatan">Nama Kegiatan*</label>
											    	<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
											    </div>
											    <div class="form-group">
											    	<label for="jenis_kegiatan">Jenis Kegiatan*</label>
											    	<select name="jenis_kegiatan" class="form-control" required>
											    	    <option value="">-- Pilih Jenis Kegiatan --</option>
											    	    @foreach ($jenis_kegiatan as $item)
											    	        <option value="{{ $item->id_jenis_kegiatan }}">{{ $item->nama_jenis_kegiatan }}</option>
											    	    @endforeach
											    	</select>
											    </div>
											    @if(Auth::check() && Auth::user()->role === 'superadmin')
											    <div class="form-group">
											    	<label for="nama_wilayah">Nama Wilayah*</label>
											    	<select name="nama_wilayah" class="form-control" required>
											    	    <option value="">-- Pilih Wilayah --</option>
											    	    @foreach ($wilayah as $item)
											    	        <option value="{{ $item->id_wilayah }}">{{ $item->nama_wilayah }}</option>
											    	    @endforeach
											    	</select>
											    </div>
											    @elseif(Auth::check() && Auth::user()->role === 'admin')
											    <div class="form-group">
											    	<label for="nama_wilayah">Nama Wilayah*</label>
											    	<select name="nama_wilayah" class="form-control" required>
											    	    <option value="{{ $wilayaheach->id_wilayah }}">{{ $wilayaheach->nama_wilayah }}</option>
											    	</select>
											    </div>
											    @endif
												<div class="form-group">
													<label for="tanggal_kegiatan">Tanggal Kegiatan*</label>
													<input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan" required>
												</div>
											    <div class="form-group">
											    	<label for="keterangan">Keterangan*</label>
											    	<textarea name="keterangan" class="form-control" id="keterangan" cols="50" rows="4" required></textarea>					
											    </div>
												<div class="form-group">
													<label for="dokumentasi">Gambar Dokumentasi*</label>
													<input type="file" class="form-control-file" accept="image/*" name="dokumentasi[]" required multiple>
												</div>
											    <button type="submit" class="btn btn-primary form-control">Tambahkan</button>
                                            </div>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    document.getElementById('gambar_kegiatan').addEventListener('change', function(event) {
	  const file = event.target.files[0];
	  if (file) {
	    const reader = new FileReader();
	
	    reader.onload = function(e) {
	      document.getElementById('preview').src = e.target.result;
	    };

	    reader.readAsDataURL(file);
	  }
	});

CKEDITOR.replace('keterangan');
</script>
	
</body>


</html>