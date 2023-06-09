<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pegawai::where('shareid', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Pegawai::paginate(5);
        }

        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        //dd($request->all());
        $data = Pegawai::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', ' DATA BERHASIL DISIMPAN ');
    }

    public function tampilkandata($id)
    {
        $data = Pegawai::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', ' DATA BERHASIL UPDATE ');
    }

    public function delete($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', ' DATA BERHASIL DIHAPUS ');
    }

    public function exportpdf()
    {
        $data = Pegawai::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new PegawaiExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('PegawaiData', $namafile);

        Excel::import(new PegawaiImport, public_path('/PegawaiData/' . $namafile));
        return redirect()->back();
    }
}
