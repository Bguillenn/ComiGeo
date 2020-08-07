<?php

namespace App\Imports;

use App\Denuncia;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DenunciasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Denuncia([
            'DenCod' => $row[0],
            'DenGen' => $row[33],
            'DenEda' => $row[34],
            'DenMes' => $row[42],
        ]);
    }
}
