<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function about(){
        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();
        
        $about_us = DB::table('about_us')
            ->join('wilayah', 'about_us.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('about_us.id_about', 'about_us.id_wilayah', 'about_us.visi', 'about_us.misi', 'about_us.gambar_about', 'about_us.bagan_organisasi', 'wilayah.nama_wilayah')
            ->first();
        
        $camat = DB::table('perangkat_kecamatan')
            ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat')
            ->where('perangkat_kecamatan.jabatan', 'LIKE', 'Camat%')
            ->get();
        
        $sekretaris = DB::table('perangkat_kecamatan')
            ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat')
            ->where('perangkat_kecamatan.jabatan', 'LIKE', 'Sekretaris%')
            ->get();

        $kasi = DB::table('perangkat_kecamatan')
            ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat')
            ->where('perangkat_kecamatan.jabatan', 'LIKE', '%Seksi%')
            ->get();

        $kepala_desa = DB::table('perangkat_kecamatan')
            ->select('perangkat_kecamatan.id_perangkat', 'perangkat_kecamatan.nama', 'perangkat_kecamatan.jabatan', 'perangkat_kecamatan.link_facebook', 'perangkat_kecamatan.link_instagram', 'perangkat_kecamatan.link_tiktok', 'perangkat_kecamatan.gambar_perangkat')
            ->where('perangkat_kecamatan.jabatan', 'LIKE', 'Kepala Desa%')
            ->get();
            
        $wilayahkecamatan = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah')
            ->where('wilayah.nama_wilayah', 'Kecamatan Tigaraksa')
            ->first();

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

        return view('public.about', compact('wilayah', 'wilayahNoKec', 'about_us', 'camat', 'sekretaris', 'kasi', 'kepala_desa', 'wilayahkecamatan', 'jenis_kelamin_per_wilayah', 'rasio_jenis_kelamin'));
    }

    public function berita(){
        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $berita = DB::table('berita')
            ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah')
            ->paginate(6);

        return view('public.berita', compact('wilayah', 'berita', 'wilayahNoKec'));
    }

    public function detailberita($id){
        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah',  'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $berita = DB::table('berita')
            ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah')
            ->where('berita.id_berita', '=', $id)
            ->first();

        if(!$berita){
            abort(404);
        }

        $beritaterbaru = DB::table('berita')
            ->join('wilayah', 'berita.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah', 'wilayah.nama_wilayah')
            ->orderBy('berita.id_berita', 'desc')
            ->limit(5)
            ->get();
        
        return view('public.detailberita', compact('wilayah', 'berita', 'beritaterbaru', 'wilayahNoKec'));
    }

    public function infografis(){
        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $jumlah_penduduk = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->whereIn('wilayah.jenis_wilayah', ['Desa', 'Kelurahan'])
            ->select('wilayah.nama_wilayah', DB::raw('COUNT(id_penduduk) as jumlah_penduduk'))
            ->groupBy('wilayah.nama_wilayah')
            ->get();

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

        $jumlah_penduduk = $jumlah_penduduk->sortByDesc('jumlah_penduduk')->values();
        $pekerjaan = $pekerjaan->sortByDesc('jumlah_pekerja')->values();
        $agama = $agama->sortByDesc('jumlah_penganut')->values();
        $pendidikan = $pendidikan->sortByDesc('jumlah_peserta_didik')->values();

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

        return view('public.infografis', compact('wilayah', 'wilayahNoKec', 'kelompok_umur_per_wilayah', 'jenis_kelamin_per_wilayah', 'rasio_jenis_kelamin', 'jumlah_penduduk', 'pekerjaan', 'agama', 'pendidikan'));
    }

    public function maps(){
        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah', 'wilayah.longitude', 'wilayah.latitude')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $lokasi_wilayah = DB::table('wilayah')
            ->select(['id_wilayah', 'nama_wilayah', 'latitude', 'longitude', 'jenis_wilayah'])
            ->where('jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        return view('public.maps', compact('wilayah', 'wilayahNoKec', 'lokasi_wilayah'));
    }

    public function profilDesa($id){
        $wilayahItem = DB::table('wilayah')
            ->where('id_wilayah', $id)
            ->first();

        if (!$wilayahItem) {
            abort(404);
        }

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.jenis_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->get();
    
        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah', 'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $wilayaheach = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.jenis_wilayah', 'wilayah.luas_wilayah','wilayah.batas_utara', 'wilayah.batas_timur','wilayah.batas_barat', 'wilayah.batas_selatan', 'wilayah.gambar_wilayah')
            ->where('wilayah.id_wilayah', $id)
            ->get();

        $kegiatanterbaru = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
            ->select('kegiatan.*', 'jenis_kegiatan.*')
            ->where('kegiatan.id_wilayah', $id)
            ->orderBy('id_kegiatan', 'desc')
            ->first();

        $kegiatan = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan', '=', 'jenis_kegiatan.id_jenis_kegiatan')
            ->select('kegiatan.id_kegiatan', 'kegiatan.nama_kegiatan', 'kegiatan.id_jenis_kegiatan', 'kegiatan.keterangan', 'kegiatan.gambar_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->where('kegiatan.id_wilayah', $id)
            ->orderBy('id_kegiatan', 'desc')
            ->get();

        $jenis_kegiatan = DB::table('jenis_kegiatan')
            ->select('jenis_kegiatan.id_jenis_kegiatan', 'jenis_kegiatan.nama_jenis_kegiatan')
            ->get();

        $wisata = DB::table('wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('wisata.id_wisata', 'wisata.id_wilayah','wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.keterangan', 'wisata.gambar_wisata', 'wisata.latitude', 'wisata.longitude')
            ->where('wisata.id_wilayah', $id)
            ->get();

        $jumlah_penduduk = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('wilayah.nama_wilayah', DB::raw('COUNT(id_penduduk) as jumlah_penduduk'))
            ->where('wilayah.id_wilayah', $id)
            ->groupBy('wilayah.nama_wilayah')
            ->first();

        $jenis_kelamin_per_wilayah = DB::table('penduduk')
            ->join('wilayah', 'penduduk.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select([
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) as laki_laki"),
                DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan"),
            ])
            ->where('penduduk.id_wilayah', $id)
            ->first();

        $rasio_jenis_kelamin = [
            'Laki-Laki' => $jenis_kelamin_per_wilayah->laki_laki,
            'Perempuan' => $jenis_kelamin_per_wilayah->perempuan,
        ];

        $pekerjaan = DB::table('penduduk')
            ->join('pekerjaan', 'penduduk.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
            ->select('pekerjaan.pekerjaan', DB::raw('COUNT(penduduk.id_pekerjaan) as jumlah_pekerja'))
            ->where('penduduk.id_wilayah', $id)
            ->groupBy('pekerjaan.pekerjaan')
            ->get();

        $agama = DB::table('penduduk')
            ->join('agama', 'penduduk.id_agama', '=', 'agama.id_agama')
            ->select('agama.agama', DB::raw('COUNT(penduduk.id_agama) as jumlah_penganut'))
            ->where('penduduk.id_wilayah', $id)
            ->groupBy('agama.agama')
            ->get();

        $pendidikan = DB::table('penduduk')
            ->join('pendidikan', 'penduduk.id_pendidikan', 'pendidikan.id_pendidikan')
            ->select('pendidikan.tingkat_pendidikan', DB::raw('COUNT(penduduk.id_pendidikan) as jumlah_peserta_didik'))
            ->where('penduduk.id_wilayah', $id)
            ->groupBy('pendidikan.tingkat_pendidikan')
            ->get();

        $pekerjaan = $pekerjaan->sortByDesc('jumlah_pekerja')->values();
        $agama = $agama->sortByDesc('jumlah_penganut')->values();
        $pendidikan = $pendidikan->sortByDesc('jumlah_peserta_didik')->values();
            
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
            ->where('penduduk.id_wilayah', $id)
            ->groupBy('kelompok_umur')
            ->get();

        $berita = DB::table('berita')
            ->select('berita.id_berita', 'berita.judul_berita', 'berita.konten_berita', 'berita.gambar_berita', 'berita.penulis_berita', 'berita.tanggal_berita', 'berita.id_wilayah')
            ->where('berita.id_wilayah', $id)
            ->orderBy('id_berita', 'desc')
            ->limit(3)
            ->get();

        $umkm = DB::table('umkm')
            ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
            ->select('umkm.*', 'wilayah.nama_wilayah', 'jenis_umkm.jenis_umkm')
            ->where('umkm.id_wilayah', $id)
            ->get();

        $jenis_umkm = DB::table('jenis_umkm')
            ->get();

        $dokum_kegiatan = DB::table('dokumentasi_kegiatan')
            ->get();

        $jumlah_dokum = DB::table('dokumentasi_kegiatan')
            ->select('id_kegiatan', DB::raw('COUNT(gambar) as jumlah_gambar'))
            ->groupBy('id_kegiatan')
            ->get();
            
        return view('public.profildesa', compact('wilayah', 'wilayaheach', 'wilayahNoKec', 'kelompok_umur_per_wilayah', 'jenis_kelamin_per_wilayah', 'pekerjaan', 'agama', 'pendidikan', 'rasio_jenis_kelamin', 'wisata', 'kegiatanterbaru', 'kegiatan', 'jenis_kegiatan', 'berita', 'umkm', 'jenis_umkm', 'jumlah_penduduk', 'dokum_kegiatan', 'jumlah_dokum', 'wilayahItem'));
    }

    public function wisata($id_wilayah, $id_wisata){
        $wisata = DB::table('wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.keterangan', 'wisata.gambar_wisata', 'wisata.latitude', 'wisata.longitude')
            ->where('wilayah.id_wilayah', $id_wilayah)
            ->where('wisata.id_wisata', $id_wisata)
            ->first();

        if(!$wisata){
            abort(404);
        }

        $wisata_vr = DB::table('wisata_vr')
            ->join('wisata', 'wisata_vr.id_wisata', '=', 'wisata.id_wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('wilayah.nama_wilayah', 'wisata.id_wisata', 'wisata.id_wilayah', 'wisata_vr.gambar_depan', 'wisata_vr.gambar_kanan', 'wisata_vr.gambar_belakang', 'wisata_vr.gambar_kiri', 'wisata_vr.gambar_atas', 'wisata_vr.gambar_bawah', 'wisata.nama_tempat')
            ->where('wilayah.id_wilayah', $id_wilayah)
            ->where('wisata.id_wisata', $id_wisata)
            ->first();

         $paket_wisata = DB::table('paket_wisata')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->join('wilayah', 'wisata.id_wilayah', 'wilayah.id_wilayah')
            ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.latitude', 'wisata.longitude', 'wisata.keterangan', 'wisata.nama_tempat', 'paket_wisata.nama_paket', 'paket_wisata.fasilitas_umum', 'paket_wisata.fasilitas_hiburan', 'paket_wisata.fasilitas_kenyamanan', 'paket_wisata.fasilitas_keamanan', 'paket_wisata.kuliner_belanja', 'paket_wisata.aksesibilitas', 'paket_wisata.gambar_paket', 'paket_wisata.id_paket')
            ->where('wilayah.id_wilayah', $id_wilayah)
            ->where('wisata.id_wisata', $id_wisata)
            ->get();
                    
        return view('public.wisata', compact('wisata', 'wisata_vr', 'paket_wisata'));
    }

    public function rute($id){
        $wisata = DB::table('wisata')
            ->join('wilayah', 'wisata.id_wilayah', '=', 'wilayah.id_wilayah')
            ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.latitude', 'wisata.longitude', 'wisata.keterangan', 'wisata.nama_tempat')
            ->where('wisata.id_wisata', $id)
            ->first();

        if(!$wisata){
            abort(404);
        }
        
        return view('public.rute', compact('wisata'));
    }

    public function paketWisata($id_wilayah, $id_wisata, $id_paket){
        $paket_wisata = DB::table('paket_wisata')
            ->join('wisata', 'paket_wisata.id_wisata', '=', 'wisata.id_wisata')
            ->join('wilayah', 'wisata.id_wilayah', 'wilayah.id_wilayah')
            ->select('wisata.id_wisata', 'wisata.id_wilayah', 'wilayah.nama_wilayah', 'wisata.nama_tempat', 'wisata.latitude', 'wisata.longitude', 'wisata.keterangan', 'wisata.nama_tempat', 'paket_wisata.nama_paket', 'paket_wisata.tentang_paket', 'paket_wisata.fasilitas_umum', 'paket_wisata.fasilitas_hiburan', 'paket_wisata.fasilitas_kenyamanan', 'paket_wisata.fasilitas_keamanan', 'paket_wisata.kuliner_belanja', 'paket_wisata.aksesibilitas', 'paket_wisata.gambar_paket', 'paket_wisata.no_whatsapp')
            ->where('wilayah.id_wilayah', $id_wilayah)
            ->where('wisata.id_wisata', $id_wisata)
            ->where('paket_wisata.id_paket', $id_paket)
            ->first();
        
        $galeri_aktivitas = DB::table('galeri_aktivitas')
            ->select('galeri_aktivitas.*')
            ->where('galeri_aktivitas.id_paket', $id_paket)
            ->get();

        $pilihan_paket = DB::table('pilihan_paket')
            ->select('pilihan_paket.*')
            ->where('pilihan_paket.id_paket', $id_paket)
            ->get();

        $penginapan = DB::table('penginapan')
            ->select('penginapan.*')
            ->where('penginapan.id_paket', $id_paket)
            ->get();

        $dokum_paket = DB::table('dokumentasi_paket')
            ->get();

        return view('public.paketWisata', compact('paket_wisata', 'galeri_aktivitas', 'pilihan_paket', 'penginapan', 'dokum_paket'));
    }

    public function detailumkm($id_wilayah, $id_umkm){
        $umkm = DB::table('umkm')
            ->where('id_umkm', $id_umkm)
            ->first();
    
        if (!$umkm) {
            abort(404);
        }

        $wilayah = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah')
            ->get();

        $wilayahNoKec = DB::table('wilayah')
            ->select('wilayah.id_wilayah', 'wilayah.nama_wilayah', 'wilayah.luas_wilayah',  'wilayah.gambar_wilayah')
            ->where('wilayah.jenis_wilayah', '!=', 'Kecamatan')
            ->get();

        $detailumkm = DB::table('umkm')
            ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
            ->select('umkm.*', 'wilayah.nama_wilayah', 'jenis_umkm.jenis_umkm')
            ->where('umkm.id_wilayah', $id_wilayah)
            ->where('umkm.id_umkm', $id_umkm)
            ->first();

        $umkmlain = DB::table('umkm')
            ->join('wilayah', 'umkm.id_wilayah', '=', 'wilayah.id_wilayah')
            ->join('jenis_umkm', 'umkm.id_jenis_umkm', '=', 'jenis_umkm.id_jenis_umkm')
            ->select('umkm.*', 'wilayah.nama_wilayah', 'jenis_umkm.jenis_umkm')
            ->where('umkm.id_wilayah', $id_wilayah)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $dokumentasi_umkm = DB::table('dokumentasi_umkm')
            ->where('id_umkm', $id_umkm)
            ->get();

        return view('public.detailumkm', compact('wilayah', 'wilayahNoKec', 'detailumkm', 'umkmlain', 'dokumentasi_umkm'));
    }
}
