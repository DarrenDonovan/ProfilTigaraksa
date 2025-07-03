<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PendudukImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $wilayahId = $this->getWilayahIdByNama($row['nama_wilayah']);
            $agamaId = $this->getAgamaIdByNama($row['agama']);
            $pendidikanId = $this->getPendidikanIdByNama($row['pendidikan']);
            $pekerjaanId = $this->getPekerjaanIdByNama($row['pekerjaan']);
            $hubunganId = $this->getHubunganIdByNama($row['hubungan_keluarga']);
            $statusId = $this->getStatusIdByNama($row['status_nikah']);

            try {
                $pendudukId = DB::table('penduduk')->insertGetId([
                    'nik' => trim($row['nik']),
                    'nama_lengkap' => trim($row['nama_lengkap']),
                    'jenis_kelamin' => trim($row['jenis_kelamin']),
                    'tempat_lahir' => trim($row['tempat_lahir']),
                    'tanggal_lahir' => $this->convertExcelDate($row['tanggal_lahir']),
                    'alamat' => trim($row['alamat']),
                    'suku_etnis' => trim($row['suku_etnis']),
                    'no_telepon' => trim($row['no_telepon']),
                    'email' => trim($row['email']),
                    'id_wilayah' => $wilayahId,
                    'id_agama' => $agamaId,
                    'id_pendidikan' => $pendidikanId ?? 1,
                    'id_pekerjaan' => $pekerjaanId ?? 1,
                    'tanggal_terdaftar' => now(),
                ]);

                DB::table('kelahiran_penduduk')->insert([ //aman
                    'id_penduduk' => $pendudukId,
                    'no_akta' => trim($row['no_akta_lahir']),
                    'waktu_lahir' => $this->convertExcelTime($row['waktu_lahir']),
                    'tempat_dilahirkan' => trim($row['tempat_dilahirkan']),
                    'anak_ke' => trim($row['anak_ke']),
                    'berat_lahir' => trim($row['berat_lahir']),
                    'tinggi_lahir' => trim($row['tinggi_lahir']),
                ]);

                DB::table('keluarga_penduduk')->insert([ //aman
                    'id_penduduk' => $pendudukId,
                    'no_kk' => trim($row['no_kartu_keluarga']),
                    'hub_keluarga' => $hubunganId,
                    'nik_ayah' => trim($row['nik_ayah']),
                    'nama_ayah' => trim($row['nama_ayah']),
                    'nik_ibu' => trim($row['nik_ibu']),
                    'nama_ibu' => trim($row['nama_ibu']),
                ]);

                DB::table('kesehatan_penduduk')->insert([ //ga keinsert
                    'id_penduduk' => $pendudukId,
                    'golongan_darah' => trim($row['golongan_darah']),
                    'riwayat_penyakit' => trim($row['riwayat_penyakit']),
                    'asuransi_kesehatan' => trim($row['asuransi_kesehatan']),
                    'no_asuransi' => trim($row['no_asuransi']),
                    'no_bpjs_naker' => trim($row['no_bpjs_naker']),
                ]);

                DB::table('kewarganegaraan_penduduk')->insert([ //ga keinsert
                    'id_penduduk' => $pendudukId, 
                    'status_wn' => trim($row['status_warga_negara']),
                    'no_paspor' => trim($row['no_paspor']),
                    'tanggal_paspor' => $this->convertExcelDate($row['tanggal_paspor']),
                    'no_kitas_kitap' => trim($row['no_kitas_kitap']),
                    'negara_asal' => trim($row['negara_asal']),
                ]);

                DB::table('pernikahan_penduduk')->insert([ //ga keinsert
                    'id_penduduk' => $pendudukId, 
                    'id_status' => $statusId,
                    'no_akta_nikah' => trim($row['no_akta_nikah']),
                    'tanggal_nikah' => $this->convertExcelDate($row['tanggal_nikah']),
                    'tanggal_cerai' => $this->convertExcelDate($row['tanggal_cerai']),
                ]);

                } catch (Exception $e) {
                    Log::error('Gagal import row: ', [
                        'row' => $row->toArray(),
                        'error' => $e->getMessage(),
                    ]);

                continue;
            }
        }
    }

    private function getWilayahIdByNama($namaWilayah) {
        return DB::table('wilayah')
            ->whereRaw('LOWER(TRIM(nama_wilayah)) = ?', [strtolower(trim($namaWilayah))])
            ->value('id_wilayah');
    }

    private function getAgamaIdByNama($namaAgama) {
        return DB::table('agama')
            ->whereRaw('LOWER(TRIM(agama)) = ?', [strtolower(trim($namaAgama))])
            ->value('id_agama');
    }

    private function getPendidikanIdByNama($namaPendidikan) {
        return DB::table('pendidikan')
            ->whereRaw('LOWER(TRIM(tingkat_pendidikan)) = ?', [strtolower(trim($namaPendidikan))])
            ->value('id_pendidikan');
    }

    private function getPekerjaanIdByNama($namaPekerjaan) {
        return DB::table('pekerjaan')
            ->whereRaw('LOWER(TRIM(pekerjaan)) = ?', [strtolower(trim($namaPekerjaan))])
            ->value('id_pekerjaan');
    }

    private function getHubunganIdByNama($namaHubungan){
        return DB::table('hubungan_keluarga')
            ->whereRaw('LOWER(TRIM(hubungan_keluarga)) = ?', [strtolower(trim($namaHubungan))])
            ->value('id_hubungan');
    }

    private function getStatusIdByNama($namaStatus){
        return DB::table('status_nikah')
            ->whereRaw('LOWER(TRIM(status)) = ?', [strtolower(trim($namaStatus))])
            ->value('id_status');
    }

    private function convertExcelDate($excelDate)
    {
        if (is_numeric($excelDate)) {
            $date = Date::excelToDateTimeObject($excelDate);
            return $date->format('Y-m-d');
        } elseif (!empty($excelDate)) {
            return date('Y-m-d', strtotime($excelDate));
        } else {
            return null;
        }
    }

    private function convertExcelTime($excelTime)
    {
        if (is_numeric($excelTime)) {
            $time = Date::excelToDateTimeObject($excelTime);
            return $time->format('H:i:s');
        } elseif (!empty($excelTime)) {
            return date('H:i:s', strtotime($excelTime));
        } else {
            return null;
        }
    }
}
