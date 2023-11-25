<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;


class PegawaiController extends Controller
{
    public function index(Request $request)

    {
        if ($request->has('search')) {
            $data = Pegawai::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Pegawai::paginate(5);
        }



        return view('pages.data_pegawai', compact('data'));
    }

    public function tambahdata()
    {
        $data = Pegawai::all();

        return view('pages.tambah_data', compact('data'));
    }

    public function insertData(Request $request)
    {
        $data = Pegawai::create($request->all());

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Pindahkan file foto ke direktori 'potopegawai'
            $foto->move('potopegawai/', $foto->getClientOriginalName());

            // Simpan nama file foto ke dalam kolom 'foto' pada model Pegawai
            $data->foto = $foto->getClientOriginalName();
            $data->save();
        }

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

    public function exportpdf()
    {

        $data = Pegawai::all();
        view()->share('data', $data);
        $pdf = FacadePdf::loadview('pages.datapegawai_pdf');
        return $pdf->download('laporan-pegawai.pdf');
    }
    public function exportexcel()
    {
        // return Excel::download(new PegawaiExport, 'datapegawai.xlsx');
        // Unduh file Excel
        $excelFile = Excel::download(new PegawaiExport, 'datapegawai.xlsx');


        // Menambahkan pesan ke session untuk ditampilkan setelah request berikutnya
        Session::flash('success', 'Data berhasil diekspor ke Excel');


        // Kembalikan objek Excel
        return Excel::download(new PegawaiExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request)
    {


        $data = $request->file('file');
        $namefile = $data->getClientOriginalName();

        $data->move('PegawaiData', $namefile);

        Excel::import(new PegawaiImport, \public_path('/PegawaiData/' . $namefile));
        // return redirect()->route('pegawai')->with('success', 'Data Berhasil');
        return \redirect()->back();
    }
}
