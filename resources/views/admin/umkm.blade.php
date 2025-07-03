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
				<input class="form-control mt-3 mb-2 ml-4" id="searchInput" type="text" placeholder="Search" aria-label="Search" style="width: 96%">
				<div class="container-fluid">
					@if (Session::has('message'))
							<p class="alert alert-success mt-2">{{ Session::get('message') }}</p>
					@endif
					@if(Session::has('error'))
					    <div class="alert alert-danger mt-2">
					        {{ Session::get('error') }}
					    </div>
					@endif
		  			<!-- Daftar UMKM -->
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-2">Daftar UMKM</h4>
						<div class="d-flex justify-content-end align-items-center">
							<a href="#" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#modalEditJenisUMKM">Edit Jenis UMKM</a>
							<a href="#" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#modalTambahJenisUMKM">Tambah Jenis UMKM</a>	
							<a href="{{ route('admin.tambahUmkm') }}" class="btn btn-primary">Tambah UMKM</a>	
						</div>
					</div>
					
					<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<table class="table table-striped mt-3" id="umkmTable">
											<thead>
												<tr>
													<th scope="col">Nama UMKM</th>
													<th scope="col">Jenis UMKM</th>
													<th scope="col">Nama Wilayah</th>
													<th scope="col">Alamat</th>
													<th scope="col">Keterangan</th>
													<th scope="col">Gambar UMKM</th>
													<th scope="col">Last Updated</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
    										@foreach ($umkm as $itemUMKM)
        										<tr>
            										<td>{{ $itemUMKM->nama_umkm }}</td>
													<td>{{ $itemUMKM->jenis_umkm }}</td>
													<td>{{ $itemUMKM->nama_wilayah }}</td>
													<td>{{ $itemUMKM->alamat }}</td>
            										<td>{!! Str::limit($itemUMKM->keterangan, 40, '...') !!} <a href="#" data-bs-toggle="modal" data-bs-target="#modalView_UMKM{{$itemUMKM->id_umkm}}">View more..</a></td>
            										<td>
                									@if ($itemUMKM->gambar_umkm)
                									    <img src="{{ asset('storage/' . $itemUMKM->gambar_umkm) }}" width="100" height="75" alt="">
                									@else
                									    Tidak ada gambar
                									@endif
													</td>
													<td>By {{ $itemUMKM->name }} at {{ $itemUMKM->updated_at }}</td>
													<td><a href="{{ route('admin.editUmkm', $itemUMKM->id_umkm) }}">Edit</a> | <a href="" data-bs-toggle="modal" data-bs-target="#modal_confirmation_{{ $itemUMKM->id_umkm }}">Hapus</a></td>
												</tr> 

												<!-- Modal View UMKM -->
		  										<div class="modal fade" id="modalView_UMKM{{$itemUMKM->id_umkm}}" tabindex="-1" aria-labelledby="modalTitle{{$itemUMKM->id_umkm}}" aria-hidden="true">
   													<div class="modal-dialog">
        												<div class="modal-content">
            												<div class="modal-header">
																<h5 class="modal-title" id="modalTitle">Detail UMKM</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            												</div>
            												<div class="modal-body">
															<div>
                                							    <p class="mb-3">Nama UMKM: {{ $itemUMKM->nama_umkm }}</p>
																<p class="mb-3">Letak Wilayah: {{ $itemUMKM->nama_wilayah }}</p>
																<img src="{{ asset('storage' . $itemUMKM->gambar_umkm) }}" alt="">
                                							    <p class="my-3">{!! $itemUMKM->keterangan !!}</p>
                                							</div>
															</div>
												        </div>
												    </div>
												</div>

												<div class="modal fade" id="modal_confirmation_{{ $itemUMKM->id_umkm }}" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
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
																	<a href="{{route('admin.deleteUmkm', $itemUMKM->id_umkm)}}" class="btn btn-danger ml-3">Hapus</a>
																</div>
												            </div>
												        </div>
												    </div>
												</div>												
												@endforeach
											</tbody>
										</table>
										<div class="mb-4">
										{{ $umkm->links() }}
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

	<div class="modal fade" id="modalTambahJenisUMKM" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   		<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Tambah Jenis UMKM</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
					<form action="{{ route('admin.tambahJenisUMKM') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="jenis_umkm">Jenis UMKM*</label>
							<input type="text" class="form-control" name="jenis_umkm" id="jenis_umkm" required>
						</div>
						<div class="form-group">
							<label for="gambar_jenis_umkm">Gambar Jenis UMKM*</label>
							<input type="file" class="form-control-file" name="gambar_jenis_umkm" id="gambar_jenis_umkm" required>
						</div>
    					<button type="submit" class="btn btn-primary form-control">Save changes</button>
					</form>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="modalEditJenisUMKM" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
   		<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Edit Jenis UMKM</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
					<table class="table table-striped">
					    <thead>
					        <tr>
					            <th>Gambar UMKM</th>
					            <th>Jenis UMKM</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					        @foreach($jenis_umkm as $itemJenisUmkm)
					        <tr>
					            <td>
					                <img src="{{ asset('storage/' . $itemJenisUmkm->gambar_jenis_umkm) }}" alt="Gambar {{ $itemJenisUmkm->jenis_umkm }}" width="80">
					            </td>
					            <td>{{ $itemJenisUmkm->jenis_umkm }}</td>
					            <td>
					                <div class="action-buttons">
					                    <a href="#" class="btn btn-sm btn-warning btn-edit">Edit</a>
					                    <form action="{{ route('admin.deleteJenisUMKM', $itemJenisUmkm->id_jenis_umkm) }}" method="POST" class="d-inline">
					                        @csrf
					                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
					                    </form>
					                </div>					

					                <form action="{{ route('admin.updateJenisUMKM', $itemJenisUmkm->id_jenis_umkm) }}" method="POST" class="form-edit d-none mt-2" enctype="multipart/form-data">
					                    @csrf
					                    <div class="mb-2">
					                        <input type="file" name="gambar_jenis_umkm" class="form-control-file">
					                    </div>
					                    <div class="mb-2">
					                        <input type="text" name="jenis_umkm" class="form-control" value="{{ $itemJenisUmkm->jenis_umkm }}" required>
					                    </div>
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
	    const rows = document.querySelectorAll("#umkmTable tbody tr");

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