<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kodeba;
use App\Imports\KodebaImport;
use Maatwebsite\Excel\Facades\Excel;

class KodebaController extends Controller
{

    function index()
    {
        $data['list_kodeba'] = Kodeba::all();
        return view('admin.kodeba.index', $data);
    }
    function create()
    {
        return view('admin.kodeba.create');
    }

    public function store(Request $request)
    {
        Excel::import(new KodebaImport, request()->file('file'));
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app/file'), $fileName);

        return back();
    }

    function edit(Kodeba $kodeba)
    {
        $data['kodeba'] = $kodeba;
        return view('admin.kodeba.edit', $data);
    }

    function update(Kodeba $kodeba)
    {
        // $kodeba['kodeba'] = request('kodeba');
        $kodeba['kode_ba'] = request('kode_ba');
        $kodeba['deskripsi'] = request('deskripsi');


        // $kodeba['email'] = request('email');
        // if (request('password')) $kodeba['password'] = bcrypt(request('password'));
        $kodeba->save();
        return redirect('admin/kodeba')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Kodeba $kodeba)
    {
        $kodeba->delete();
        // return $kodeba;
        return redirect('admin/kode$kodeba')->with('danger', 'Data Berhasil Dihapus');
    }
}
