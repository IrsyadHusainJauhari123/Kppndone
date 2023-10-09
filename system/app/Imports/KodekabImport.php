<?php

namespace App\Imports;

use App\Models\Kodekab;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodekabImport implements ToModel, WithHeadingRow
{
    /**

     */
    public function model(array $row)
    {
        return new Kodekab([

            'kode_kab' =>  $row['kode_kab'],
            'deskripsi' =>  $row['deskripsi']
        ]);
    }
}
