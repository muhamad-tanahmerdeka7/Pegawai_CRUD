<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;


class PegawaiImport implements ToModel
{

    protected $fileName;

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function model(array $row)
    {

        return new Pegawai([


            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'foto' => $row[3],
            'no_telepon' => $row[4]
        ]);
    }
}
