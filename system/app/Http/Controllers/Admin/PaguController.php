<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PaguImport;
use Illuminate\Http\Request;
use App\Models\Pagu;
use Maatwebsite\Excel\Facades\Excel;

class PaguController extends Controller
{

    function index()
    {
        $data['list_pagu'] = Pagu::all();
        return view('admin.pagu.index', $data);
    }
    function create()
    {
        return view('admin.pagu.create');
    }

    public function store(Request $request)
    {
        Excel::import(new PaguImport, request()->file('file'));
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app/file'), $fileName);

        return back();
    }

    function edit(Pagu $pagu)
    {
        $data['pagu'] = $pagu;
        return view('admin.pagu.edit', $data);
    }

    function update(Pagu $pagu)
    {
        // $kodeba['kodeba'] = request('kodeba');
        $pagu['kode_ba'] = request('kode_ba');
        $pagu['kode_akun'] = request('kode_akun');
        // $pagu['paguname'] = request('paguname');
        $pagu['kode_kab'] = request('kode_kab');
        $pagu['dipa'] = request('dipa');

        // $kodeba['email'] = request('email');
        // if (request('password')) $kodeba['password'] = bcrypt(request('password'));
        $pagu->save();
        return redirect('admin/pagu')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Pagu $pagu)
    {
        $pagu->delete();
        // return $kodeba;
        return redirect('admin/pagu')->with('danger', 'Data Berhasil Dihapus');
    }
}
