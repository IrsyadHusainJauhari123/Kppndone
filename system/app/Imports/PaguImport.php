<?php

namespace App\Imports;

use App\Models\Pagu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PaguImport implements ToModel, WithHeadingRow
{
    /**

     */
    public function model(array $row)
    {
        return new Pagu([


            'kode_ba' =>  $row['kode_ba'],
            'kode_akun' =>  $row['kode_akun'],
            'kode_kab' =>  $row['kode_kab'],
            'pagu' =>  $row['pagu'],



        ]);
    }
}
