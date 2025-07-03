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
					<li class="nav-item active">
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
                        <a href="{{ route('admin.penduduk') }}">
							<p style="font-size: 18px; text-decoration: underline; margin-top:10px">Back</p>
						</a>	
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="page-title mt-1">Edit Data Kependudukan</h4>
					</div>		
                        @foreach ($penduduk as $itemPenduduk)	
						<div class="row">
							<div class="col">
								<div class="card">
									<div class="card-body">
                                        <div class="row">
											<form action="{{ route('admin.updateDataPenduduk', ['id' => $itemPenduduk->penduduk_id]) }}" class="row" method="post" enctype="multipart/form-data">
											@csrf
                                            <div class="col col-md-4 text-center">
                                                <img src="{{ asset('storage/' . $itemPenduduk->gambar_biodata) }}" id="preview" alt="" width="250" height="350">
												<button type="button" class="btn btn-primary mb-4 mt-3" onclick="document.getElementById('gambar_biodata').click()">Tambah Gambar</button>
												<input type="file" class="form-control-file" name="gambar_biodata" id="gambar_biodata" accept="image/*" style="display: none;" onchange="previewImage(event)">
											</div>
                                            <div class="col col-md-8">
											<p>Last Updated by {{ $itemPenduduk->name }} at {{ $itemPenduduk->updated_at }}</p>
													<h5 class="ml-2 mt-3"><strong>Data Diri</strong></h5>
                                                    <div class="form-group row">
														<div class="col col-md-4">
                                                        	<label for="nik">Nomor Induk Kependudukan (16 Digit)*</label>
                                                        	<input type="text" class="form-control" name="nik" id="nik" maxlength="16" value="{{ $itemPenduduk->NIK }}">
															<input type="checkbox" class="form-check-input ml-1" id="punyaNIK">
															<label class="form-check-label" for="punyaNIK">Punya NIK?</label>
														</div>
														<div class="col-md-8">
                                                        	<label for="nama_lengkap">Nama Lengkap*</label>
                                                        	<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ $itemPenduduk->nama_lengkap }}" required>
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-4"> 
                                                    	    <label for="jenis_kelamin">Jenis Kelamin*</label>
                                                    	    <select name="jenis_kelamin" class="form-control" required>
														    	<option value="">-- Pilih Jenis Kelamin --</option>
																<option value="Laki-Laki" {{ $itemPenduduk->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
																<option value="Perempuan" {{ $itemPenduduk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
															</select>
                                                    	</div>
														<div class="col col-md-4"> <!-- Tempat Lahir -->
                                                    	    <label for="tempat_lahir">Tempat Lahir*</label>
                                                    	    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ $itemPenduduk->tempat_lahir }}" required>
                                                    	</div>
                                                    	<div class="col col-md-4"> <!-- Tanggal Lahir -->
                                                    	    <label for="tanggal_lahir">Tanggal Lahir*</label>
                                                    	    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $itemPenduduk->tanggal_lahir }}" required>
                                                    	</div>
													</div>
                                                   	<div class="form-group row">
                                                    	<div class="col col-md-8"> <!-- Alamat -->
                                                    	    <label for="alamat">Alamat*</label>
                                                    	    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $itemPenduduk->alamat }}" required>
                                                    	</div>
														@if(Auth::check() && Auth::user()->role === 'superadmin')
                                                    	<div class="col col-md-4"> <!-- Wilayah -->
                                                    	    <label for="wilayah">Wilayah*</label>
                                                    	    <select class="form-control" name="wilayah" id="wilayah" required>
        														<option value="">-- Pilih Wilayah --</option>
        													    @foreach ($wilayah as $itemWilayah)
																	<option value="{{ $itemWilayah->id_wilayah }}" {{ $itemWilayah->id_wilayah == $itemPenduduk->id_wilayah ? 'selected' : '' }}>{{ $itemWilayah->nama_wilayah }}</option>
        													    @endforeach
        													</select>
                                                    	</div>
														@elseif(Auth::check() && Auth::user()->role === 'admin')
														<div class="col col-md-4"> <!-- Wilayah -->
                                                    	    <label for="wilayah">Wilayah*</label>
                                                    	    <select class="form-control" name="wilayah" id="wilayah" required>
        														<option value="{{ $wilayaheach->id_wilayah }}">{{ $wilayaheach->nama_wilayah }}</option>
        													</select>
                                                    	</div>
														@endif
													</div>
													<div class="form-group row">
                                                    	<div class="col col-md-4"> <!-- Agama -->
                                                    	    <label for="agama">Agama*</label>
															<select class="form-control" name="agama" id="agama" required>
																<option value="">-- Pilih Agama --</option>
																@foreach($agama as $itemAgama)
																	<option value="{{ $itemAgama->id_agama }}" {{ $itemAgama->id_agama == $itemPenduduk->id_agama ? 'selected' : '' }}>{{ $itemAgama->agama }}</option>
																@endforeach
															</select>                                                    	
														</div>
                                                    	<div class="col col-md-4">
                                                    	    <label for="pekerjaan">Pekerjaan*</label>
															<select class="form-control" name="pekerjaan" id="pekerjaan" required>
																<option value="">-- Pilih Pekerjaan --</option>
																@foreach($pekerjaan as $itemPekerjaan)
																	<option value="{{ $itemPekerjaan->id_pekerjaan }}" {{ $itemPekerjaan->id_pekerjaan == $itemPenduduk->id_pekerjaan ? 'selected' : '' }}>{{ $itemPekerjaan->pekerjaan }}</option>
																@endforeach
															</select>
	                                                    	</div>
														<div class="col col-md-4">
															<label for="pendidikan">Pendidikan*</label>
															<select class="form-control" name="pendidikan" id="pendidikan" required>
																<option value="">-- Pilih Pendidikan Terakhir --</option>
																@foreach($pendidikan as $itemPendidikan)
																	<option value="{{ $itemPendidikan->id_pendidikan }}" {{ $itemPendidikan->id_pendidikan == $itemPenduduk->id_pendidikan ? 'selected' : '' }}>{{ $itemPendidikan->tingkat_pendidikan }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="suku_etnis">Suku/Etnis*</label>
															<input type="text" class="form-control" name="suku_etnis" id="suku_etnis" value="{{ $itemPenduduk->suku_etnis }}" required>
														</div>
														<div class="col col-md-4">
															<label for="no_telp">Nomor Telepon*</label>
															<input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $itemPenduduk->no_telepon }}" required>
														</div>
														<div class="col col-md-4">
															<label for="email">E-mail*</label>
															<input type="email" class="form-control" name="email" id="email" value="{{ $itemPenduduk->email }}" required>
														</div>
													</div>

													<h5 class="ml-2 mt-5"><strong>Data Kelahiran</strong></h5>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="no_akta_lahir">No. Akta Lahir*</label>
															<input type="text" class="form-control" name="no_akta_lahir" id="no_akta_lahir" value="{{ $itemPenduduk->no_akta }}" required>
														</div>
														<div class="col col-md-4">
															<label for="waktu_kelahiran">Waktu Kelahiran</label>
															<input type="time" class="form-control" name="waktu_kelahiran" id="waktu_kelahiran" value="{{ $itemPenduduk->waktu_lahir }}">
														</div>
														<div class="col col-md-4">
															<label for="tempat_dilahirkan">Tempat Dilahirkan*</label>
															<input type="text" class="form-control" name="tempat_dilahirkan" id="tempat_dilahirkan" value="{{ $itemPenduduk->tempat_dilahirkan }}" required>
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-3">
															<label for="anak_ke">Anak Ke-*</label>
															<input type="number" class="form-control" name="anak_ke" id="anak_ke" value="{{ $itemPenduduk->anak_ke }}" required>
														</div>
														<div class="col col-md-3">
															<label for="berat_lahir">Berat Lahir (gram)*</label>
															<input type="number" class="form-control" name="berat_lahir" id="berat_lahir" value="{{ $itemPenduduk->berat_lahir }}" required>
														</div>
														<div class="col col-md-3">
															<label for="tinggi_lahir">Tinggi Lahir (cm)*</label>
															<input type="number" class="form-control" name="tinggi_lahir" id="tinggi_lahir" value="{{ $itemPenduduk->tinggi_lahir }}" required>
														</div>
													</div>

													<h5 class="ml-2 mt-5"><strong>Data Keluarga</strong></h5>
													<div class="form-group row">
														<div class="col col-md-6">
															<label for="no_kk">No. KK (16 Digit)*</label>
															<input type="text" class="form-control" name="no_kk" id="no_kk" maxlength="16" value="{{ $itemPenduduk->no_kk }}" required>
														</div>
														<div class="col col-md-6">
															<label for="hub_keluarga">Hubungan Dalam Keluarga*</label>
															<select name="hub_keluarga" class="form-control" required>
														    	<option value="">-- Pilih Hubungan Dalam Keluarga --</option>
																@foreach ($hubungan_keluarga as $itemHubungan)
																	<option value="{{ $itemHubungan->id_hubungan }}" {{ $itemHubungan->id_hubungan == $itemPenduduk->id_hubungan ? 'selected' : '' }}>{{ $itemHubungan->hubungan_keluarga }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="nik_ayah">NIK Ayah (16 Digit*)</label>
															<input type="text" class="form-control" name="nik_ayah" id="nik_ayah" maxlength="16" value="{{ $itemPenduduk->nik_ayah }}" required>
														</div>
														<div class="col col-md-8">
															<label for="nama_ayah">Nama Ayah*</label>
															<input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{ $itemPenduduk->nama_ayah }}" required>
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="nik_ibu">NIK Ibu (16 Digit)*</label>
															<input type="text" class="form-control" name="nik_ibu" id="nik_ibu" maxlength="16" value="{{ $itemPenduduk->nik_ibu }}" required>
														</div>
														<div class="col col-md-8">
															<label for="nama_ibu">Nama Ibu*</label>
															<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="{{ $itemPenduduk->nama_ibu }}" required>
														</div>
													</div>

													<h5 class="ml-2 mt-5"><strong>Data Kewarganegaraan</strong></h5>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="status_wn">Status Warga Negara*</label>
															<select name="status_wn" id="status_wn" class="form-control" required>
														    	<option value="">-- Pilih Hubungan Dalam Keluarga --</option>
																<option value="WNI" {{ $itemPenduduk->status_wn == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia (WNI)</option>
																<option value="WNA" {{ $itemPenduduk->status_wn == 'WNA' ? 'selected' : '' }}>Warga Negara Asing (WNA)</option>
															</select>
														</div>
														<div class="col col-md-4">
															<label for="no_paspor">Nomor Paspor</label>
															<input type="text" class="form-control" name="no_paspor" id="no_paspor" value="{{ $itemPenduduk->no_paspor }}">
														</div>
														<div class="col col-md-4">
															<label for="tanggal_paspor">Tanggal Berakhir Paspor</label>
															<input type="date" class="form-control" name="tanggal_paspor" id="tanggal_paspor" value="{{ $itemPenduduk->tanggal_paspor }}">
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="no_kitas_kitap">Nomor KITAS/KITAP (11 Digit)</label>
															<input type="text" class="form-control" name="no_kitas_kitap" id="no_kitas_kitap" maxlength="11" value="{{ $itemPenduduk->no_kitas_kitap }}">
														</div>
														<div class="col col-md-4">
															<label for="negara_asal">Negara Asal</label>
															<input type="text" class="form-control" name="negara_asal" id="negara_asal" value="{{ $itemPenduduk->negara_asal }}">
														</div>
													</div>

													<h5 class="ml-2 mt-5"><strong>Status Pernikahan</strong></h5>
													<div class="form-group row">
														<div class="col col-md-6">
															<label for="status_kawin">Status Pernikahan*</label>
															<select name="status_kawin" id="status_kawin" class="form-control" required>
														    	<option value="">-- Pilih Status Pernikahan --</option>
																@foreach ($status_nikah as $itemStatus)
																<option value="{{ $itemStatus->id_status }}" {{ $itemStatus->id_status == $itemPenduduk->id_status ? 'selected' : '' }}>{{ $itemStatus->status }}</option>
																@endforeach
															</select>
														</div>
														<div class="col col-md-6">
															<label for="no_akta_nikah">No. Akta Nikah</label>
															<input type="text" class="form-control" name="no_akta_nikah" id="no_akta_nikah" value="{{ $itemPenduduk->no_akta_nikah }}">
														</div>
													</div>
													<div class="form-group row">
														<div class="col col-md-6">
															<label for="tanggal_nikah">Tanggal Pernikahan (Jika Status Menikah)</label>
															<input type="date" class="form-control" name="tanggal_nikah" id="tanggal_nikah" value="{{ $itemPenduduk->tanggal_nikah }}">
														</div>
														<div class="col col-md-6">
															<label for="tanggal_cerai">Tanggal Perceraian (Jika Status Cerai)</label>
															<input type="date" class="form-control" name="tanggal_cerai" id="tanggal_cerai" value="{{ $itemPenduduk->tanggal_cerai }}">
														</div>
													</div>

													<h5 class="ml-2 mt-5"><strong>Data Kesehatan</strong></h5>
													<div class="form-group">
														<label for="golongan_darah">Golongan Darah*</label>
														<select name="golongan_darah" class="form-control" required>
													    	<option value="">-- Pilih Golongan Darah --</option>
															<option value="A" {{ $itemPenduduk->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
															<option value="B" {{ $itemPenduduk->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
															<option value="AB" {{ $itemPenduduk->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
															<option value="O" {{ $itemPenduduk->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
															<option value="A+" {{ $itemPenduduk->golongan_darah == 'A+' ? 'selected' : '' }}>A+</option>
															<option value="A-" {{ $itemPenduduk->golongan_darah == 'A-' ? 'selected' : '' }}>A-</option>
															<option value="B+" {{ $itemPenduduk->golongan_darah == 'B+' ? 'selected' : '' }}>B+</option>
															<option value="B-" {{ $itemPenduduk->golongan_darah == 'B-' ? 'selected' : '' }}>B-</option>
															<option value="AB+" {{ $itemPenduduk->golongan_darah == 'AB+' ? 'selected' : '' }}>AB+</option>
															<option value="AB-" {{ $itemPenduduk->golongan_darah == 'AB-' ? 'selected' : '' }}>AB-</option>
															<option value="O+" {{ $itemPenduduk->golongan_darah == 'O+' ? 'selected' : '' }}>O+</option>
															<option value="O-" {{ $itemPenduduk->golongan_darah == 'O-' ? 'selected' : '' }}>O-</option>
															<option value="-" {{ $itemPenduduk->golongan_darah == '-' ? 'selected' : '' }}>Tidak Tahu</option>
														</select>													
													</div>
													<div class="form-group">
														<label for="riwayat_penyakit">Riwayat Penyakit</label>
														<textarea class="form-control" name="riwayat_penyakit" id="riwayat_penyakit" rows="4">{{ $itemPenduduk->riwayat_penyakit }}</textarea>
													</div>
													<div class="form-group row">
														<div class="col col-md-4">
															<label for="asuransi_kesehatan">Asuransi Kesehatan</label>
															<input type="text" class="form-control" name="asuransi_kesehatan" id="asuransi_kesehatan" value="{{ $itemPenduduk->asuransi_kesehatan }}">
														</div>
														<div class="col col-md-4">
															<label for="no_asuransi">No. Asuransi</label>
															<input type="text" class="form-control" name="no_asuransi" id="no_asuransi" value="{{ $itemPenduduk->no_asuransi }}">
														</div>
														<div class="col col-md-4">
															<label for="no_bpjs_naker">No. BPJS Ketenagakerjaan (11 Digit)</label>
															<input type="text" class="form-control" name="no_bpjs_naker" id="no_bpjs_naker" maxlength="11" value="{{ $itemPenduduk->no_bpjs_naker }}">
														</div>
													</div>
													<div class="text-end">
														<button type="submit" class="btn btn-primary mt-4">Save changes</button>
													</div>
                                                </form>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div> 
	
<script>
document.addEventListener("DOMContentLoaded", function(){
	const status_wn = document.getElementById("status_wn");
	const no_paspor = document.getElementById("no_paspor");
	const tanggal_paspor = document.getElementById("tanggal_paspor");
	const no_kitas_kitap = document.getElementById("no_kitas_kitap");
	const negara_asal = document.getElementById("negara_asal");

	const status_kawin = document.getElementById("status_kawin");
	const no_akta_nikah = document.getElementById("no_akta_nikah");
	const tanggal_nikah = document.getElementById("tanggal_nikah");
	const tanggal_cerai = document.getElementById("tanggal_cerai");

	const nik = document.getElementById("nik");
	const punyaNIK = document.getElementById("punyaNIK");

	function toggleWargaNegara(){
		if(status_wn.value === "WNA"){
			no_paspor.disabled = false;
			tanggal_paspor.disabled = false;
			no_kitas_kitap.disabled = false;
			negara_asal.disabled = false;

			no_paspor.required = true;
			tanggal_paspor.required = true;
			no_kitas_kitap.required = true;
			negara_asal.required = true;
		} else {
			no_paspor.disabled = true;
			tanggal_paspor.disabled = true;
			no_kitas_kitap.disabled = true;
			negara_asal.disabled = true;

			no_paspor.required = false;
			tanggal_paspor.required = false;
			no_kitas_kitap.required = false;
			negara_asal.required = false;

			no_paspor.value = "";
			tanggal_paspor.value = "";
			no_kitas_kitap.value = "";
			negara_asal.value = "";
		}
	}
	function toggleStatusNikah(){
		if(status_kawin.value === "1"){
			no_akta_nikah.disabled = true;
			tanggal_nikah.disabled = true;
			tanggal_cerai.disabled = true;
		}else if(status_kawin.value === "2"){
			no_akta_nikah.disabled = false;
			tanggal_nikah.disabled = false;
			tanggal_cerai.disabled = true;

			no_akta_nikah.required = true;
			tanggal_nikah.required = true;
		}else if(status_kawin.value === "3" || status_kawin.value === "4"){
			no_akta_nikah.disabled = false;
			tanggal_nikah.disabled = false;
			tanggal_cerai.disabled = false;

			no_akta_nikah.required = true;
			tanggal_nikah.required = true;
			tanggal_cerai.required = true;
		}
	}

	function checkNIK(){
		if(punyaNIK.checked == true){
			nik.disabled = false;
		}else {
			nik.disabled = true;
		}
	}

	document.getElementById('gambar_biodata').addEventListener('change', function(event) {
	  const file = event.target.files[0];
	  if (file) {
	    const reader = new FileReader();
	
	    reader.onload = function(e) {
	      document.getElementById('preview').src = e.target.result;
	    };

	    reader.readAsDataURL(file);
	  }
	});

	status_wn.addEventListener("change", toggleWargaNegara);
	toggleWargaNegara();

	status_kawin.addEventListener("change", toggleStatusNikah);
	toggleStatusNikah();

	punyaNIK.addEventListener("change", checkNIK);
	checkNIK();

});
</script>

<script src="{{url('js/admin/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{url('js/admin/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{url('js/admin/core/popper.min.js')}}"></script>
<script src="{{url('js/admin/core/bootstrap.min.js')}}"></script>
<script src="{{url('js/admin/plugin/chartist/chartist.min.js')}}"></script>
<script src="{{url('js/admin/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{url('js/admin/plugin/bootstrap-toggle/bootstrap-toggle.min.')}}"></script>
<script src="{{url('js/admin/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{url('js/admin/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
<script src="{{url('js/admin/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{url('js/admin/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{url('js/admin/ready.min.js')}}"></script>
<script src="{{url('js/admin/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

</body>
</html>