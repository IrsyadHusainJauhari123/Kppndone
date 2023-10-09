<?php

namespace App\Imports;

use App\Models\Kl;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KlImport implements ToModel, WithHeadingRow
{


    /**

     */
    public function model(array $row)
    {
        return new Kl([
            'kode_ba' =>  $row['kode_ba'],
            'kode_akun' =>  $row['kode_akun'],
            'kode_kab' =>  $row['kode_kab'],
            'blokir' =>  $row['blokir'],
            'kontrak' =>  $row['kontrak'],
            // 'pagu' =>  $row['pagu'],
            'realisasi' =>  $row['realisasi'],
            'bulan' =>  $row['bulan'],
            'tahun' =>  $row['tahun']

        ]);
    }
}
