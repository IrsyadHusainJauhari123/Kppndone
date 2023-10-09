<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KodekabImport;
use App\Models\Kodekab;
use Maatwebsite\Excel\Facades\Excel;

class KodekabController extends Controller
{

    function index()
    {
        $data['list_kodekab'] = Kodekab::all();
        return view('admin.kodekab.index', $data);
    }
    function create()
    {
        return view('admin.kodekab.create');
    }

    public function store(Request $request)
    {
        Excel::import(new KodekabImport, request()->file('file'));
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app/file'), $fileName);

        return back();
    }

    function edit(Kodekab $kodekab)
    {
        $data['kodekab'] = $kodekab;
        return view('admin.kodekab.edit', $data);
    }

    function update(Kodekab $kodekab)
    {
        // $kodeba['kodeba'] = request('kodeba');
        $kodekab['kode_kab'] = request('kode_kab');
        $kodekab['deskripsi'] = request('deskripsi');


        // $kodeba['email'] = request('email');
        // if (request('password')) $kodeba['password'] = bcrypt(request('password'));
        $kodekab->save();
        return redirect('admin/kodekab')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Kodekab $kodekab)
    {
        $kodekab->delete();
        // return $kodekab;
        return redirect('admin/kodekab')->with('danger', 'Data Berhasil Dihapus');
    }
}
