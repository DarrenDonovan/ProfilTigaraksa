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
					<small class="me-3 text-light"><i class="fa fa-user me-2"></i>{{ $wilayah->nama_wilayah }}</small>
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
					<li class="nav-item active">
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
						<!-- Informasi Umum Admin Dashboard -->
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="card">
										<div class="row pb-2 pt-2">
											<div class="col col-md-4 d-flex justify-content-end align-items-center">
												<img src="{{ url('img/area-icon.svg') }}" alt="" width="70" height="70">
											</div>
											<div class="col col-md-8">
												<div class="card-body">
													<p class="card-text fs-3 fw-bold mb-0">Jumlah Wilayah</p>
													<p class="card-text fs-2 pl-5 fw-bold ml-4">14</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="row pb-2 pt-2">
											<div class="col col-md-4 d-flex justify-content-end align-items-center">
												<img src="{{ url('img/user-icon.svg') }}" alt="" width="70" height="70">
											</div>
											<div class="col col-md-8">
												<div class="card-body">
													<p class="card-text fs-3 fw-bold mb-0">Jumlah Penduduk</p>
													<p class="card-text fs-2 pl-5 fw-bold ml-4">{{ $jenis_kelamin_per_wilayah->laki_laki + $jenis_kelamin_per_wilayah->perempuan }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
									<div class="row pb-2 pt-2">
											<div class="col col-md-4 d-flex justify-content-end align-items-center">
												<img src="{{ url('img/family-icon.svg') }}" alt="" width="70" height="70">
											</div>
											<div class="col col-md-8">
												<div class="card-body">
													<p class="card-text fs-3 fw-bold mb-0">Jumlah Keluarga</p>
													<p class="card-text fs-2 pl-5 fw-bold ml-4">{{ $jumlah_keluarga->jumlah_keluarga }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<!-- Chart Jumlah Penduduk di Kecamatan -->
						<div class="row">
							<div class="col col-md-8">
								@if(Auth::check() && Auth::user()->role === 'superadmin')
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Jumlah Penduduk Kecamatan Tigaraksa</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart1"></canvas>
									</div>
								</div>
								@elseif(Auth::check() && Auth::user()->role === 'admin')
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Jumlah Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Pendidikan</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart6"></canvas>
									</div>
								</div>
								@endif
							</div>
							<div class="col col-md-4">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Sebaran Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Jenis Kelamin</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart2" style="max-width: 400px; max-height: 400px"></canvas>
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col col-md-4">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Sebaran Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Kelompok Umur</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart3" style="max-width: 400px; max-height: 400px"></canvas>
									</div>
								</div>
							</div>
							<div class="col col-md-8">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Sebaran Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Agama</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart5"></canvas>
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Sebaran Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Pekerjaan</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart4"></canvas>
									</div>
								</div>
							</div>
							<div class="col col-md-6">
								@if(Auth::check() && Auth::user()->role === 'superadmin')
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Sebaran Penduduk {{ $wilayah->nama_wilayah }} Berdasarkan Pendidikan</h4>
									</div>
									<div class="card-body">
										<canvas id="Chart6"></canvas>
									</div>
								</div>
								@endif
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


<script>
	const ctx1 = document.getElementById('Chart1');
	new Chart(ctx1, {
	  type: 'bar',
	  data: {
	    labels: {!! json_encode($jumlah_penduduk->pluck('nama_wilayah')) !!},
	    datasets: [{
	      label: 'Jumlah Penduduk',
	      data: {!! json_encode($jumlah_penduduk->pluck('jumlah_penduduk')) !!},
	      borderWidth: 1,
		  datalabels: {
        	anchor:'end',
        	align:'top',
        	offset: 5
          },
	    }]
	  },
	  plugins: [ChartDataLabels],
	  options: {
	    scales: {
	      y: {
	        beginAtZero: true
	      }
	    },
        plugins: {
          datalabels: {
              formatter: function (value) {
                  return value.toLocaleString(); 
                  }
              }
          }
	  }
	});

	const ctx2 = document.getElementById('Chart2');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode(array_values($rasio_jenis_kelamin)) !!}, 
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                datalabels: {
                    color: 'black'
                }
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            plugins: {
                datalabels: {
                    formatter: function (value) {
                        return value.toLocaleString();
                    },
                    color: 'black',
                    font: {
                        size: 14
                    }
                }
            }
        }
    });




    const ctx3 = document.getElementById('Chart3');
    new Chart(ctx3, {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($kelompok_umur_per_wilayah->pluck('kelompok_umur')) !!}, 
        datasets: [{
          label: 'Jumlah Orang',
          data: {!! json_encode($kelompok_umur_per_wilayah->pluck('jumlah_penduduk')) !!}, 
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)', 
            'rgba(54, 162, 235, 0.6)', 
            'rgba(255, 206, 86, 0.6)', 
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(0, 255, 255, 0.6)'
          ]
        }]
      }
    });


    const ctx4 = document.getElementById('Chart4');
    new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: {!! json_encode($pekerjaan->pluck('pekerjaan')) !!},
        datasets: [{
          label: 'Jumlah Penduduk',
          data: {!! json_encode($pekerjaan->pluck('jumlah_pekerja')) !!},
          borderWidth: 1,
          datalabels: {
              anchor:'end',
              align:'top',
              offset: 5
          },
        }]
      },
      plugins: [ChartDataLabels],
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          datalabels: {
              formatter: function (value) {
                  return value.toLocaleString(); 
                  }
              }
          }
      }
    });


    const ctx5 = document.getElementById('Chart5');
    new Chart(ctx5, {
      type: 'bar',
      data: {
        labels: {!! json_encode($agama->pluck('agama')) !!},
        datasets: [{
          label: 'Jumlah Penduduk',
          data: {!! json_encode($agama->pluck('jumlah_penganut')) !!},
          borderWidth: 1,
          datalabels: {
              anchor:'end',
              align:'top',
              offset: 5
          },
        }]
      },
      plugins: [ChartDataLabels],
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          datalabels: {
              formatter: function (value) {
                  return value.toLocaleString(); 
                  }
              }
          }
      }
    });


    const ctx6 = document.getElementById('Chart6');
    new Chart(ctx6, {
      type: 'bar',
      data: {
        labels: {!! json_encode($pendidikan->pluck('tingkat_pendidikan')) !!},
        datasets: [{
          label: 'Jumlah Penduduk',
          data: {!! json_encode($pendidikan->pluck('jumlah_peserta_didik')) !!},
          borderWidth: 1,
          datalabels: {
              anchor:'end',
              align:'top',
              offset: 5
          },
        }]
      },
      plugins: [ChartDataLabels],
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          datalabels: {
              formatter: function (value) {
                  return value.toLocaleString(); 
                  }
              }
          }
      }
    });

</script>
</body>
</html>