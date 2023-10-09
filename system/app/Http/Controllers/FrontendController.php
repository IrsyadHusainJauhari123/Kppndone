<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kl;
use App\Models\Pagu;
use App\Models\Kodeba;
use App\Models\Kodeakun;
use NumberFormatter;

class FrontendController extends Controller

{
    function showmap(Request $request)
    {

        $data['list_kodeba'] = Kodeba::all();
        $data['list_kodeakun'] = kodeakun::where('kode_akun', 'like', '6%')->get();
        // if ($request->filled('tahun')) {
        //     $tahun = $request->tahun;
        // } else {
        //     $tahunnow = date('Y'); // Mengambil tahun dalam format empat digit
        //     $tahun = $tahunnow;
        // }
        if ($request->filled('tahun')) {
            $tahun = $request->tahun;
        } elseif ($request->filled('bulan') && $request->filled('tahun')) {
            // $bulan = $request->bulan;
            $tahun = $request->tahun;
        } else {
            // Jika tidak ada tahun atau bulan yang diberikan, kita dapat mengambil nilai default
            $tahun = date('Y'); // Mengambil tahun dalam format empat digit
            // $bulan = date('m');
            // $bulan = date('m'); // Mengambil bulan dalam format dua digit
        }


        // $data['list_ktg_1'] = Kl::select(
        //     DB::raw('sum(realisasi) as jlm_realisasi'),
        //     DB::raw('(SELECT SUM(pagu) FROM tb_pagu) as total_pagu'),
        //     'kode_akun'
        // )
        //     ->whereIn('kode_akun', ['51', '52', '53'])
        //     ->where('kode_kab', '1306')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_akun')
        //     ->get();

        // $data['list_ktg_1'] = DB::select('SELECT a.kode_akun,sum(a.pagu) as total_pagu,sum(b.realisasi) as total_realisasi from tb_pagu a, tb_kl b where a.kode_akun=b.kode_akun and a.kode_kab=b.kode_kab and a.kode_kab=1306 group by a.kode_akun');
        // $data['list_ktg_1'] = Kl::select(
        //     DB::raw('sum(realisasi) as jlm_realisasi'),
        //     DB::raw('(SELECT SUM(pagu) FROM tb_pagu) as total_pagu')
        // )
        //     ->join('tb_kl as tbkl', 'tb_kl.pagu', '=', 'tb_kl.pagu') // Menggunakan alias 'tbkl' untuk tb_kl
        //     ->whereIn('tb_kl.kode_akun', ['51', '52', '53'])
        //     ->where('tb_kl.kode_kab', '1306')
        //     ->where('tb_kl.tahun', $tahun)
        //     ->groupBy('tb_kl.kode_akun')
        //     ->get();



        //grafik pertama berdasarkan koode akun
        $data['list_ktg_r'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            // ->selectRaw('sum(pagu) as pg')
            ->selectRaw('kode_akun')
            ->whereIn('kode_akun', ['51', '52', '53'])
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();

        $data['list_kku_r'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            // ->selectRaw('sum(pagu) as pg')
            ->selectRaw('kode_akun')
            ->whereIn('kode_akun', ['51', '52', '53'])
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();


        $data['list_ktg_p'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_akun')
            ->whereIn('kode_akun', ['51', '52', '53'])
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();

        $data['list_kku_p'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_akun')
            ->whereIn('kode_akun', ['51', '52', '53'])
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();



        //grafik kedua berdasarkan kode_ba
        $data['list_ktg_r_h'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            ->selectRaw('kode_ba')
            ->whereNotIn('kode_ba', [999])
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_ba')
            ->get();

        $data['list_kku_r_h'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            ->selectRaw('kode_ba')
            ->whereNotIn('kode_ba', [999])
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_ba')
            ->get();

        $data['list_ktg_p_h'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_ba')
            ->whereNotIn('kode_ba', [999])
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_ba')
            ->get();

        $data['list_kku_p_h'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_ba')
            ->whereNotIn('kode_ba', [999])
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_ba')
            ->get();


        //grafik berdasarkan bulan//




        //grafik berdasarkan kode_akun
        $data['list_ktg_r1'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            ->selectRaw('kode_akun')
            ->where('kode_akun', 'like', '6%')
            // ->where('kode_akun', 'like', '06%')
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();

        $data['list_kku_r2'] = Kl::selectRaw('sum(realisasi) AS total_realisasi')
            ->selectRaw('kode_akun')
            ->where('kode_akun', 'like', '6%')
            // ->where('kode_akun', 'like', '06%')
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();

        $data['list_ktg_p1'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_akun')
            ->where('kode_akun', 'like', '6%')
            // ->where('kode_akun', 'like', '06%')
            ->where('kode_kab', '1306')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();

        $data['list_kku_p2'] = Pagu::selectRaw('sum(pagu) as total_pagu')
            ->selectRaw('kode_akun')
            ->where('kode_akun', 'like', '6%')
            // ->where('kode_akun', 'like', '06%')
            ->where('kode_kab', '1311')
            ->where('tahun', $tahun) // Menggunakan whereMonth untuk filter berdasarkan bulan
            ->groupBy('kode_akun')
            ->get();


        // dd($data);

        // $data['kb'] = Kl::select('kode_ba')->distinct()->get();
        // $data['ka'] = Kl::select('kode_akun')->distinct()->get();

        // if ($request->filled('bulan')) {
        //     $bulan = $request->bulan;
        // } else {
        //     $bulannow = date('m-y');
        //     $bulan = $bulannow;
        // }

        // // List data ktg dan kku group by (kode_akun)
        // $data['list_ktg_1'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->where('kode_kab', '1306')
        //     ->whereRaw("bulan ='$bulan'") // Menggunakan whereRaw untuk kondisi khusus
        //     ->groupBy('kode_akun')
        //     ->get();


        // $data['kb'] = Kl::select('kode_ba')->distinct()->get();

        // $data['ka'] = Kl::select('kode_akun')->distinct()->get();


        // if ($request->filled('bulan')) {
        //     $bulan = $request->bulan;
        // } else {
        //     $bulannow = date('m-y');
        //     $bulan = $bulannow;
        // }

        // // List data ktg dan kku group by (kode_akun)
        // $list_ktg_1 = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->where('kode_kab', '1306')
        //     ->whereRaw("bulan = '$bulan'") // Menggunakan whereRaw untuk kondisi khusus
        //     ->groupBy('kode_akun')
        //     ->get();

        // // Data kode BA
        // $kb = Kl::select('kode_ba')->distinct()->get();

        // // Data kode akun


        // $ka = Kl::select('kode_akun')->distinct()->get();
        // return view('depan.index', compact('list_ktg_1', 'kb', 'ka', 'bulan'));
        // if ($request->filled('bulan')) {
        //     $bulan = $request->bulan;
        // } else {
        //     $bulannow = date('m-y');
        //     $bulan = $bulannow;
        // }

        // // List data ktg dan kku group by (kode_akun)
        // $data['list_ktg_1'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->where('kode_kab', '1306')
        //     ->whereRaw("bulan ='$bulan'") // Menggunakan whereRaw untuk kondisi khusus
        //     ->groupBy('kode_akun')
        //     ->get();


        // $data['kb'] = Kl::select('kode_ba')->distinct()->get();
        // $data['ka'] = Kl::select('kode_akun')->distinct()->get();

        // return $data;
        // if ($request->filled('bulan')) {
        //     $bulan = "Where('bulan' ,  '$request->bulan')";
        // } else {
        //     $bulannow = date('m-y');
        //     $bulan = "Where('bulan',  '01-2023')";
        // }
        // //list data ktg dan kku group by(kode_akun)
        // $data['list_ktg_1'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->Where('kode_kab', '1306')
        //     ->$bulan
        //     ->groupBy('kode_akun')
        //     ->get();

        // $data['list_kku_1'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->whereIn('kode_akun', ['51', '52', '53'])
        //     ->Where('kode_kab', '1311')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_akun')
        //     ->get();

        // //list data ktg dan kku group by(kode_ba)
        // $data['list_ktg_2'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_ba')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->Where('kode_kab', '1306')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_ba')
        //     ->get();

        // $data['list_kku_2'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_ba')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->Where('kode_kab', '1311')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_ba')
        //     ->get();

        //list data ktg dan kku by(realisasi dan pagu)

        $list_ktg_r_p = $data['list_ktg_r_p'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
            ->selectRaw('bulan')
            ->where('kode_akun', 'not like', '6%')
            ->Where('kode_kab', '1306')
            ->where('tahun', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $list_ktg_p_p = $data['list_ktg_p_p'] = pagu::selectRaw('sum(pagu) as pg')
            ->where('kode_akun', 'not like', '6%')
            ->Where('kode_kab', '1306')
            ->where('tahun', $tahun)
            ->first();

        foreach ($list_ktg_r_p as $list_11) {
            $list_11->persentase = round(($list_11->jlm_realisasi / $list_ktg_p_p->pg) * 100, 2);
        }

        $list_kku_r_p = $data['list_kku_r_p'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
            ->selectRaw('bulan')
            ->where('kode_akun', 'not like', '6%')
            ->Where('kode_kab', '1311')
            ->where('tahun', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $list_kku_p_p = $data['list_kku_p_p'] = pagu::selectRaw('sum(pagu) as pg')
            ->where('kode_akun', 'not like', '6%')
            ->Where('kode_kab', '1311')
            ->where('tahun', $tahun)
            ->first();

        foreach ($list_kku_r_p as $list_20) {
            $list_20->persentase = round(($list_20->jlm_realisasi / $list_kku_p_p->pg) * 100, 2);
        }

        // $list_kku_20 = $data['list_kku_20'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('bulan')
        //     ->where('kode_akun', 'not like', '6%')
        //     ->Where('kode_kab', '1311')
        //     ->where('tahun', $tahun)
        //     ->groupBy('bulan')
        //     ->orderBy('bulan', 'asc')
        //     ->get();
        // foreach ($list_kku_20 as $list_20) {
        //     $list_20->persentase = round(($list_20->jlm_realisasi / $list_11->pg) * 100, 2);
        // }
        // // routing linebar


        // //list data ktg dan kku by (realisasi dan pagu)
        // $data['list_ktg_6'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'like', '6%')
        //     ->Where('kode_kab', '1306')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_akun')
        //     ->get();

        // $data['list_kku_7'] = Kl::selectRaw('sum(realisasi) AS jlm_realisasi')
        //     // ->selectRaw('sum(pagu) as pg')
        //     ->selectRaw('kode_akun')
        //     ->where('kode_akun', 'like', '6%')
        //     ->Where('kode_kab', '1311')
        //     ->where('tahun', $tahun)
        //     ->groupBy('kode_akun')
        //     ->get();

        return view('frontend.map', $data);
    }

    // function showmap()
    // {
    //     return view('frontend.map');
    // }
}
