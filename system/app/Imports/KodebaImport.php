<?php

namespace App\Imports;

use App\Models\Kodeba;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodebaImport implements ToModel, WithHeadingRow
{
    /**

     */
    public function model(array $row)
    {
        return new Kodeba([
            'kode_ba' =>  $row['kode_ba'],
            'deskripsi' =>  $row['deskripsi']
        ]);
    }
}
