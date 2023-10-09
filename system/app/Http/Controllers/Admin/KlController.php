<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KlExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kl;
use App\Imports\KlImport;

use Maatwebsite\Excel\Facades\Excel;

class KlController extends Controller
{

    function index()
    {
        $data['list_kl'] = Kl::all();
        return view('admin.kl.index', $data);
    }
    function create()
    {
        return view('admin.kl.create');
    }

    public function store(Request $request)
    {

        Excel::import(new KlImport, request()->file('file'));
        $file = request()->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app/file'), $fileName);

        return back();
    }

    public function export()
    {

        return Excel::download(new KlExport, 'kl.xlsx');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx',
    //     ]);

    //     $file = $request->file('file');

    //     try {
    //         // Import data dari file Excel
    //         Excel::import(new KlImport, $file);

    //         // Jika berhasil, kembalikan respons sukses
    //         return redirect()->route('kl.create')->with('success', 'Data berhasil diimpor');
    //     } catch (\Exception $e) {
    //         // Jika terjadi kesalahan, tangani kesalahan
    //         return redirect()->route('kl.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }
    // function store()
    // {
    //     Kl::created([
    //         'kode_ba' => request('kode_ba'),
    //         'kode_akun' => request('kode_akun'),
    //         'kode_kab' => request('kode_kab'),
    //         'blokir' => request('blokir'),
    //         'kontrak' => request('kontrak'),
    //         'pagu' => request('pagu'),
    //         'realisasi' => request('realisasi'),
    //         'bulan' => request('bulan')


    //     ]);

    //     return redirect('kl')->with('success', 'Data Berhasil Ditambah');
    // }

    // function Import_excel(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:cvs, xls,xlss'
    //     ]);

    //     $file = $request->file('file');

    //     $nama_file = rand() . $file->getClientOriginalName();

    //     $file->move('kppn/file');

    //     Excel::import(new KlImport, public_path('/kppn/file/' . $nama_file));

    //     return redirect('kl')->with('success', 'data Berhasil ditambah');
    // }



    function edit(Kl $kl)
    {
        $data['kl'] = $kl;
        return view('admin.kl.edit', $data);
    }
    function update(Kl $kl)
    {
        // $kodeba['kodeba'] = request('kodeba');
        $kl['kode_ba'] = request('kode_ba');
        $kl['kode_akun'] = request('kode_akun');
        // $kl['klname'] = request('klname');
        $kl['kode_kab'] = request('kode_kab');
        $kl['blokir'] = request('blokir');
        $kl['kontrak'] = request('kontrak');
        $kl['realisasi'] = request('realisasi');
        $kl['bulan'] = request('bulan');
        // $kodeba['email'] = request('email');
        // if (request('password')) $kodeba['password'] = bcrypt(request('password'));
        $kl->save();
        return redirect('admin/kl')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Kl $kl)
    {
        $kl->delete();
        // return $kodeba;
        return redirect('admin/kl')->with('danger', 'Data Berhasil Dihapus');
    }
}
