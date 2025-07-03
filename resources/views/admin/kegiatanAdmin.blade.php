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

		<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css">
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
						
						<!-- Kegiatan Terbaru -->
						<h4 class="page-title mt-2">Kegiatan Terbaru</h4>
						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<table class="table table-striped mt-3">
											<thead>
												<tr>
													<th scope="col">Nama Kegiatan</th>
													<th scope="col">Jenis Kegiatan</th>
													<th scope="col">Nama Wilayah</th>
													<th scope="col">Tanggal Kegiatan</th>
													<th scope="col">Keterangan</th>
													<th scope="col">Gambar Kegiatan</th>
													<th scope="col">Last Updated</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												@if($kegiatanterbaru)
        										<tr>
            										<td>{{ $kegiatanterbaru->nama_kegiatan }}</td>
													<td>{{ $kegiatanterbaru->nama_jenis_kegiatan }}</td>
													<td>{{ $kegiatanterbaru->nama_wilayah }}</td>
													<td>{{ $kegiatanterbaru->tanggal_kegiatan }}</td>
            										<td>{!! Str::limit($kegiatanterbaru->keterangan, 40, '...') !!} <a href="#" data-bs-toggle="modal" data-bs-target="#modalView_Kegiatan{{$kegiatanterbaru->id_kegiatan}}">View more..</a></td>
            										<td>
                									@if ($kegiatanterbaru->gambar_kegiatan)
                									    <img src="{{ asset('storage/' . $kegiatanterbaru->gambar_kegiatan) }}" width="100" alt="">
                									@else
                									    Tidak ada gambar
                									@endif
													</td>
													<td>By {{ $kegiatanterbaru->name }} at {{ $kegiatanterbaru->updated_at }}</td>
													<td><a href="{{ route('admin.editKegiatan', $kegiatanterbaru->id_kegiatan) }}">Edit</a></td>
												</tr>
												@endif
											</tbody>
										</table>
									</div>
								</div>

					<input class="form-control mt-3 mb-3" id="searchInput" type="text" placeholder="Search" aria-label="Search" style="width: 100%">			
					<!-- Daftar Kegiatan -->
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-1">Daftar Kegiatan</h4>
						<div class="d-flex justify-content-end align-items-center">
							<a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditJenisKegiatan">Edit Jenis Kegiatan</a>
							<a href="#" class="btn btn-primary mb-2 ml-2" data-bs-toggle="modal" data-bs-target="#modalTambahJenisKegiatan">Tambah Jenis Kegiatan</a>	
							<a href="{{ route('admin.tambahKegiatan') }}" class="btn btn-primary mb-2 ml-2">Tambah Kegiatan</a>	
						</div>				
					</div>						
						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<table class="table table-striped mt-3" id="kegiatanTable">
											<thead>
												<tr>
													<th scope="col">Nama Kegiatan</th>
													<th scope="col">Jenis Kegiatan</th>
													<th scope="col">Nama Wilayah</th>
													<th scope="col">Tanggal Kegiatan</th>
													<th scope="col">Keterangan</th>
													<th scope="col">Gambar Kegiatan</th>
													<th scope="col">Last Updated</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
    										@foreach ($kegiatan as $items)
        										<tr>
            										<td>{{ $items->nama_kegiatan }}</td>
													<td>{{ $items->nama_jenis_kegiatan }}</td>
													<td>{{ $items->nama_wilayah }}</td>
													<td>{{ $items->tanggal_kegiatan }}</td>
            										<td>{!! Str::limit($items->keterangan, 40, '...') !!} <a href="#" data-bs-toggle="modal" data-bs-target="#modalView_Kegiatan{{$items->id_kegiatan}}">View more..</a></td>
            										<td>
                									@if ($items->gambar_kegiatan)
                									    <img src="{{ asset('storage/' . $items->gambar_kegiatan) }}" width="100" alt="">
                									@else
                									    Tidak ada gambar
                									@endif
													</td>
													<td>By {{ $items->name }} at {{ $items->updated_at }}</td>
													<td><a href="{{ route('admin.editKegiatan', $items->id_kegiatan) }}">Edit</a> | <a href="" data-bs-toggle="modal" data-bs-target="#modal_confirmation_{{ $items->id_kegiatan }}">Hapus</a></td>
												</tr>

												<!-- Modal View Berita -->
		  										<div class="modal fade" id="modalView_Kegiatan{{$items->id_kegiatan}}" tabindex="-1" aria-labelledby="modalTitle{{$items->id_kegiatan}}" aria-hidden="true">
   													<div class="modal-dialog">
        												<div class="modal-content">
            												<div class="modal-header">
																<h5 class="modal-title" id="modalTitle">Detail Kegiatan</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            												</div>
            												<div class="modal-body">
															<div>
                                							    <p class="mb-3">Nama Kegiatan: {{ $items->nama_kegiatan }}</p>
																<p class="mb-3">Tanggal: {{ $items->tanggal_kegiatan }}</p>
																<img src="{{ asset('storage' . $items->gambar_kegiatan) }}" alt="">                                							    
																<p class="my-3">Keterangan: {!! $items->keterangan !!}</p>
                                							</div>
															</div>
												        </div>
												    </div>
												</div>

												<div class="modal fade" id="modal_confirmation_{{ $items->id_kegiatan }}" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   													<div class="modal-dialog">
    													<div class="modal-content">
    														<div class="modal-header">
																<h5 class="modal-title" id="modalTitle">Confirmation</h5>
    														</div>
    														<div class="modal-body">
																<h5>Apakah Anda Yakin Ingin Menghapus Konten Ini?</h5>
																<br>
																<div class="d-flex justify-content-end">
																	<a href="#" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Batalkan</a>
																	<a href="{{route('admin.deleteKegiatan', $items->id_kegiatan) }}" class="btn btn-danger ml-3">Hapus</a>
																</div>
												            </div>
												        </div>
												    </div>
												</div>
												@endforeach
											</tbody>
										</table>
										<div class="mb-4">
										{{ $kegiatan->links() }}
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

	<div class="modal fade" id="modalTambahJenisKegiatan" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   		<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Tambah Jenis Kegiatan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
					<form action="{{ route('admin.tambahJenisKegiatan') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="jenis_kegiatan">Jenis Kegiatan*</label>
							<input type="text" class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required>
						</div>
    					<button type="submit" class="btn btn-primary form-control">Save changes</button>
					</form>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="modalEditJenisKegiatan" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   		<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Edit Jenis Kegiatan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Jenis Kegiatan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($jenis_kegiatan as $itemJenisKegiatan)
							<tr>
								<td>{{ $itemJenisKegiatan->id_jenis_kegiatan }}</td>
								<td>{{ $itemJenisKegiatan->nama_jenis_kegiatan }}</td>
								<td>
								<div class="action-buttons">
									<a href="#" class="btn btn-sm btn-warning btn-edit">Edit</a>
									<form action="{{ route('admin.deleteJenisKegiatan', $itemJenisKegiatan->id_jenis_kegiatan) }}" method="POST" class="d-inline">
										@csrf
										<button class="btn btn-sm btn-danger" type="submit">Delete</button>
									</form>
								</div>

								<form action="{{ route('admin.updateJenisKegiatan', $itemJenisKegiatan->id_jenis_kegiatan) }}" method="POST" class="form-edit d-none mt-2">
									@csrf
									<input type="text" name="nama_jenis_kegiatan" class="form-control d-inline" value="{{ $itemJenisKegiatan->nama_jenis_kegiatan }}" required>
									<button type="submit" class="btn btn-sm btn-primary">Save</button>
									<button type="button" class="btn btn-sm btn-secondary btn-cancel">Cancel</button>
								</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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

	<script>
	document.getElementById("searchInput").addEventListener("keyup", function() {
	    const filter = this.value.toLowerCase();
	    const rows = document.querySelectorAll("#kegiatanTable tbody tr");

	    rows.forEach(row => {
	        const rowText = row.textContent.toLowerCase();
	        row.style.display = rowText.includes(filter) ? "" : "none";
	    });
	});

	document.querySelectorAll('.btn-edit').forEach(function(button) {
		button.addEventListener('click', function(e) {
			e.preventDefault();
			const row = button.closest('tr');

			row.querySelector('.action-buttons').classList.add('d-none');
			row.querySelector('.form-edit').classList.remove('d-none');
		});
	});

	document.querySelectorAll('.btn-cancel').forEach(function(button) {
		button.addEventListener('click', function(e) {
			e.preventDefault();
			const row = button.closest('tr');

			row.querySelector('.form-edit').classList.add('d-none');
			row.querySelector('.action-buttons').classList.remove('d-none');
		});
	});
	</script>
	
	</body>
</html>