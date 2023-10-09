<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kodeakun;
use App\Imports\KodeakunImport;
use Maatwebsite\Excel\Facades\Excel;

class KodeakunController extends Controller
{

    function index()
    {
        $data['list_kodeakun'] = Kodeakun::all();
        return view('admin.kodeakun.index', $data);
    }
    function create()
    {
        return view('admin.kodeakun.create');
    }

    public function store(Request $request)
    {
        Excel::import(new KodeakunImport, request()->file('file'));
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app/file'), $fileName);

        return back();
    }

    function edit(Kodeakun $kodeakun)
    {
        $data['kodeakun'] = $kodeakun;
        return view('admin.kodekun.edit', $data);
    }

    function update(Kodeakun $kodeakun)
    {
        // $kodeakun['kodeakun'] = request('kodeakun');
        $kodeakun['kode_akun'] = request('kode_akun');
        $kodeakun['deskripsi'] = request('deskripsi');
        $kodeakun->save();
        return redirect('admin/kodeakun')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Kodeakun $kodeakun)
    {
        $kodeakun->delete();
        // return $kodeakun;
        return redirect('admin/kodeakun')->with('danger', 'Data Berhasil Dihapus');
    }
}
