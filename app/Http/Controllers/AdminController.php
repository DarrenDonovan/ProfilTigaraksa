<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller{

    //Declare Database connection to data into admin adn index
    public function admin(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        if($user->role == 'superadmin'){
            $jenis_kelamin_per_wilayah = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->select([
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
                ])
                ->first();
                
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
            $jenis_kelamin_per_wilayah = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->select([
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
                ])
                ->where('wilayah.id_wilayah', $user->id_wilayah)
                ->first();
                
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

            $jumlah_keluarga = DB::table('keluarga_penduduk')
                ->join('penduduk', 'keluarga_penduduk.id_penduduk', '=', 'penduduk.id_penduduk')
                ->select(DB::raw("COUNT(no_kk) as jumlah_keluarga"))
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->distinct()
                ->first();

            $pekerjaan = DB::table('penduduk')
                ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
                ->select('pekerjaan.pekerjaan', DB::raw('COUNT(penduduk.id_pekerjaan) as jumlah_pekerja'))
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->groupBy('pekerjaan.pekerjaan')
                ->get();

            $agama = DB::table('penduduk')
                ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
                ->select('agama.agama', DB::raw('COUNT(penduduk.id_agama) as jumlah_penganut'))
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->groupBy('agama.agama')
                ->get();

            $pendidikan = DB::table('penduduk')
                ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
                ->select('pendidikan.tingkat_pendidikan', DB::raw('COUNT(penduduk.id_pendidikan) as jumlah_peserta_didik'))
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->groupBy('pendidikan.tingkat_pendidikan')
                ->get();
            }

            $rasio_jenis_kelamin = [
                'Laki-Laki' => $jenis_kelamin_per_wilayah->laki_laki,
                'Perempuan' => $jenis_kelamin_per_wilayah->perempuan,
            ];

            $jumlah_penduduk = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->whereIn('wilayah.jenis_wilayah', ['Desa', 'Kelurahan'])
                ->select('wilayah.nama_wilayah', DB::raw('COUNT(id_penduduk) as jumlah_penduduk'))
                ->groupBy('wilayah.nama_wilayah')
                ->get();

            $jumlah_penduduk = $jumlah_penduduk->sortByDesc('jumlah_penduduk')->values();
            $pekerjaan = $pekerjaan->sortByDesc('jumlah_pekerja')->values();
            $agama = $agama->sortByDesc('jumlah_penganut')->values();
            $pendidikan = $pendidikan->sortByDesc('jumlah_peserta_didik')->values();

            $wilayah = DB::table('wilayah')
                ->where('wilayah.id_wilayah', $user->id_wilayah)
                ->first();

            return view('admin.dashboard', compact('kelompok_umur_per_wilayah', 'rasio_jenis_kelamin', 'users', 'jenis_kelamin_per_wilayah', 'jumlah_penduduk', 'jumlah_keluarga', 'wilayah', 'pekerjaan', 'agama', 'pendidikan'));
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
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
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

        $berita_terbaru = DB::table('berita')
            ->select('berita.id_berita', 'berita.gambar_berita')
            ->orderBy('id_berita', 'desc')
            ->first();

        $dokum_kegiatan = DB::table('dokumentasi_kegiatan')
            ->get();

        $jumlah_dokum = DB::table('dokumentasi_kegiatan')
            ->select('id_kegiatan', DB::raw('COUNT(gambar) as jumlah_gambar'))
            ->groupBy('id_kegiatan')
            ->get();

        $data_berita = DB::table('berita')->select('id_berita as id', 'judul_berita as nama', 'konten_berita as deskripsi')->get()->map(function ($item) {
            $item->type = 'Berita';
            $item->url = route('detailberita', $item->id);
            return $item;
        });

        $data_wisata = DB::table('wisata')->select('id_wisata', 'nama_tempat as nama', 'id_wilayah', 'keterangan as deskripsi')->get()->map(function ($item) {
            $item->type = 'Wisata';
            $item->url = route('wisata', ['id_wilayah' => $item->id_wilayah, 'id_wisata' => $item->id_wisata]);
            return $item;
        });
        
        $data_search = $data_berita->merge($data_wisata);

        return view('public.index', compact('kegiatanterbaru', 'kegiatan', 'jenis_kegiatan', 'wilayah', 'berita', 'wilayahNoKec', 'dokum_kegiatan', 'jumlah_dokum', 'berita_terbaru', 'data_search'));
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
                ->paginate(25);
        }
        else{
            $kegiatan = DB::table('kegiatan')
                ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
                ->join('wilayah', 'kegiatan.id_wilayah','=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
                ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
                ->where('kegiatan.id_wilayah', $user->id_wilayah)
                ->orderBy('id_kegiatan', 'desc')
                ->paginate(25);
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.kegiatanAdmin', compact('kegiatan', 'kegiatanterbaru', 'users', 'jenis_kegiatan', 'wilayah', 'wilayaheach'));
    }


    public function profilWilayah(){
        $user = Auth::user();

        //perngkat kecamatan
        if($user->role == 'superadmin'){
            $perangkat_kecamatan = DB::table('perangkat_kecamatan')
                ->leftJoin('users', 'perangkat_kecamatan.updated_by', '=', 'users.id')
                ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat', 'perangkat_kecamatan.updated_by', 'perangkat_kecamatan.updated_at', 'users.name', 'perangkat_kecamatan.id_wilayah')
                ->get();

            $total_jenis_kelamin = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->select([
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
                ])
                ->first();
        }
        else{
            $perangkat_kecamatan = DB::table('perangkat_kecamatan')
                ->leftJoin('users', 'perangkat_kecamatan.updated_by', '=', 'users.id')
                ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat', 'perangkat_kecamatan.updated_by', 'perangkat_kecamatan.updated_at', 'users.name', 'perangkat_kecamatan.id_wilayah')
                ->where('perangkat_kecamatan.id_wilayah', $user->id_wilayah)
                ->get();

            $total_jenis_kelamin = DB::table('penduduk')
                ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
                ->select([
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                    DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
                ])
                ->where('penduduk.id_wilayah', $user->id_wilayah)
                ->first();
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
            

        return view('admin.profilWilayah', compact('perangkat_kecamatan', 'user', 'users', 'wilayah', 'wilayaheach', 'about', 'total_jenis_kelamin'));

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
                ->paginate(25);
        }
        else{
            $berita = DB::table('berita')
                ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'berita.updated_by', '=', 'users.id')
                ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah', 'berita.updated_at', 'berita.updated_by', 'users.name')
                ->where('berita.id_wilayah', $user->id_wilayah)
                ->orderBy('id_berita', 'desc')
                ->paginate(25);
        }

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        return view('admin.beritaAdmin', compact('berita', 'user', 'users', 'wilayah', 'wilayaheach'));
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
                ->paginate(25);
        }
        else{
            $wisata = DB::table('wisata')
                ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
                ->leftJoin('users', 'wisata.updated_by', '=', 'users.id')
                ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.keterangan', 'wisata.gambar_wisata', 'wisata.latitude', 'wisata.longitude', 'users.name', 'wisata.updated_at', 'wisata.updated_by')
                ->where('wisata.id_wilayah', $user->id_wilayah)
                ->orderBy('wisata.id_wilayah', 'asc')
                ->paginate(25);   
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
        
        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.wisataAdmin', compact('user', 'users', 'wisata', 'wilayahNoKec', 'wilayah', 'wilayaheach'));
    }


    public function umkm(){
        $user = Auth::user();

        //Daftar UMKM
        if($user->role == 'superadmin'){
            $umkm = DB::table('umkm')
                ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
                ->leftJoin('users', 'umkm.updated_by', '=', 'users.id')
                ->select('umkm.id_umkm', 'umkm.id_wilayah', 'umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm', 'wilayah.nama_wilayah', 'umkm.nama_umkm', 'umkm.keterangan', 'umkm.gambar_umkm', 'umkm.latitude', 'umkm.longitude', 'users.name', 'umkm.updated_by', 'umkm.updated_at', 'umkm.alamat')
                ->orderBy('umkm.id_wilayah', 'asc')
                ->paginate(25);
        }
        else{
            $umkm = DB::table('umkm')
                ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
                ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
                ->leftJoin('users', 'umkm.updated_by', '=', 'users.id')
                ->select('umkm.id_umkm', 'umkm.id_wilayah', 'umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm', 'wilayah.nama_wilayah', 'umkm.nama_umkm', 'umkm.keterangan', 'umkm.gambar_umkm', 'umkm.latitude', 'umkm.longitude', 'users.name', 'umkm.updated_by', 'umkm.updated_at', 'umkm.alamat')
                ->where('umkm.id_wilayah', $user->id_wilayah)
                ->orderBy('umkm.id_wilayah', 'asc')
                ->paginate(25);
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
        
        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $jenis_umkm = DB::table('jenis_umkm')
            ->select('jenis_umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm', 'jenis_umkm.gambar_jenis_umkm')
            ->get();

        return view('admin.umkm', compact('user','users', 'umkm', 'wilayahNoKec', 'wilayah', 'jenis_umkm', 'wilayaheach'));
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $pekerjaan = DB::table('pekerjaan')
            ->get();
            
        return view('admin.penduduk', compact('user', 'users', 'penduduk', 'wilayaheach', 'pekerjaan'));
    }

    public function paketWisata(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        if($user->role == 'superadmin'){
            $paket_wisata = DB::table('paket_wisata')
                ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
                ->leftJoin('users', 'paket_wisata.updated_by', '=', 'users.id')
                ->select('paket_wisata.*', 'wisata.nama_tempat', 'users.name')
                ->paginate(25);
        }
        else{
            $paket_wisata = DB::table('paket_wisata')
                ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
                ->leftJoin('users', 'paket_wisata.updated_by', '=', 'users.id')
                ->select('paket_wisata.*', 'wisata.nama_tempat', 'users.name')
                ->where('wisata.id_wilayah', $wilayaheach->id_wilayah)
                ->paginate(25);
        }

        return view('admin.paketWisata', compact('user', 'users', 'paket_wisata', 'wilayaheach'));
    }

    public function penginapan(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        if($user->role == 'superadmin'){
            $penginapan = DB::table('penginapan')
                ->join('paket_wisata', 'penginapan.id_paket', '=', 'paket_wisata.id_paket')
                ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
                ->leftJoin('users', 'penginapan.updated_by', '=', 'users.id')
                ->select('penginapan.*', 'wisata.nama_tempat', 'wisata.id_wilayah', 'users.name')
                ->paginate(25);
        }
        else{
            $penginapan = DB::table('penginapan')
                ->join('paket_wisata', 'penginapan.id_paket', '=', 'paket_wisata.id_paket')
                ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
                ->leftJoin('users', 'penginapan.updated_by', '=', 'users.id')
                ->select('penginapan.*', 'wisata.nama_tempat', 'wisata.id_wilayah', 'users.name')
                ->where('wisata.id_wilayah', $user->id_wilayah)
                ->paginate(25);
        }

        return view('admin.penginapan', compact('user', 'users', 'wilayaheach', 'penginapan'));
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.editPenduduk', compact('user', 'users', 'penduduk', 'wilayaheach'), $data);
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.tambahPenduduk', compact('user', 'users', 'penduduk', 'wilayaheach'), $data);
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
            ->orderByDesc('user_log.time')
            ->paginate(50);
        
        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.adminLog', compact('user', 'users', 'user_log', 'wilayaheach'));
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.tambahWisata', compact('user', 'users', 'user_log', 'wilayahNoKec', 'wilayahUser', 'wilayaheach'));
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
            ->join('wisata', 'wilayah.id_wilayah', '=', 'wisata.id_wilayah')
            ->select('wisata.nama_tempat', 'wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wisata.latitude', 'wisata.longitude')
            ->where('wisata.id_wisata', $id)
            ->first();

        $wisata = DB::table('wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('wisata_vr', 'wisata.id_wisata', '=', 'wisata_vr.id_wisata')
            ->select('wisata.*', 'wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wisata_vr.gambar_depan', 'wisata_vr.gambar_belakang', 'wisata_vr.gambar_kiri', 'wisata_vr.gambar_kanan', 'wisata_vr.gambar_atas', 'wisata_vr.gambar_bawah')
            ->where('wisata.id_wisata', $id)
            ->get();
        
        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();
        
        return view('admin.editWisata', compact('user', 'users', 'wisata', 'wilayahNoKec', 'wilayahUser', 'wilayaheach'));
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

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.tambahUmkm', compact('user', 'users', 'wilayahNoKec', 'jenis_umkm', 'wilayahUser', 'wilayaheach'));
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

        $dokum_umkm = DB::table('dokumentasi_umkm')
            ->where('dokumentasi_umkm.id_umkm', $id)
            ->get();
        
        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.latitude', 'wilayah.longitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();
        
        $wilayahUser = DB::table('wilayah')
            ->join('umkm', 'wilayah.id_wilayah', '=', 'umkm.id_wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'umkm.latitude', 'umkm.longitude')
            ->where('umkm.id_umkm', $id)
            ->first();

        $jenis_umkm = DB::table('jenis_umkm')
            ->select('jenis_umkm.id_jenis_umkm', 'jenis_umkm.jenis_umkm')
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        return view('admin.editUmkm', compact('user', 'users', 'umkm', 'wilayahNoKec', 'wilayahUser', 'jenis_umkm', 'wilayaheach', 'dokum_umkm'));
    }

    public function tambahBerita(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();
        
        return view('admin.tambahBerita', compact('user', 'users', 'wilayaheach', 'wilayah'));
    }

    public function editBerita($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();

        $berita = DB::table('berita')
            ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah', 'berita.updated_at', 'berita.updated_by')
            ->where('berita.id_berita', $id)
            ->first();

        return view('admin.editBerita', compact('user', 'users', 'wilayaheach', 'wilayah', 'berita'));
    }

    public function tambahKegiatan(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();

        $jenis_kegiatan = DB::table('jenis_kegiatan')
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->get();

        return view('admin.tambahKegiatan', compact('user', 'users', 'wilayaheach', 'wilayah', 'jenis_kegiatan'));
    }

    public function editKegiatan($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $jenis_kegiatan = DB::table('jenis_kegiatan')
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->get();

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();

        $kegiatan = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
            ->join('wilayah', 'kegiatan.id_wilayah','=', 'wilayah.id_wilayah')
            ->leftJoin('users', 'kegiatan.updated_by', '=', 'users.id')
            ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan', 'kegiatan.id_wilayah', 'wilayah.nama_wilayah', 'kegiatan.tanggal_kegiatan', 'kegiatan.updated_at', 'kegiatan.updated_by', 'users.name')
            ->where('kegiatan.id_kegiatan', $id)
            ->first();

        $dokumentasi = DB::table('dokumentasi_kegiatan')
            ->where('dokumentasi_kegiatan.id_kegiatan', $id)
            ->get();

        return view('admin.editKegiatan', compact('user', 'users', 'wilayaheach', 'kegiatan', 'jenis_kegiatan', 'wilayah', 'kegiatan', 'dokumentasi'));
    }

    public function tambahPaket(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();

        $wisata = DB::table('wisata')
            ->get();

        return view('admin.tambahPaket', compact('user', 'users', 'wilayaheach', 'wilayah', 'wisata'));
    }

    public function editPaket($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();

        $paket_wisata = DB::table('paket_wisata')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->select('paket_wisata.*', 'wisata.nama_tempat')
            ->where('paket_wisata.id_paket', $id)
            ->first();

        $wisata = DB::table('wisata')
            ->get();

        $dokum_paket = DB::table('dokumentasi_paket')
            ->get();

        $galeri_aktivitas = DB::table('galeri_aktivitas')
            ->where('id_paket', $id)
            ->get();

        return view('admin.editPaket', compact('user', 'users', 'wilayaheach', 'wilayah', 'paket_wisata', 'wisata', 'dokum_paket', 'galeri_aktivitas'));
    }

    public function tambahPenginapan(){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $paket_wisata = DB::table('paket_wisata')
            ->get();

        $paket_wilayah = DB::table('paket_wisata')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('paket_wisata.*', 'wisata.nama_tempat', 'wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->where('wilayah.id_wilayah', $user->id)
            ->get();

        $wilayah = DB::table('wilayah')
            ->get();

        return view('admin.tambahPenginapan', compact('user', 'users', 'wilayaheach', 'wilayah', 'paket_wisata', 'paket_wilayah'));
    }

    public function editPenginapan($id){
        $user = Auth::user();

        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->where('users.id', '>', 1)
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->where('wilayah.id_wilayah', $user->id_wilayah)
            ->first();

        $wilayah = DB::table('wilayah')
            ->get();

        $wilayahUser = DB::table('wilayah')
            ->join('umkm', 'wilayah.id_wilayah', '=', 'umkm.id_wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'umkm.latitude', 'umkm.longitude')
            ->where('umkm.id_umkm', $id)
            ->first();

        $penginapan = DB::table('penginapan')
            ->join('paket_wisata', 'penginapan.id_paket', '=', 'paket_wisata.id_paket')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->select('penginapan.*', 'wisata.nama_tempat', 'wisata.id_wilayah')
            ->where('penginapan.id_penginapan', $id)
            ->first();

        $paket_wisata = DB::table('paket_wisata')
            ->get();

        $paket_wilayah = DB::table('paket_wisata')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('paket_wisata.*', 'wisata.nama_tempat', 'wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->where('wilayah.id_wilayah', $user->id)
            ->get();

        $wisata = DB::table('wisata')
            ->get();

        return view('admin.editPenginapan', compact('user', 'users', 'wilayaheach', 'wilayah', 'penginapan', 'wisata', 'wilayahUser', 'paket_wisata', 'paket_wilayah'));
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
        try{
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
        catch(Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
    }
}

    public function createKegiatan(Request $request){
        try{
            $request->validate([
                'nama_kegiatan' => 'required|string|max:100',
                'jenis_kegiatan' => 'required|integer', //Sama dengan option name
                'nama_wilayah' => 'required|integer',
                'keterangan' => 'required|string',
                'tanggal_kegiatan' => 'required|date|before_or_equal:today',
                'gambar_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_kegiatan')){
                $imagePath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
            }

            $idKegiatan = DB::table('kegiatan')->insertGetId([
                'nama_kegiatan' => $request->nama_kegiatan,
                'id_jenis_kegiatan' => $request->jenis_kegiatan, //nama kolom ditable => name di option
                'id_wilayah' => $request->nama_wilayah,
                'keterangan' => $request->keterangan,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'gambar_kegiatan' => $imagePath
            ]);

            if($request->hasFile('dokumentasi')){
                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $dokum_path = $itemDokumentasi->store('dokumentasi_kegiatan', 'public');

                    DB::table('dokumentasi_kegiatan')->insert([
                        'id_kegiatan' => $idKegiatan,
                        'gambar' => $dokum_path
                    ]);
                }
            }

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.kegiatan');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createPerangkat(Request $request){
        try{
            $request->validate([
                'nama' => 'required|string',
                'jabatan' => 'required|string',
                'link_facebook' => 'nullable|string',
                'link_instagram' => 'nullable|string',
                'link_tiktok' => 'nullable|string',
                'nama_wilayah' => 'required|integer',
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
                'id_wilayah' => $request->nama_wilayah,
                'gambar_perangkat' => $imagePath
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.profilWilayah');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createBerita(Request $request){
        try{
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
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createWisata(Request $request){
        try{
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric', 
                'nama_tempat' => 'required|string',
                'nama_wilayah' => 'required|integer',
                'keterangan' => 'required|string',
                'gambar_wisata' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_depan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_kanan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_belakang' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_kiri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_atas' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_bawah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_wisata')){
                $imagePath = $request->file('gambar_wisata')->store('wisata', 'public');
            }

            $id_wisata = DB::table('wisata')->insertGetId([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude, //nama kolom ditable => name di option
                'id_wilayah' => $request->nama_wilayah,
                'nama_tempat' => $request->nama_tempat,
                'keterangan' => $request->keterangan,
                'gambar_wisata' => $imagePath
            ]);

            $gambarData = [];
            $arah = ['depan', 'kanan', 'belakang', 'kiri', 'atas', 'bawah'];

            foreach ($arah as $itemArah) {
                $field = 'gambar_' . $itemArah;
                $gambarData[$field] = $request->file($field)->store('wisata_vr', 'public');
            }

            DB::table('wisata_vr')->insert([
            'id_wisata' => $id_wisata,
            'nama_tempat' => $request->nama_tempat,
            'gambar_depan' => $gambarData['gambar_depan'],
            'gambar_kanan' => $gambarData['gambar_kanan'],
            'gambar_belakang' => $gambarData['gambar_belakang'],
            'gambar_kiri' => $gambarData['gambar_kiri'],
            'gambar_atas' => $gambarData['gambar_atas'],
            'gambar_bawah' => $gambarData['gambar_bawah'],
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');        
            return redirect()->route('admin.wisata');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createUMKM(Request $request){
        try{
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric', 
                'nama_umkm' => 'required|string',
                'nama_wilayah' => 'required|integer',
                'alamat' => 'required|string',
                'jenis_umkm' => 'required|integer',
                'keterangan' => 'required|string',
                'gambar_umkm' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_umkm')){
                $imagePath = $request->file('gambar_umkm')->store('umkm', 'public');
            }

            $idUMKM = DB::table('umkm')->insertGetId([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude, 
                'id_wilayah' => $request->nama_wilayah,
                'nama_umkm' => $request->nama_umkm,
                'alamat' => $request->alamat,
                'id_jenis_umkm' => $request->jenis_umkm,
                'keterangan' => $request->keterangan,
                'gambar_umkm' => $imagePath
            ]);

            if($request->hasFile('dokumentasi')){
                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $dokum_path = $itemDokumentasi->store('dokumentasi_umkm', 'public');

                    DB::table('dokumentasi_umkm')->insert([
                        'id_umkm' => $idUMKM,
                        'gambar' => $dokum_path
                    ]);
                }
            }

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.umkm');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createPekerjaan(Request $request){
        try{
            $request->validate([
                'pekerjaan' => 'required|string'
            ]);

            DB::table('pekerjaan')->insert([
                'pekerjaan' => $request->pekerjaan
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.penduduk');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createJenisKegiatan(Request $request){
        try{
            $request->validate([
                'jenis_kegiatan' => 'required|string'
            ]);

            DB::table('jenis_kegiatan')->insert([
                'nama_jenis_kegiatan' => $request->jenis_kegiatan
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.kegiatan');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createJenisUMKM(Request $request){
        try{
            $request->validate([
                'jenis_umkm' => 'required|string',
                'gambar_jenis_umkm' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_jenis_umkm')){
                $imagePath = $request->file('gambar_jenis_umkm')->store('jenis_umkm', 'public');
            }

            DB::table('jenis_umkm')->insert([
                'jenis_umkm' => $request->jenis_umkm,
                'gambar_jenis_umkm' => $imagePath
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.umkm');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createPaket(Request $request){
        try{
            $request->validate([
                'nama_paket' => 'required|string',
                'tentang_paket' => 'required|string',
                'wisata' => 'required|integer',
                'no_whatsapp' => 'required|string',
                'fasilitas_umum' => 'required|string',
                'fasilitas_hiburan' => 'required|string',
                'fasilitas_kenyamanan' => 'required|string',
                'fasilitas_keamanan' => 'required|string',
                'kuliner_belanja' => 'required|string',
                'aksesibilitas' => 'required|string',
                'gambar_paket' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'galeri_aktivitas.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'nama_aktivitas.*' => 'required|string|max:255',
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_paket')){
                $imagePath = $request->file('gambar_paket')->store('paket_wisata', 'public');
            }

            $idPaket = DB::table('paket_wisata')->insertGetId([
                'nama_paket' => $request->nama_paket,
                'tentang_paket' => $request->tentang_paket,
                'id_wisata' => $request->wisata,
                'fasilitas_umum' => $request->fasilitas_umum,
                'fasilitas_hiburan' => $request->fasilitas_hiburan,
                'fasilitas_kenyamanan' => $request->fasilitas_kenyamanan,
                'fasilitas_keamanan' => $request->fasilitas_keamanan,
                'kuliner_belanja' => $request->kuliner_belanja,
                'aksesibilitas' => $request->aksesibilitas,
                'gambar_paket' => $imagePath,
                'no_whatsapp' -> $request->no_whatsapp
            ]);

            if($request->hasFile('dokumentasi')){
                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $dokum_path = $itemDokumentasi->store('dokumentasi_paket', 'public');

                    DB::table('dokumentasi_paket')->insert([
                        'id_paket' => $idPaket,
                        'gambar' => $dokum_path
                    ]);
                }
            }

            if ($request->hasFile('galeri_aktivitas')) {
                foreach ($request->file('galeri_aktivitas') as $index => $file) {
                    $galeriPath = $file->store('galeri_aktivitas', 'public');

                    DB::table('galeri_aktivitas')->insert([
                        'id_paket' => $idPaket,
                        'gambar_aktivitas' => $galeriPath,
                        'nama_aktivitas' => $request->nama_aktivitas[$index],
                    ]);
                }
            }

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.paketWisata');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createPenginapan(Request $request){
        try{
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'nama_penginapan' => 'required|string',
                'nama_paket' => 'required|integer',
                'estimasi_jarak' => 'required|string',
                'harga_per_malam' => 'required|string',
                'keterangan' => 'required|string',
                'fasilitas' => 'required|string',
                'no_whatsapp' => 'required|string',
                'gambar_penginapan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagePath = null;
            if($request->hasFile('gambar_penginapan')){
                $imagePath = $request->file('gambar_penginapan')->store('penginapan', 'public');
            }

            DB::table('penginapan')->insert([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'nama_penginapan' => $request->nama_penginapan,
                'id_paket' => $request->nama_paket,
                'estimasi_jarak' => $request->estimasi_jarak,
                'harga_per_malam' => $request->harga_per_malam,
                'keterangan' => $request->keterangan,
                'fasilitas' => $request->fasilitas,
                'no_whatsapp' => $request->no_whatsapp,
                'gambar_penginapan' => $imagePath
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.penginapan');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function createAboutUs(Request $request){
        try{
            $request->validate([
                'visi' => 'required|string',
                'misi' => 'required|string',
                'gambar_about' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'bagan_organisasi' => 'required|image|mimes:jpeg,png,jpg|max:2048' 
            ]);

            $aboutPath = null;
            if($request->hasFile('gambar_about')){
                $aboutPath = $request->file('gambar_about')->store('profil_wilayah', 'public');
            }

            $baganPath = null;
            if($request->hasFile('bagan_organisasi')){
                $baganPath = $request->file('bagan_organisasi')->store('profil_wilayah', 'public');
            }

            DB::table('about_us')->insert([
                'visi' => $request->visi,
                'misi' => $request->misi,
                'gambar_about' => $aboutPath,
                'bagan_organisasi' => $baganPath,
                'id_wilayah' => 13
            ]);

            Session::flash('message', 'Data Berhasil Ditambahkan!');
            return redirect()->route('admin.profilWilayah');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }



    //Data Update
    public function updateDataPenduduk(Request $request, $id){
        try{
            $request->validate([
                'nik' => 'string',
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

                'no_kk' => 'required|string',
                'hub_keluarga' => 'required|integer',
                'nik_ayah' => 'required|string',
                'nama_ayah' => 'required|string',
                'nik_ibu' => 'required|string',
                'nama_ibu' => 'required|string',

                'status_wn' => 'required|string',
                'no_paspor' => 'required_if:status_wn,WNA|nullable|string',
                'tanggal_paspor' => 'required_if:status_wn,WNA|nullable|date',
                'no_kitas_kitap' => 'required_if:status_wn,WNA|string',
                'negara_asal' => 'required_if:status_wn,WNA|nullable|string',

                'status_kawin' => 'required|integer',
                'no_akta_nikah' => 'required_if:status_kawin,2|nullable|string',
                'tanggal_nikah' => 'required_if:status_kawin,2|nullable|date',
                'tanggal_cerai' => 'required_if:status_kawin,3,4|nullable|date',

                'golongan_darah' => 'required|string',
                'riwayat_penyakit' => 'nullable|string',
                'asuransi_kesehatan' => 'nullable|string',
                'no_asuransi' => 'nullable|string',
                'no_bpjs_naker' => 'nullable|string'
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
                'updated_at' => Carbon::now('Asia/Jakarta'),
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
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateKegiatan(Request $request, $id){
        try{
            $request->validate([
                'nama_kegiatan' => 'required|string|max:255',
                'jenis_kegiatan' => 'required|integer', //Sama dengan option name
                'nama_wilayah' => 'required|integer', 
                'keterangan' => 'required|string',
                'gambar_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'tanggal_kegiatan' => 'nullable|date|before_or_equal:today',
                'dokumentasi.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi_baru.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'hapus_dokumentasi.*' => 'nullable|integer'
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
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_kegiatan')) {
                if ($kegiatan->gambar_kegiatan) {
                    Storage::disk('public')->delete($kegiatan->gambar_kegiatan);
                }

                $imagePath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
                $updateData['gambar_kegiatan'] = $imagePath;
            }

            DB::table('kegiatan')->where('id_kegiatan', $id)->update($updateData);

            if($request->hasFile('dokumentasi')){
                $gambarLama = DB::table('dokumentasi_kegiatan')->where('id_kegiatan', $id)->get();
                foreach($gambarLama as $itemGambarLama){
                    if($itemGambarLama){
                    Storage::disk('public')->delete($itemGambarLama->gambar);
                    }
                }

                DB::table('dokumentasi_kegiatan')->where('id_kegiatan', $id)->delete();

                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $path_dokum = $itemDokumentasi->store('dokumentasi_kegiatan', 'public');

                    DB::table('dokumentasi_kegiatan')->insert([
                        'id_kegiatan' => $id,
                        'gambar' => $path_dokum
                    ]);
                }
            }

            if ($request->hasFile('dokumentasi_baru')) {
                foreach ($request->file('dokumentasi_baru') as $file) {
                    $galeriPath = $file->store('dokumentasi_kegiatan', 'public');

                    DB::table('dokumentasi_kegiatan')->insert([
                        'id_kegiatan' => $id,
                        'gambar' => $galeriPath,
                    ]);
                }
            }

            if ($request->filled('hapus_dokumentasi')) {
                foreach ($request->hapus_dokumentasi as $idDok) {
                    $dok = DB::table('dokumentasi_kegiatan')->where('id', $idDok)->first();
                    if ($dok && $dok->gambar) {
                        Storage::disk('public')->delete($dok->gambar);
                    }
                    DB::table('dokumentasi_kegiatan')->where('id', $idDok)->delete();
                }
            }


            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.kegiatan')->with('success', 'Data berhasil diperbarui.');

        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateAboutUs(Request $request){
        try{
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
                'updated_at' => Carbon::now('Asia/Jakarta'),
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
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateProfil(Request $request, $id){
        try{
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
                'updated_at' => Carbon::now('Asia/Jakarta'),
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
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function updatePerangkat(Request $request, $id){
        try{
            $request->validate([
                'nama' => 'required|string',
                'jabatan' => 'required|string',
                'link_facebook' => 'nullable|string',
                'link_instagram' => 'nullable|string',
                'link_tiktok' => 'nullable|string',
                'nama_wilayah' => 'required|integer',
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
                'id_wilayah' => $request->nama_wilayah,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
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
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateBerita(Request $request, $id){
        try{
            $request -> validate([
                'judul_berita' => 'required|string',
                'penulis_berita' => 'required|string',
                'tanggal_berita' => 'required|date',
                'nama_wilayah'=> 'required|integer',
                'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'add_konten_berita' => 'required|string'
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
                'konten_berita' => $request->add_konten_berita,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_berita')) {
                if ($berita->gambar_berita) {
                    Storage::disk('public')->delete($berita->gambar_berita);
                }

                $imagePath = $request->file('gambar_berita')->store('berita', 'public');
                $updateData['berita'] = $imagePath;
            }

            DB::table('berita')->where('id_berita', $id)->update($updateData);

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.berita')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateWisata(Request $request, $id){
        try{
            $request->validate([
                'nama_tempat' => 'required|string|max:255',
                'nama_wilayah' => 'required|integer', 
                'keterangan' => 'required|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'gambar_wisata' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_depan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_kanan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_belakang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_kiri' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_atas' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_bawah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
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
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_wisata')) {
                if ($wisata->gambar_wisata) {
                    Storage::disk('public')->delete($wisata->gambar_wisata);
                }

                $imagePath = $request->file('gambar_wisata')->store('wisata', 'public');
                $updateData['gambar_wisata'] = $imagePath;
            }

            DB::table('wisata')->where('id_wisata', $id)->update($updateData);

            $gambarData = [];

            foreach (['depan', 'kanan', 'belakang', 'kiri', 'atas', 'bawah'] as $arah) {
                $fieldName = "gambar_$arah";
                if ($request->hasFile($fieldName)) {
                    $gambarData[$fieldName] = $request->file($fieldName)->store("wisata_vr", 'public');
                }
            }

            if (!empty($gambarData)) {        
                $exists = DB::table('wisata_vr')->where('id_wisata', $id)->exists();
                if ($exists) {
                    DB::table('wisata_vr')->where('id_wisata', $id)->update($gambarData);
                } else {
                    $gambarData['id_wisata'] = $id;
                    DB::table('wisata_vr')->insert($gambarData);
                }
            }


            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.wisata')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateUMKM(Request $request, $id){
        try{
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'nama_umkm' => 'required|string|max:255',
                'nama_wilayah' => 'required|integer',
                'alamat' => 'required|string',
                'jenis_umkm'=> 'required|integer', 
                'keterangan' => 'required|string',
                'gambar_umkm' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'dokumentasi_baru.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'hapus_dokumentasi.*' => 'nullable|integer'
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
                'alamat' => $request->alamat,
                'id_jenis_umkm' => $request->jenis_umkm,
                'keterangan' => $request->keterangan,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_umkm')) {
                if ($umkm->gambar_umkm) {
                    Storage::disk('public')->delete($umkm->gambar_umkm);
                }

                $imagePath = $request->file('gambar_umkm')->store('umkm', 'public');
                $updateData['gambar_umkm'] = $imagePath;
            }

            DB::table('umkm')->where('id_umkm', $id)->update($updateData);

            if($request->hasFile('dokumentasi')){
                $gambarLama = DB::table('dokumentasi_umkm')->where('id_umkm', $id)->get();
                foreach($gambarLama as $itemGambarLama){
                    if($itemGambarLama){
                    Storage::disk('public')->delete($itemGambarLama->gambar);
                    }
                }

                DB::table('dokumentasi_umkm')->where('id_umkm', $id)->delete();

                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $path_dokum = $itemDokumentasi->store('dokumentasi_umkm', 'public');

                    DB::table('dokumentasi_umkm')->insert([
                        'id_umkm' => $id,
                        'gambar' => $path_dokum
                    ]);
                }
            }

            if ($request->hasFile('dokumentasi_baru')) {
                foreach ($request->file('dokumentasi_baru') as $file) {
                    $galeriPath = $file->store('dokumentasi_umkm', 'public');

                    DB::table('dokumentasi_umkm')->insert([
                        'id_umkm' => $id,
                        'gambar' => $galeriPath,
                    ]);
                }
            }

            if ($request->filled('hapus_dokumentasi')) {
                foreach ($request->hapus_dokumentasi as $idDok) {
                    $dok = DB::table('dokumentasi_umkm')->where('id', $idDok)->first();
                    if ($dok && $dok->gambar) {
                        Storage::disk('public')->delete($dok->gambar);
                    }
                    DB::table('dokumentasi_umkm')->where('id', $idDok)->delete();
                }
            }

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.umkm')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateJenisKegiatan(Request $request, $id){
        try{
            $request->validate([
                'nama_jenis_kegiatan' => 'required|string'
            ]);

            $jenis_kegiatan = DB::table('jenis_kegiatan')
                ->where('id_jenis_kegiatan', $id)
                ->first();

            if(!$jenis_kegiatan){
                return redirect()->route('admin.kegiatan')->with('error', 'Data tidak ditemukan');
            }

            DB::table('jenis_kegiatan')->where('id_jenis_kegiatan', $id)->update(['nama_jenis_kegiatan' => $request->nama_jenis_kegiatan]);

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.kegiatan')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updatePekerjaan(Request $request, $id){
        try{
            $request->validate([
                'pekerjaan' => 'required|string'
            ]);

            $pekerjaan = DB::table('pekerjaan')
                ->where('id_pekerjaan', $id)
                ->first();

            if(!$pekerjaan){
                return redirect()->route('admin.penduduk')->with('error', 'Data tidak ditemukan');
            }

            DB::table('pekerjaan')->where('id_pekerjaan', $id)->update(['pekerjaan' => $request->pekerjaan]);

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.penduduk')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateJenisUMKM(Request $request, $id){
        try{
            $request->validate([
                'jenis_umkm' => 'required|string',
                'gambar_jenis_umkm' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $updateData = [
                'jenis_umkm' => $request->jenis_umkm
            ];

            $jenis_umkm = DB::table('jenis_umkm')
                ->where('id_jenis_umkm', $id)
                ->first();


            if(!$jenis_umkm){
                return redirect()->route('admin.umkm')->with('error', 'Data Tidak Ditemukan');
            }

            if ($request->hasFile('gambar_jenis_umkm')) {
                if ($jenis_umkm->gambar_jenis_umkm) {
                    Storage::disk('public')->delete($jenis_umkm->gambar_jenis_umkm);
                }

                $imagePath = $request->file('gambar_jenis_umkm')->store('jenis_umkm', 'public');
                $updateData['gambar_jenis_umkm'] = $imagePath;
            }   

            DB::table('jenis_umkm')->where('id_jenis_umkm', $id)->update($updateData);

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.umkm')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updatePaket(Request $request, $id){
        try{
            $request->validate([
                'nama_paket' => 'required|string',
                'tentang_paket' => 'required|string',
                'wisata' => 'required|integer',
                'no_whatsapp' => 'required|string',
                'fasilitas_umum' => 'required|string',
                'fasilitas_hiburan' => 'required|string',
                'fasilitas_kenyamanan' => 'required|string',
                'fasilitas_keamanan' => 'required|string',
                'kuliner_belanja' => 'required|string',
                'aksesibilitas' => 'required|string',
                'gambar_paket' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'galeri_aktivitas.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'nama_aktivitas.*' => 'nullable|string',
                'galeri_baru.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'nama_baru.*' => 'nullable|string',
                'hapus_dokumentasi.*' => 'nullable|integer',
                'hapus_galeri.*' => 'nullable|integer'
            ]);

            $updateData = [
                'nama_paket' => $request->nama_paket,
                'tentang_paket' => $request->tentang_paket,
                'id_wisata' => $request->wisata,
                'fasilitas_umum' => $request->fasilitas_umum,
                'fasilitas_hiburan' => $request->fasilitas_hiburan,
                'fasilitas_kenyamanan' => $request->fasilitas_kenyamanan,
                'fasilitas_keamanan' => $request->fasilitas_keamanan,
                'kuliner_belanja' => $request->kuliner_belanja,
                'aksesibilitas' => $request->aksesibilitas,
                'no_whatsapp' => $request->no_whatsapp,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            $paket_wisata = DB::table('paket_wisata')
                ->where('id_paket', $id)
                ->first();


            if(!$paket_wisata){
                return redirect()->route('admin.paketWisata')->with('error', 'Data Tidak Ditemukan');
            }

            if ($request->hasFile('gambar_paket')) {
                if ($paket_wisata->gambar_paket) {
                    Storage::disk('public')->delete($paket_wisata->gambar_paket);
                }

                $imagePath = $request->file('gambar_paket')->store('paket_wisata', 'public');
                $updateData['gambar_paket'] = $imagePath;
            }   

            DB::table('paket_wisata')->where('id_paket', $id)->update($updateData);


            if($request->hasFile('dokumentasi')){
                $gambarLama = DB::table('dokumentasi_paket')->where('id_paket', $id)->get();
                foreach($gambarLama as $itemGambarLama){
                    if($itemGambarLama){
                    Storage::disk('public')->delete($itemGambarLama->gambar);
                    }
                }

                DB::table('dokumentasi_paket')->where('id_paket', $id)->delete();

                foreach($request->file('dokumentasi') as $itemDokumentasi){
                    $path_dokum = $itemDokumentasi->store('dokumentasi_paket', 'public');

                    DB::table('dokumentasi_paket')->insert([
                        'id_paket' => $id,
                        'gambar' => $path_dokum
                    ]);
                }
            }


            if($request->hasFile('galeri_aktivitas')){
                $gambarLama = DB::table('galeri_aktivitas')->where('id_paket', $id)->get();
                foreach($gambarLama as $itemGambarLama){
                    if($itemGambarLama){
                    Storage::disk('public')->delete($itemGambarLama->gambar_aktivitas);
                    }
                }

                DB::table('galeri_aktivitas')->where('id_paket', $id)->delete();

                foreach($request->file('galeri_aktivitas') as $index => $itemDokumentasi){
                    $path_dokum = $itemDokumentasi->store('galeri_aktivitas', 'public');

                    DB::table('galeri_aktivitas')->insert([
                        'id_paket' => $id,
                        'nama_aktivitas' => $request->nama_aktivitas[$index],
                        'gambar_aktivitas' => $path_dokum
                    ]);
                }
            }

            if ($request->hasFile('galeri_baru')) {
                foreach ($request->file('galeri_baru') as $index => $file) {
                    $galeriPath = $file->store('galeri_aktivitas', 'public');

                    DB::table('galeri_aktivitas')->insert([
                        'id_paket' => $id,
                        'gambar_aktivitas' => $galeriPath,
                        'nama_aktivitas' => $request->nama_baru[$index],
                    ]);
                }
            }

            if ($request->filled('hapus_dokumentasi')) {
                foreach ($request->hapus_dokumentasi as $idDok) {
                    $dok = DB::table('dokumentasi_paket')->where('id', $idDok)->first();
                    if ($dok && $dok->gambar) {
                        Storage::disk('public')->delete($dok->gambar);
                    }
                    DB::table('dokumentasi_paket')->where('id', $idDok)->delete();
                }
            }

            if ($request->filled('hapus_galeri')) {
                foreach ($request->hapus_galeri as $idDok) {
                    $dok = DB::table('galeri_aktivitas')->where('id', $idDok)->first();
                    if ($dok && $dok->gambar_aktivitas) {
                        Storage::disk('public')->delete($dok->gambar_aktivitas);
                    }
                    DB::table('galeri_aktivitas')->where('id', $idDok)->delete();
                }
            }


            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.paketWisata')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updatePenginapan(Request $request, $id){
        try{
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'nama_penginapan' => 'required|string',
                'nama_paket' => 'required|integer',
                'estimasi_jarak' => 'required|string',
                'harga_per_malam' => 'required|string',
                'keterangan' => 'required|string',
                'fasilitas' => 'required|string',
                'no_whatsapp' => 'required|string',
                'gambar_penginapan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $penginapan = DB::table('penginapan')
                ->where('penginapan.id_penginapan', $id)
                ->first();

            if(!$penginapan){
                return redirect()->route('admin.penginapan')->with('error', 'Data tidak ditemukan.');
            }

            $updateData = [
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'nama_penginapan' => $request->nama_penginapan,
                'id_paket' => $request->nama_paket,
                'estimasi_jarak' => $request->estimasi_jarak,
                'harga_per_malam' => $request->harga_per_malam,
                'keterangan' => $request->keterangan,
                'fasilitas' => $request->fasilitas,
                'no_whatsapp' => $request->no_whatsapp,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_penginapan')) {
                if ($penginapan->gambar_penginapan) {
                    Storage::disk('public')->delete($penginapan->gambar_penginapan);
                }

                $imagePath = $request->file('gambar_penginapan')->store('penginapan', 'public');
                $updateData['penginapan'] = $imagePath;
            }

            DB::table('penginapan')->where('id_penginapan', $id)->update($updateData);

            Session::flash('message', 'Data Berhasil Diupdate!');
            return redirect()->route('admin.penginapan')->with('success', 'Data berhasil diperbarui.');
        }catch (Exception $e){
            Session::flash('error', 'Gagal menambahkan data: ' . $e->getMessage());
            return redirect()->back();
        }
    }



    //Delete Data
    public function deleteKegiatan($id){
        try{
            $kegiatan = DB::table('kegiatan')
                ->where('id_kegiatan', $id)
                ->first();

            $dokum_kegiatan = DB::table('dokumentasi_kegiatan')
                ->where('id_kegiatan', $id)
                ->get();
            
            foreach($dokum_kegiatan as $itemDokum){
                Storage::disk('public')->delete($itemDokum->gambar);
            }

            DB::table('dokumentasi_kegiatan')->where('id_kegiatan', $id)->delete();

            DB::table('kegiatan')->where('id_kegiatan', $id)->delete();
            Storage::disk('public')->delete($kegiatan->gambar_kegiatan);

            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.kegiatan');

        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel kegiatan.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.kegiatan');
        }
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
        try{
            $perangkat = DB::table('perangkat_kecamatan')
                ->where('id_perangkat', $id)
                ->first();

            DB::table('perangkat_kecamatan')->where('id_perangkat', $id)->delete();
            Storage::disk('public')->delete($perangkat->gambar_perangkat);

            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.profilWilayah');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel profil wilayah.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.profilWilayah');
        }
    }

    public function deleteBerita($id){
        try{
            $berita = DB::table('berita')
                ->where('id_berita', $id)
                ->first();

            DB::table('berita')
                ->where('id_berita', $id)
                ->delete();
            Storage::disk('public')->delete($berita->gambar_berita);

            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.berita');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel berita.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.berita');
        }
    }

    public function deleteWisata($id){
        try{
            $wisata = DB::table('wisata')
                ->where('id_wisata', $id)
                ->first();
            
            $wisata_vr = DB::table('wisata_vr')
                ->where('id_wisata', $id)
                ->first();

            DB::table('wisata_vr')->where('id_wisata', $id)->delete();
            Storage::disk('public')->delete($wisata_vr->gambar_depan);
            Storage::disk('public')->delete($wisata_vr->gambar_belakang);
            Storage::disk('public')->delete($wisata_vr->gambar_kiri);
            Storage::disk('public')->delete($wisata_vr->gambar_kanan);
            Storage::disk('public')->delete($wisata_vr->gambar_atas);
            Storage::disk('public')->delete($wisata_vr->gambar_bawah);

            DB::table('wisata')->where('id_wisata', $id)->delete();
            Storage::disk('public')->delete($wisata->gambar_wisata);


            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.wisata');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel wisata.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.wisata');
        }
    }

    public function deleteUMKM($id){
        try{
            $umkm = DB::table('umkm')
                ->where('id_umkm', $id)
                ->first();

            DB::table('umkm')->where('id_umkm', $id)->delete();
            Storage::disk('public')->delete($umkm->gambar_umkm);

            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.umkm');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel UMKM.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.umkm');
        }
    }

    public function deleteJenisKegiatan($id){
        try {
            DB::table('jenis_kegiatan')->where('id_jenis_kegiatan', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.kegiatan');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel kegiatan.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.kegiatan');
        }
    }

    public function deletePekerjaan($id){
        try {
            DB::table('pekerjaan')->where('id_pekerjaan', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.penduduk');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel penduduk.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.penduduk');
        }
    }

    public function deleteJenisUMKM($id){
        try {
            DB::table('jenis_umkm')->where('id_jenis_umkm', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.umkm');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel UMKM.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.umkm');
        }
    }

    public function deletePaket($id){
        try {
            DB::table('paket_wisata')->where('id_paket', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.paketWisata');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel lainnya.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.paket_wisata');
        }
    }

    public function deletePenginapan($id){
        try {
            DB::table('penginapan')->where('id_penginapan', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.penginapan');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel lainnya.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.penginapan');
        }
    }

    public function deletePenduduk($id){
        try {
            DB::table('penduduk')->where('id_penduduk', $id)->delete();
            
            Session::flash('message', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.penduduk');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Session::flash('error', 'Tidak dapat menghapus, data masih digunakan di tabel lainnya.');
            } else {
                Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            return redirect()->route('admin.penduduk');
        }
    }

    public function deleteAdminLog(){
        try {
            $today = Carbon::today()->toDateString();

            DB::table('user_log')
                ->whereDate('time', '!=', $today)
                ->delete();

            return redirect()->route('admin.adminLog');
        } catch (Exception $e) {
            Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());

            return redirect()->route('admin.adminLog');
            }
        }



    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $import = new PendudukImport;

        try {
            Excel::import($import, $request->file('file'));
            Session::flash('message', 'Data Berhasil Dimasukkan!');
            return redirect()->route('admin.penduduk');
        } catch (Exception $e) {
            Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('admin.penduduk');

    }


}