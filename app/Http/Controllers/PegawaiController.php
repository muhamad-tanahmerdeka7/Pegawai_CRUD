<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::all();

        return view('pages.data_pegawai', compact('data'));
    }

    public function tambahdata()
    {
        $data = Pegawai::all();

        return view('pages.tambah_data', compact('data'));
    }

    public function insertData(Request $request)
    {
        //     // Validasi input
        //     $request->validate([
        //         'nama' => 'required|string|max:255',
        //         'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        //         'nomor_telepon' => 'nullable|string|max:20',
        //     ]);

        // Simpan data ke dalam database

        Pegawai::create($request->all());


        // Redirect kembali ke halaman tambah data atau ke halaman lain sesuai kebutuhan
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampildata($id)
    {
        $data = Pegawai::find($id);
        return view('pages.tampildata', compact('data'));
    }
    public function editdata(Request $request, $id)
    {
        $data = Pegawai::find($id);
        //update
        $data->update($request->all());

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Update');
    }
    public function hapusdata($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
}
