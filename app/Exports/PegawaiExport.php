<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;

class PegawaiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pegawai::all();
    }


    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Foto',
            'Jenis Kelamin',
            'Nomor Telepon',
            'Di Tambah',
        ];
    }
}
