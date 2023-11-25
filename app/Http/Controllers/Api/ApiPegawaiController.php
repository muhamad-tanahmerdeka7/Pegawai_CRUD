<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class ApiPegawaiController extends Controller
{

    public function getAllData()
    {
        $data = Pegawai::all();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }
}
