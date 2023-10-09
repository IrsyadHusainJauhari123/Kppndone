<?php

namespace App\Exports;

use App\Models\Kl;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kl::all();
    }
}
