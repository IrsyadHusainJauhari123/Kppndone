<?php

namespace App\Imports;

use App\Models\Kodeakun;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodeakunImport implements ToModel, WithHeadingRow
{
    /**
     *

     */
    public function model(array $row)
    {
        return new Kodeakun([
            'kode_akun' =>  $row['kode_akun'],
            'deskripsi' =>  $row['deskripsi']
        ]);
    }
}
