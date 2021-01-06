<?php

namespace App\Imports;

use App\ModelTelephone;
use Maatwebsite\Excel\Concerns\ToModel;

class TelephoneImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Telephone([
            //
        ]);
    }
}
