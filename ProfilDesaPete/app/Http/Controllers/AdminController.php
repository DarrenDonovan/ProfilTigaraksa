<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller{

    //Declare Database connection to data into admin adn index
    public function admin(){
        $user = Auth::user();

        $jenis_kelamin_per_wilayah = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select([
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
            ])
            ->first();

        $rasio_jenis_kelamin = [
            'Laki-Laki' => $jenis_kelamin_per_wilayah->laki_laki,
            'Perempuan' => $jenis_kelamin_per_wilayah->perempuan,
        ];

        $total_jenis_kelamin = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select([
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
            ])
            ->first();

        $jumlah_penduduk = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->whereIn('wilayah.jenis_wilayah', ['Desa', 'Kelurahan'])
            ->select('wilayah.nama_wilayah', DB::raw('COUNT(id_penduduk) as jumlah_penduduk'))
            ->groupBy('wilayah.nama_wilayah')
            ->get();

        $jumlah_penduduk = $jumlah_penduduk->sortByDesc('jumlah_penduduk')->values();
        
        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();
        
        $kelompok_umur_per_wilayah = DB::table('penduduk')
            ->select([
                DB::raw("
                    CASE
                        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 14 THEN '< 15 Tahun'
                        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 24 THEN '15 - 24 Tahun'
                        WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 25 AND 59 THEN '25 - 59 Tahun'
                        ELSE '> 60 Tahun'
                    END as kelompok_umur
                "),
                DB::raw('COUNT(*) as jumlah_penduduk')
            ])
            ->groupBy('kelompok_umur')
            ->get();

        $jumlah_keluarga = DB::table('keluarga_penduduk')
            ->select(DB::raw("COUNT(no_kk) as jumlah_keluarga"))
            ->distinct()
            ->first();

        return view('admin.dashboard', compact('kelompok_umur_per_wilayah', 'rasio_jenis_kelamin', 'total_jenis_kelamin', 'users', 'jenis_kelamin_per_wilayah', 'jumlah_penduduk', 'jumlah_keluarga'));
    }


    public function index(){
        $kegiatanterbaru = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
            ->select('kegiatan.*', 'jenis_kegiatan.*')
            ->orderBy('id_kegiatan', 'desc')->first();

        $kegiatan = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
            ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->orderBy('id_kegiatan', 'desc')
            ->get();

        $jenis_kegiatan = DB::table('jenis_kegiatan')
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'jenis_kegiatan.gambar_jenis_kegiatan')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $berita = DB::table('berita')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah')
            ->orderBy('id_berita', 'desc')
            ->limit(3)
            ->get();

        return view('public.index', compact('kegiatanterbaru', 'kegiatan', 'jenis_kegiatan', 'wilayah', 'berita', 'wilayahNoKec'));
    }


    public function kegiatan(){
        $user = Auth::user();

        //Kegiatan Terbaru
        if($user->role == 'superadmin'){
            $kegiatanterbaru = DB::table('kegiatan')
                ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
                ->join('wilayah', 'kegiatan.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
                ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
                ->orderBy('id_kegiatan', 'desc')
                ->first();
        }
        else{
            $kegiatanterbaru = DB::table('kegiatan')
                ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
                ->join('wilayah', 'kegiatan.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
                ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
                ->where('kegiatan.id_wilayah', $user->id_wilayah)
                ->orderBy('id_kegiatan', 'desc')
                ->first();
        }

        //Daftar Kegiatan
        if($user->role == 'superadmin'){
            $kegiatan = DB::table('kegiatan')
                ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
                ->join('wilayah', 'kegiatan.id_wilayah','=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
                ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
                ->orderBy('id_kegiatan', 'desc')
                ->paginate(5);
        }
        else{
            $kegiatan = DB::table('kegiatan')
                ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
                ->join('wilayah', 'kegiatan.id_wilayah','=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
                ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
                ->where('kegiatan.id_wilayah', $user->id_wilayah)
                ->orderBy('id_kegiatan', 'desc')
                ->paginate(5);
        }

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $jenis_kegiatan = DB::table('jenis_kegiatan')
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        return view('admin.kegiatanAdmin', compact('kegiatan', 'kegiatanterbaru', 'users', 'jenis_kegiatan', 'wilayah'));
    }


    public function profilWilayah(){
        $user = Auth::user();

        //perngkat kecamatan
        if($user->role == 'superadmin'){
            $perangkat_kecamatan = DB::table('perangkat_kecamatan')
                ->leftJoin('users', 'perangkat_kecamatan.updated_by', '=', 'users.id')
                ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat', 'perangkat_kecamatan.updated_by', 'perangkat_kecamatan.updated_at', 'users.name')
                ->get();
        }
        else{
            $perangkat_kecamatan = DB::table('perangkat_kecamatan')
                ->leftJoin('users', 'perangkat_kecamatan.updated_by', '=', 'users.id')
                ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat', 'perangkat_kecamatan.updated_by', 'perangkat_kecamatan.updated_at', 'users.name')
                ->where('perangkat_kecamatan.id_wilayah', $user->id_wilayah)
                ->get();
        }

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->leftJoin('users', 'wilayah.updated_by', '=', 'users.id')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.batas_utara', 'wilayah.batas_barat', 'wilayah.batas_timur', 'wilayah.batas_selatan', 'wilayah.updated_by', 'wilayah.updated_at', 'users.name') 
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $about = DB::table('about_us')
            ->join('wilayah', 'wilayah.id_wilayah', '=', 'about_us.id_wilayah')
            ->leftJoin('users', 'about_us.updated_by', '=', 'users.id')
            ->select('about_us.id_about', 'about_us.id_wilayah', 'about_us.visi', 'about_us.misi', 'about_us.gambar_about', 'about_us.bagan_organisasi', 'wilayah.nama_wilayah', 'about_us.updated_at', 'about_us.updated_by', 'users.name')
            ->first();
            

        return view('admin.profilWilayah', compact('perangkat_kecamatan', 'user', 'users', 'wilayah', 'wilayaheach', 'about'));

    }


    public function berita(){
        $user = Auth::user();

        //berita
        if($user->role == 'superadmin'){
            $berita = DB::table('berita')
                ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'berita.updated_by', '=', 'users.id')
                ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah', 'berita.updated_at', 'berita.updated_by', 'users.name')
                ->orderBy('id_berita', 'desc')
                ->paginate(5);
        }
        else{
            $berita = DB::table('berita')
                ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'berita.updated_by', '=', 'users.id')
                ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah', 'berita.updated_at', 'berita.updated_by', 'users.name')
                ->where('berita.id_wilayah', $user->id_wilayah)
                ->orderBy('id_berita', 'desc')
                ->paginate(5);
        }

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        return view('admin.beritaAdmin', compact('berita', 'user', 'users', 'wilayah'));
    }

    public function infografis(){
        $user = Auth::user();

        $jenis_kelamin_per_wilayah = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->whereIn('wilayah.jenis_wilayah', ['Desa', 'Kelurahan'])
            ->select([
                'wilayah.nama_wilayah',
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
            ])
            ->groupBy('wilayah.nama_wilayah')
            ->first();


        $rasio_jenis_kelamin = [
            'Laki-Laki' => $jenis_kelamin_per_wilayah->laki_laki,
            'Perempuan' => $jenis_kelamin_per_wilayah->perempuan,
        ];

        
        $wilayaheach = DB::table('wilayah')
            ->leftJoin('users', 'wilayah.updated_by', '=', 'users.id')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.batas_utara', 'wilayah.batas_barat', 'wilayah.batas_timur', 'wilayah.batas_selatan', 'wilayah.updated_by', 'wilayah.updated_at', 'users.name') 
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        

        if($user->role == 'superadmin'){
            $kelompok_umur_per_wilayah = DB::table('penduduk')
                ->select([
                    DB::raw("
                        CASE
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 14 THEN '< 15 Tahun'
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 24 THEN '15 - 24 Tahun'
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 25 AND 59 THEN '25 - 59 Tahun'
                            ELSE '> 60 Tahun'
                        END as kelompok_umur
                    "),
                    DB::raw('COUNT(*) as jumlah_penduduk')
                ])
                ->groupBy('kelompok_umur')
                ->get();

            $pekerjaan = DB::table('penduduk')
                ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->select('pekerjaan.pekerjaan', DB::raw('COUNT(penduduk.id_pekerjaan) as jumlah_pekerja'))
                ->groupBy('pekerjaan.pekerjaan')
                ->get();
    
            $agama = DB::table('penduduk')
                ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
                ->select('agama.agama', DB::raw('COUNT(penduduk.id_agama) as jumlah_penganut'))
                ->groupBy('agama.agama')
                ->get();
    
            $pendidikan = DB::table('penduduk')
                ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
                ->select('pendidikan.tingkat_pendidikan', DB::raw('COUNT(penduduk.id_pendidikan) as jumlah_peserta_didik'))
                ->groupBy('pendidikan.tingkat_pendidikan')
                ->get();
        }
        else{
            $kelompok_umur_per_wilayah = DB::table('penduduk')
                ->select([
                    DB::raw("
                        CASE
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 14 THEN '< 15 Tahun'
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 24 THEN '15 - 24 Tahun'
                            WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 25 AND 59 THEN '25 - 59 Tahun'
                            ELSE '> 60 Tahun'
                        END as kelompok_umur
                    "),
                    DB::raw('COUNT(*) as jumlah_penduduk')
                ])
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->groupBy('kelompok_umur')
                ->get();

            $pekerjaan = DB::table('penduduk')
                ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->select('pekerjaan.pekerjaan', DB::raw('COUNT(penduduk.id_pekerjaan) as jumlah_pekerja'))
                ->groupBy('pekerjaan.pekerjaan')
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->get();
    
            $agama = DB::table('penduduk')
                ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
                ->select('agama.agama', DB::raw('COUNT(penduduk.id_agama) as jumlah_penganut'))
                ->groupBy('agama.agama')
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->get();
    
            $pendidikan = DB::table('penduduk')
                ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
                ->select('pendidikan.tingkat_pendidikan', DB::raw('COUNT(penduduk.id_pendidikan) as jumlah_peserta_didik'))
                ->groupBy('pendidikan.tingkat_pendidikan')
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->get();
        }

        $pekerjaan = $pekerjaan->sortByDesc('jumlah_pekerja')->values();
        $agama = $agama->sortByDesc('jumlah_penganut')->values();
        $pendidikan = $pendidikan->sortByDesc('jumlah_peserta_didik')->values();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get(); 

        return view('admin.infografisAdmin', compact('user', 'wilayaheach', 'users', 'rasio_jenis_kelamin', 'jenis_kelamin_per_wilayah', 'kelompok_umur_per_wilayah', 'pekerjaan', 'agama', 'pendidikan'));
        
    }

    public function wisata(){
        $user = Auth::user();

        //Daftar Wisata
        if($user->role == 'superadmin'){
            $wisata = DB::table('wisata')
                ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'wisata.updated_by', '=', 'users.id')
                ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.keterangan', 'wisata.gambar_wisata', 'wisata.latitude', 'wisata.longitude', 'users.name', 'wisata.updated_by', 'wisata.updated_at')
                ->orderBy('wisata.id_wilayah', 'asc')
                ->paginate(5);
        }
        else{
            $wisata = DB::table('wisata')
                ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'wisata.updated_by', '=', 'users.id')
                ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.keterangan', 'wisata.gambar_wisata', 'wisata.latitude', 'wisata.longitude', 'users.name', 'wisata.updated_at', 'wisata.updated_by')
                ->where('wisata.id_wilayah', $user->id_wilayah)
                ->orderBy('wisata.id_wilayah', 'asc')
                ->paginate(5);   
        }

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        return view('admin.wisataAdmin', compact('user', 'users', 'wisata', 'wilayahNoKec', 'wilayah'));
    }


    public function umkm(){
        $user = Auth::user();

        //Daftar UMKM
        if($user->role == 'superadmin'){
            $umkm = DB::table('umkm')
                ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
                ->leftJoin('users', 'umkm.updated_by', '=', 'users.id')
                ->select('umkm.id_umkm', 'umkm.id_wilayah', 'umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm', 'wilayah.nama_wilayah', 'umkm.nama_umkm', 'umkm.keterangan', 'umkm.gambar_umkm', 'umkm.latitude', 'umkm.longitude', 'users.name', 'umkm.updated_by', 'umkm.updated_at')
                ->orderBy('umkm.id_wilayah', 'asc')
                ->paginate(5);
        }
        else{
            $umkm = DB::table('umkm')
                ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
                ->leftJoin('users', 'umkm.updated_by', '=', 'users.id')
                ->select('umkm.id_umkm', 'umkm.id_wilayah', 'umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm', 'wilayah.nama_wilayah', 'umkm.nama_umkm', 'umkm.keterangan', 'umkm.gambar_umkm', 'umkm.latitude', 'umkm.longitude', 'users.name', 'umkm.updated_by', 'umkm.updated_at')
                ->where('umkm.id_wilayah', $user->id_wilayah)
                ->orderBy('umkm.id_wilayah', 'asc')
                ->paginate(5);
        }
        
        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        $jenis_umkm = DB::table('jenis_umkm')
            ->select('jenis_umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm')
            ->get();

        return view('admin.umkm', compact('user','users', 'umkm', 'wilayahNoKec', 'wilayah', 'jenis_umkm'));
    }

    public function penduduk(){
        $user = Auth::user();


        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        if($user->role == 'superadmin'){
            $penduduk = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
                ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
                ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->leftJoin('pernikahan_penduduk', 'penduduk.id_penduduk', '=', 'pernikahan_penduduk.id_penduduk')
                ->leftJoin('status_nikah', 'pernikahan_penduduk.id_status', '=', 'status_nikah.id_status')
                ->leftJoin('users', 'penduduk.updated_by', '=', 'users.id')
                ->select('penduduk.*', 'agama.*', 'pendidikan.*', 'pekerjaan.*', 'status_nikah.*', 'wilayah.id_wilayah', 'wilayah.nama_wilayah', DB::raw('FLOOR(DATEDIFF(CURDATE(), penduduk.tanggal_lahir) / 365) as umur'), 'penduduk.updated_by', 'penduduk.updated_at', 'users.name')
                ->orderBy('penduduk.nik', 'asc')
                ->paginate(50);
        }
        else{
            $penduduk = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
                ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
                ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->leftJoin('pernikahan_penduduk', 'penduduk.id_penduduk', '=', 'pernikahan_penduduk.id_penduduk')
                ->leftJoin('status_nikah', 'pernikahan_penduduk.id_status', '=', 'status_nikah.id_status')
                ->leftJoin('users', 'penduduk.updated_by', '=', 'users.id')
                ->select('penduduk.*', 'agama.*', 'pendidikan.*', 'pekerjaan.*', 'status_nikah.*', 'wilayah.*', DB::raw('FLOOR(DATEDIFF(CURDATE(), penduduk.tanggal_lahir) / 365) as umur'), 'penduduk.updated_by', 'penduduk.updated_at', 'users.name')
                ->where('wilayah.id_wilayah', $user->id_wilayah)
                ->orderBy('penduduk.nik', 'asc')
                ->paginate(50);
        }

        return view('admin.penduduk', compact('user', 'users', 'penduduk'));
    }

    public function editPenduduk($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();
        
        $penduduk = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->leftJoin('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
            ->leftJoin('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
            ->leftJoin('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
            ->leftJoin('kelahiran_penduduk', 'penduduk.id_penduduk', '=', 'kelahiran_penduduk.id_penduduk')
            ->leftJoin('kewarganegaraan_penduduk', 'penduduk.id_penduduk', '=', 'kewarganegaraan_penduduk.id_penduduk')
            ->leftJoin('kesehatan_penduduk', 'penduduk.id_penduduk', '=', 'kesehatan_penduduk.id_penduduk')
            ->leftJoin('keluarga_penduduk', 'penduduk.id_penduduk', '=', 'keluarga_penduduk.id_penduduk')
            ->leftJoin('pernikahan_penduduk', 'penduduk.id_penduduk', '=', 'pernikahan_penduduk.id_penduduk')
            ->leftJoin('status_nikah', 'pernikahan_penduduk.id_status', '=', 'status_nikah.id_status')
            ->leftJoin('hubungan_keluarga', 'keluarga_penduduk.hub_keluarga', '=', 'hubungan_keluarga.id_hubungan')
            ->leftJoin('users', 'penduduk.updated_by', '=', 'users.id')
            ->select('penduduk.id_penduduk as penduduk_id', 'penduduk.*', 'agama.*', 'pendidikan.*', 'pekerjaan.*', 'wilayah.*', 'status_nikah.*', 'kelahiran_penduduk.*', 'hubungan_keluarga.*', 'kesehatan_penduduk.*', 'kewarganegaraan_penduduk.*', 'keluarga_penduduk.*', 'pernikahan_penduduk.*', DB::raw('FLOOR(DATEDIFF(CURDATE(), penduduk.tanggal_lahir) / 365) as umur'), 'penduduk.updated_by', 'penduduk.updated_at', 'users.name')
            ->where('penduduk.id_penduduk', $id)
            ->get();

        $data = [
            'wilayah' => DB::table('wilayah')->get(),
            'agama' => DB::table('agama')->get(),
            'pendidikan' => DB::table('pendidikan')->get(),
            'pekerjaan' => DB::table('pekerjaan')->get(),
            'status_nikah' => DB::table('status_nikah')->get(),
            'hubungan_keluarga' => DB::table('hubungan_keluarga')->get(),
        ];

        return view('admin.editPenduduk', compact('user', 'users', 'penduduk'), $data);
    }

    public function tambahPenduduk(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();
        
        $penduduk = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
            ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
            ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
            ->leftJoin('users', 'penduduk.updated_by', 'users.id')
            ->select('penduduk.*', 'agama.*', 'pendidikan.*', 'pekerjaan.*', 'wilayah.*', DB::raw('FLOOR(DATEDIFF(CURDATE(), penduduk.tanggal_lahir) / 365) as umur'), 'penduduk.updated_by', 'penduduk.updated_at', 'users.name')
            ->get();

        $data = [
            'wilayah' => DB::table('wilayah')->get(),
            'agama' => DB::table('agama')->get(),
            'pendidikan' => DB::table('pendidikan')->get(),
            'pekerjaan' => DB::table('pekerjaan')->get(),
            'status_nikah' => DB::table('status_nikah')->get(),
            'hubungan_keluarga' => DB::table('hubungan_keluarga')->get(),
        ];

        return view('admin.tambahPenduduk', compact('user', 'users', 'penduduk'), $data);
    }

    public function adminLog(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $user_log = DB::table('user_log')
            ->join('users', 'user_log.user_id', '=', 'users.id')
            ->select('users.name', 'user_log.*')
            ->paginate(50);

        return view('admin.adminLog', compact('user', 'users', 'user_log'));
    }

    public function tambahWisata(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $user_log = DB::table('user_log')
            ->join('users', 'user_log.user_id', '=', 'users.id')
            ->select('users.name', 'user_log.*')
            ->paginate(50);

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();
        
        $wilayahUser = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();


        return view('admin.tambahWisata', compact('user', 'users', 'user_log', 'wilayahNoKec', 'wilayahUser'));
    }

    public function editWisata($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $wilayahUser = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wisata = DB::table('wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->where('wisata.id_wisata', $id)
            ->get();
        
        return view('admin.editWisata', compact('user', 'users', 'wisata', 'wilayahNoKec', 'wilayahUser'));
    }

    public function tambahUmkm(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();
        
        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $wilayahUser = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $jenis_umkm = DB::table('jenis_umkm')
            ->select('jenis_umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm')
            ->get();

        return view('admin.tambahUmkm', compact('user', 'users', 'wilayahNoKec', 'jenis_umkm', 'wilayahUser'));
    }

    public function editUmkm($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();
        
        $umkm = DB::table('umkm')
            ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
            ->select('umkm.*', 'wilayah.nama_wilayah', 'jenis_umkm.jenis_umkm')
            ->where('umkm.id_umkm', $id)
            ->get();
        
        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();
        
        $wilayahUser = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $jenis_umkm = DB::table('jenis_umkm')
            ->select('jenis_umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm')
            ->get();

        return view('admin.editUmkm', compact('user', 'users', 'umkm', 'wilayahNoKec', 'wilayahUser', 'jenis_umkm'));
    }



    //Create Admin
    public function create(){
        if(Auth::user()->role !== 'superadmin'){
            abort(403, 'Unauthorized Access');
        }

        $users = DB::table('users')
            ->join('wilayah', 'wilayah.id_wilayah', 'users.id_wilayah')
            ->select('users.name', 'users.email', 'users.role', 'users.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        return view('admin.createadmin', compact('users','wilayah'));
    }


    //Store Admin Data
    public function store(Request $request){
        if(Auth::user()->role !== 'superadmin'){
            abort(403, 'Unauthorized Access');
        }
        
         $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'wilayah'=>'required|integer'
         ]);

         User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'role'=>'admin',
            'id_wilayah'=>$request->wilayah
         ]);

         return redirect('admin/createadmin')->with('success', 'Admin created successfully!');
    }

    //Create Data
    public function createDataPenduduk(Request $request){
        $request->validate([
            'nik' => 'string|size:16|regex:/^\d{16}$/',
            'nama_lengkap' => 'required|string',
            'gambar_biodata' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'alamat' => 'required|string',
            'wilayah' => 'required|integer',
            'agama' => 'required|integer',
            'pekerjaan' => 'required|integer',
            'pendidikan' => 'required|integer',
            'suku_etnis' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|email',
            
            'no_akta_lahir' => 'required|string',
            'waktu_kelahiran' => 'nullable',
            'tempat_dilahirkan' => 'required|string',
            'anak_ke' => 'required|integer',
            'berat_lahir' => 'required|integer',
            'tinggi_lahir' => 'required|integer',

            'no_kk' => 'required|string|size:16|regex:/^\d{16}$/',
            'hub_keluarga' => 'required|integer',
            'nik_ayah' => 'required|string|size:16|regex:/^\d{16}$/',
            'nama_ayah' => 'required|string',
            'nik_ibu' => 'required|string|size:16|regex:/^\d{16}$/',
            'nama_ibu' => 'required|string',

            'status_wn' => 'required|string',
            'no_paspor' => 'required_if:status_wn,WNA|nullable|string',
            'tanggal_paspor' => 'required_if:status_wn,WNA|nullable|date',
            'no_kitas_kitap' => 'required_if:status_wn,WNA|string|size:11|regex:/^\d{11}$/',
            'negara_asal' => 'required_if:status_wn,WNA|nullable|string',

            'status_kawin' => 'required|integer',
            'no_akta_nikah' => 'required_if:status_kawin,2|nullable|string',
            'tanggal_nikah' => 'required_if:status_kawin,2|nullable|date',
            'tanggal_cerai' => 'required_if:status_kawin,3,4|nullable|date',

            'golongan_darah' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'asuransi_kesehatan' => 'nullable|string',
            'no_asuransi' => 'nullable|string',
            'no_bpjs_naker' => 'nullable|string|size:11|regex:/^\d{11}$/'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_biodata')){
            $imagePath = $request->file('gambar_biodata')->store('gambar_biodata', 'public');
        }

        $id_penduduk = DB::table('penduduk')->insertGetId([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'gambar_biodata' => $imagePath,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id_wilayah' => $request->wilayah,
            'id_agama' => $request->agama,
            'id_pekerjaan' => $request->pekerjaan,
            'id_pendidikan' => $request->pendidikan,
            'suku_etnis' => $request->suku_etnis,
            'no_telepon' => $request->no_telp,
            'email' => $request->email,
            'tanggal_terdaftar' => now()
        ]);

        DB::table('kelahiran_penduduk')->insert([
            'id_penduduk' => $id_penduduk,
            'no_akta' => $request->no_akta_lahir,
            'waktu_lahir' => $request->waktu_kelahiran,
            'tempat_dilahirkan' => $request->tempat_dilahirkan,
            'anak_ke' => $request->anak_ke,
            'berat_lahir' => $request->berat_lahir,
            'tinggi_lahir' => $request->tinggi_lahir
        ]);

        DB::table('keluarga_penduduk')->insert([
            'id_penduduk' => $id_penduduk,
            'no_kk' => $request->no_kk,
            'hub_keluarga' => $request->hub_keluarga,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu
        ]);

        DB::table('kewarganegaraan_penduduk')->insert([
            'id_penduduk' => $id_penduduk,
            'status_wn' => $request->status_wn,
            'no_paspor' => $request->no_paspor,
            'tanggal_paspor' => $request->tanggal_paspor,
            'no_kitas_kitap' => $request->no_kitas_kitap,
            'negara_asal' => $request->negara_asal
        ]);

        DB::table('pernikahan_penduduk')->insert([
            'id_penduduk' => $id_penduduk,
            'id_status' => $request->status_kawin,
            'no_akta_nikah' => $request->no_akta_nikah,
            'tanggal_nikah' => $request->tanggal_nikah,
            'tanggal_cerai' => $request->tanggal_cerai
        ]);

        DB::table('kesehatan_penduduk')->insert([
            'id_penduduk' => $id_penduduk,
            'golongan_darah' => $request->golongan_darah,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'asuransi_kesehatan' => $request->asuransi_kesehatan,
            'no_asuransi' => $request->no_asuransi,
            'no_bpjs_naker' => $request->no_bpjs_naker
        ]);

        Session::flash('message', 'Data Berhasil Ditambahkan!');
        return redirect()->route('admin.penduduk');
    }

    public function createKegiatan(Request $request){
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'jenis_kegiatan' => 'required|integer', //Sama dengan option name
            'nama_wilayah' => 'required|integer',
            'keterangan' => 'required|string',
            'gambar_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_kegiatan')){
            $imagePath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
        }

        DB::table('kegiatan')->insert([
            'nama_kegiatan' => $request->nama_kegiatan,
            'id_jenis_kegiatan' => $request->jenis_kegiatan, //nama kolom ditable => name di option
            'id_wilayah' => $request->nama_wilayah,
            'keterangan' => $request->keterangan,
            'gambar_kegiatan' => $imagePath
        ]);

        Session::flash('message', 'Data Berhasil Ditambahkan!');
        return redirect()->route('admin.kegiatan');
    }

    public function createPerangkat(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'link_facebook' => 'nullable|string',
            'link_instagram' => 'nullable|string',
            'link_tiktok' => 'nullable|string',
            'gambar_perangkat' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_perangkat')){
            $imagePath = $request->file('gambar_perangkat')->store('perangkat_kecamatan', 'public');
        }

        DB::table('perangkat_kecamatan')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_tiktok' => $request->link_tiktok,
            'gambar_perangkat' => $imagePath
        ]);

        Session::flash('message', 'Data Berhasil Ditambahkan!');
        return redirect()->route('admin.profilWilayah');
    }

    public function createBerita(Request $request){
        $request->validate([
            'judul_berita' => 'required|string',
            'penulis_berita' => 'required|string',
            'tanggal_berita' => 'required|date',
            'nama_wilayah' => 'required|integer',
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'add_konten_berita' => 'required|string'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_berita')){
            $imagePath = $request->file('gambar_berita')->store('berita', 'public');
        }

        DB::table('berita')->insert([
            'judul_berita' => $request->judul_berita,
            'penulis_berita' => $request->penulis_berita,
            'tanggal_berita' => $request->tanggal_berita,
            'id_wilayah' => $request->nama_wilayah,
            'gambar_berita' => $imagePath,
            'konten_berita' => $request->add_konten_berita
        ]);

        Session::flash('message', 'Data Berhasil Ditambahkan!');
        return redirect()->route('admin.berita');
    }

    public function createWisata(Request $request){
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric', 
            'nama_tempat' => 'required|string',
            'nama_wilayah' => 'required|integer',
            'keterangan' => 'required|string',
            'gambar_wisata' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_wisata')){
            $imagePath = $request->file('gambar_wisata')->store('wisata', 'public');
        }

        DB::table('wisata')->insert([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, //nama kolom ditable => name di option
            'id_wilayah' => $request->nama_wilayah,
            'nama_tempat' => $request->nama_tempat,
            'keterangan' => $request->keterangan,
            'gambar_wisata' => $imagePath
        ]);

        Session::flash('message', 'Data Berhasil Ditambahkan!');        
        return redirect()->route('admin.wisata');
    }

    public function createUMKM(Request $request){
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric', 
            'nama_umkm' => 'required|string',
            'nama_wilayah' => 'required|integer',
            'jenis_umkm' => 'required|integer',
            'keterangan' => 'required|string',
            'gambar_umkm' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('gambar_umkm')){
            $imagePath = $request->file('gambar_umkm')->store('umkm', 'public');
        }

        DB::table('umkm')->insert([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, 
            'id_wilayah' => $request->nama_wilayah,
            'nama_umkm' => $request->nama_umkm,
            'id_jenis_umkm' => $request->jenis_umkm,
            'keterangan' => $request->keterangan,
            'gambar_umkm' => $imagePath
        ]);
        
        Session::flash('message', 'Data Berhasil Ditambahkan!');
        return redirect()->route('admin.umkm');
    }



    //Data Update
    public function updateDataPenduduk(Request $request, $id){
        $request->validate([
            'nik' => 'string|size:16|regex:/^\d{16}$/',
            'nama_lengkap' => 'required|string',
            'gambar_biodata' => 'image|mimes:jpeg,png,jpg|max:2048',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'alamat' => 'required|string',
            'wilayah' => 'required|integer',
            'agama' => 'required|integer',
            'pekerjaan' => 'required|integer',
            'pendidikan' => 'required|integer',
            'suku_etnis' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|email',
            
            'no_akta_lahir' => 'required|string',
            'waktu_kelahiran' => 'nullable',
            'tempat_dilahirkan' => 'required|string',
            'anak_ke' => 'required|integer',
            'berat_lahir' => 'required|integer',
            'tinggi_lahir' => 'required|integer',

            'no_kk' => 'required|string|size:16|regex:/^\d{16}$/',
            'hub_keluarga' => 'required|integer',
            'nik_ayah' => 'required|string|size:16|regex:/^\d{16}$/',
            'nama_ayah' => 'required|string',
            'nik_ibu' => 'required|string|size:16|regex:/^\d{16}$/',
            'nama_ibu' => 'required|string',

            'status_wn' => 'required|string',
            'no_paspor' => 'required_if:status_wn,WNA|nullable|string',
            'tanggal_paspor' => 'required_if:status_wn,WNA|nullable|date',
            'no_kitas_kitap' => 'required_if:status_wn,WNA|string|size:11|regex:/^\d{11}$/',
            'negara_asal' => 'required_if:status_wn,WNA|nullable|string',

            'status_kawin' => 'required|integer',
            'no_akta_nikah' => 'required_if:status_kawin,2|nullable|string',
            'tanggal_nikah' => 'required_if:status_kawin,2|nullable|date',
            'tanggal_cerai' => 'required_if:status_kawin,3,4|nullable|date',

            'golongan_darah' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'asuransi_kesehatan' => 'nullable|string',
            'no_asuransi' => 'nullable|string',
            'no_bpjs_naker' => 'nullable|string|size:11|regex:/^\d{11}$/'
        ]);

        $penduduk = DB::table('penduduk')
            ->where('id_penduduk', $id)
            ->first();

        if(!$penduduk){
            return redirect()->route('admin.penduduk')->with('error', 'Data tidak ditemukan.');
        }

        $imagePath = $penduduk->gambar_biodata;
        if ($request->hasFile('gambar_biodata')) {
            if ($penduduk->gambar_biodata) {
                Storage::disk('public')->delete($penduduk->gambar_biodata);
            }

            $imagePath = $request->file('gambar_biodata')->store('gambar_biodata', 'public');
        }

        DB::table('penduduk')->where('id_penduduk', $id)->update([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'gambar_biodata' => $imagePath,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'suku_etnis' => $request->suku_etnis,
            'no_telepon' => $request->no_telp,
            'email' => $request->email,
            'id_wilayah' => $request->wilayah,
            'id_agama' => $request->agama,
            'id_pendidikan' => $request->pendidikan,
            'id_pekerjaan' => $request->pekerjaan,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ]);

        DB::table('kelahiran_penduduk')->where('id_penduduk', $id)->update([
            'no_akta' => $request->no_akta_lahir,
            'waktu_lahir' => $request->waktu_kelahiran,
            'tempat_dilahirkan' => $request->tempat_dilahirkan,
            'anak_ke' => $request->anak_ke,
            'berat_lahir' => $request->berat_lahir,
            'tinggi_lahir' => $request->tinggi_lahir
        ]);

        DB::table('keluarga_penduduk')->where('id_penduduk', $id)->update([
            'no_kk' => $request->no_kk,
            'hub_keluarga' => $request->hub_keluarga,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu
        ]);

        DB::table('kewarganegaraan_penduduk')->where('id_penduduk', $id)->update([
            'status_wn' => $request->status_wn,
            'no_paspor' => $request->no_paspor,
            'tanggal_paspor' => $request->tanggal_paspor,
            'no_kitas_kitap' => $request->no_kitas_kitap,
            'negara_asal' => $request->negara_asal
        ]);

        DB::table('pernikahan_penduduk')->where('id_penduduk', $id)->update([
            'id_status' => $request->status_kawin,
            'no_akta_nikah' => $request->no_akta_nikah,
            'tanggal_nikah' => $request->tanggal_nikah,
            'tanggal_cerai' => $request->tanggal_cerai
        ]);

        DB::table('kesehatan_penduduk')->where('id_penduduk', $id)->update([
            'golongan_darah' => $request->golongan_darah,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'asuransi_kesehatan' => $request->asuransi_kesehatan,
            'no_asuransi' => $request->no_asuransi,
            'no_bpjs_naker' => $request->no_bpjs_naker
        ]);

        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.penduduk')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateKegiatan(Request $request, $id){

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|integer', //Sama dengan option name
            'nama_wilayah' => 'required|integer', 
            'keterangan' => 'required|string',
            'gambar_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $kegiatan = DB::table('kegiatan')
            ->where('id_kegiatan', $id)
            ->first();
        
        if (!$kegiatan) {
            return redirect()->route('admin.profilWilayah')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'id_jenis_kegiatan' => $request->jenis_kegiatan,  //nama kolom ditable => name di option
            'id_wilayah' => $request->nama_wilayah,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_kegiatan')) {
            if ($kegiatan->gambar_kegiatan) {
                Storage::disk('public')->delete($kegiatan->gambar_kegiatan);
            }

            $imagePath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
            $updateData['gambar_kegiatan'] = $imagePath;
        }

        DB::table('kegiatan')->where('id_kegiatan', $id)->update($updateData);
        
        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.kegiatan')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateAboutUs(Request $request){
        $request -> validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'gambar_about' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bagan_organisasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $about_us = DB::table('about_us')->first();

        if (!$about_us) {
            return redirect()->route('admin.profilWilayah')->with('error', 'Data tidak ditemukan.');
        }   

        $updateData = [
            'visi' => $request->visi,
            'misi' => $request->misi,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_about')) {
            if ($about_us->gambar_about) {
                Storage::disk('public')->delete($about_us->gambar_about);
            }

            $imagePath = $request->file('gambar_about')->store('about_us', 'public');
            $updateData['gambar_about'] = $imagePath;
        }

        if ($request->hasFile('bagan_organisasi')) {
            if ($about_us->bagan_organisasi) {
                Storage::disk('public')->delete($about_us->bagan_organisasi);
            }

            $imagePath = $request->file('bagan_organisasi')->store('bagan_organisasi', 'public');
            $updateData['bagan_organisasi'] = $imagePath;
        }

        DB::table('about_us')->where('id_about', $about_us->id_about)->update($updateData);

        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.profilWilayah')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateProfil(Request $request, $id){
        $request->validate([
            'gambar_wilayah' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $wilayah = DB::table('wilayah')
            ->where('id_wilayah', $id)
            ->first();
        
        if (!$wilayah) {
            return redirect()->route('admin.profilWilayah')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_wilayah')) {
            if ($wilayah->gambar_wilayah) {
                Storage::disk('public')->delete($wilayah->gambar_wilayah);
            }

            $imagePath = $request->file('gambar_wilayah')->store('profilwilayah', 'public');
            $updateData['gambar_wilayah'] = $imagePath;
        }

        DB::table('wilayah')->where('id_wilayah', $id)->update($updateData);

        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.profilWilayah')->with('success', 'Data berhasil diperbarui.');
    }


    public function updatePerangkat(Request $request, $id){
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'link_facebook' => 'nullable|string',
            'link_instagram' => 'nullable|string',
            'link_tiktok' => 'nullable|string',
            'gambar_perangkat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $perangkat = DB::table('perangkat_kecamatan')
            ->where('id_perangkat', $id)
            ->first();
        
        if (!$perangkat) {
            return redirect()->route('admin.profilWilayah')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_tiktok' => $request->link_tiktok,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_perangkat')) {
            if ($perangkat->gambar_perangkat) {
                Storage::disk('public')->delete($perangkat->gambar_perangkat);
            }

            $imagePath = $request->file('gambar_perangkat')->store('perangkat_kecamatan', 'public');
            $updateData['perangkat_kecamatan'] = $imagePath;
        }

        DB::table('perangkat_kecamatan')->where('id_perangkat', $id)->update($updateData);

        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.profilWilayah')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateBerita(Request $request, $id){
        $request -> validate([
            'judul_berita' => 'required|string',
            'penulis_berita' => 'required|string',
            'tanggal_berita' => 'required|date',
            'nama_wilayah'=> 'required|integer',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'konten_berita' => 'required|string'
        ]);

        $berita = DB::table('berita')
            ->where('berita.id_berita', $id)
            ->first();
        
        if(!$berita){
            return redirect()->route('admin.berita')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'judul_berita' => $request->judul_berita,
            'penulis_berita' => $request->penulis_berita,
            'tanggal_berita' => $request->tanggal_berita,
            'id_wilayah' => $request->nama_wilayah,
            'konten_berita' => $request->konten_berita,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_berita')) {
            if ($perangkat->gambar_berita) {
                Storage::disk('public')->delete($berita->gambar_berita);
            }

            $imagePath = $request->file('gambar_berita')->store('berita', 'public');
            $updateData['berita'] = $imagePath;
        }

        DB::table('berita')->where('id_berita', $id)->update($updateData);

        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.berita')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateWisata(Request $request, $id){
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'nama_wilayah' => 'required|integer', 
            'keterangan' => 'required|string',
            'gambar_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $wisata = DB::table('wisata')
            ->where('id_wisata', $id)
            ->first();
        
        if (!$wisata) {
            return redirect()->route('admin.wisata')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'nama_tempat' => $request->nama_tempat,
            'id_wilayah' => $request->nama_wilayah,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_wisata')) {
            if ($wisata->gambar_wisata) {
                Storage::disk('public')->delete($wisata->gambar_wisata);
            }

            $imagePath = $request->file('gambar_wisata')->store('wisata', 'public');
            $updateData['gambar_wisata'] = $imagePath;
        }

        DB::table('wisata')->where('id_wisata', $id)->update($updateData);
        
        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.wisata')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateUMKM(Request $request, $id){
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama_umkm' => 'required|string|max:255',
            'nama_wilayah' => 'required|integer',
            'jenis_umkm'=> 'required|integer', 
            'keterangan' => 'required|string',
            'gambar_umkm' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $umkm = DB::table('umkm')
            ->where('id_umkm', $id)
            ->first();
        
        if (!$umkm) {
            return redirect()->route('admin.umkm')->with('error', 'Data tidak ditemukan.');
        }

        $updateData = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nama_umkm' => $request->nama_umkm,
            'id_wilayah' => $request->nama_wilayah,
            'id_jenis_umkm' => $request->jenis_umkm,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_umkm')) {
            if ($umkm->gambar_umkm) {
                Storage::disk('public')->delete($umkm->gambar_umkm);
            }

            $imagePath = $request->file('gambar_umkm')->store('umkm', 'public');
            $updateData['gambar_umkm'] = $imagePath;
        }

        DB::table('umkm')->where('id_umkm', $id)->update($updateData);
        
        Session::flash('message', 'Data Berhasil Diupdate!');
        return redirect()->route('admin.umkm')->with('success', 'Data berhasil diperbarui.');
    }




    //Delete Data
    public function deleteKegiatan($id){
        $kegiatan = DB::table('kegiatan')
            ->where('id_kegiatan', $id)
            ->first();

        DB::table('kegiatan')->where('id_kegiatan', $id)->delete();
        Storage::disk('public')->delete($kegiatan->gambar_kegiatan);

        Session::flash('message', 'Data Berhasil Dihapus!');
        return redirect()->route('admin.kegiatan');
    }

    public function deleteAdmin(Request $request){
        $request->validate([
            'admin' => 'required|integer'
        ]);

        DB::table('users')->where('id', $request->admin)->delete();
        Session::flash('message', 'Admin Berhasil Dihapus!');
        return redirect()->route('removeAdmin');
    }

    public function deletePerangkat($id){
        $perangkat = DB::table('perangkat_kecamatan')
            ->where('id_perangkat', $id)
            ->first();

        DB::table('perangkat_kecamatan')->where('id_perangkat', $id)->delete();
        Storage::disk('public')->delete($perangkat->gambar_perangkat);

        Session::flash('message', 'Data Berhasil Dihapus!');
        return redirect()->route('admin.profilWilayah');
    }

    public function deleteBerita($id){
        $berita = DB::table('berita')
            ->where('id_berita', $id)
            ->first();

        DB::table('berita')
            ->where('id_berita', $id)
            ->delete();
        Storage::disk('public')->delete($berita->gambar_berita);

        Session::flash('message', 'Data Berhasil Dihapus!');
        return redirect()->route('admin.berita');
    }

    public function deleteWisata($id){
        $wisata = DB::table('wisata')
            ->where('id_wisata', $id)
            ->first();

        DB::table('wisata')->where('id_wisata', $id)->delete();
        Storage::disk('public')->delete($wisata->gambar_wisata);

        Session::flash('message', 'Data Berhasil Dihapus!');
        return redirect()->route('admin.wisata');
    }

    public function deleteUMKM($id){
        $umkm = DB::table('umkm')
            ->where('id_umkm', $id)
            ->first();

        DB::table('umkm')->where('id_umkm', $id)->delete();
        Storage::disk('public')->delete($umkm->gambar_umkm);

        Session::flash('message', 'Data Berhasil Dihapus!');
        return redirect()->route('admin.umkm');
    }

}