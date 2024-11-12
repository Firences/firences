<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $mobil = Mobil::all();
        return view('mobil.index', compact('mobil'));
    }
    public function tersedia()
    {
        //
        $tersedia = DB::table('mobils') ->where('tglpinjam', '')->get();
        return view('mobil.tersedia', compact('tersedia'));
    }
    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate(
            [
                'merek' => 'required|max:45',
                'model' => 'required|max:45',
                'plat' => 'required|max:45',
                'tarif' => 'required|numeric',
            ],
            [
                'merek.required' => 'Nama wajib diisi',
                'merek.max' => 'Nama maksimal 20 karakter',
                'model.required' => 'jenis wajib diisi',
                'model.max' => 'jenis maksimal 20 karakter',
                'plat.required' => 'jenis wajib diisi',
                'tarif.required' => 'jenis wajib diisi',
            ]
        );
        $status='Tersedia';
        $tglpinjam='';
        $tglkembali='';
        $penyewa='';
        $ip=0;
        $ik=0;

        // Update data mobil
        mobil::create([
            'merek' => $request->merek,
            'model' => $request->model,
            'plat' => $request->plat,
            'tarif' => $request->tarif,
            'status' => $status,
            'tglpinjam' => $tglpinjam,
            'tglkembali' => $tglkembali,
            'ip' => $ip,
            'ik' => $ik
        ]);

        return redirect()->route('mobil.index');
    }

    public function edit(mobil $id)
    {
        return view('mobil.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate(
            [
                'merek' => 'required|max:45',
                'model' => 'required|max:45',
                'plat' => 'required|max:45',
                'tarif' => 'required|numeric',
            ],
            [
                'merek.required' => 'Nama wajib diisi',
                'merek.max' => 'Nama maksimal 20 karakter',
                'model.required' => 'jenis wajib diisi',
                'model.max' => 'jenis maksimal 20 karakter',
                'plat.required' => 'jenis wajib diisi',
                'tarif.required' => 'jenis wajib diisi',
            ]
        );

        // Temukan mobil berdasarkan ID
        $mobil = Mobil::findOrFail($id);

        // Update data mobil
        $mobil->update([
            'merek' => $request->merek,
            'model' => $request->model,
            'plat' => $request->plat,
            'tarif' => $request->tarif,
        ]);

        return redirect()->route('mobil.index');
    }
    public function sewa()
    {
        return view('mobil.sewa');
    }
    public function sewalist(Request $request)
    {
        $request->validate(
            [
                'tglpinjam' => 'required',
                'tglkembali' => 'required',
                'npenyewa' => 'required',
            ],
            [
                'tglpinjam.required' => 'Tanggal wajib diisi',
                'tglkembali.required' => 'Tanggal wajib diisi',
                'npenyewa.required' => 'Tanggal wajib diisi',
            ]
        );
        $a = $request->tglpinjam;
        $b = $request->tglkembali;
        $npenyewa = $request->npenyewa;
        $request->session()->put('stglpinjam',$a);
        $request->session()->put('stglkembali',$b);
        $request->session()->put('npenyewa',$npenyewa);

        $mobil = DB::table('mobils')->where('tglpinjam', '')
                                    ->orwhere(function ($query) use ($a,$b) {
                                        $query  ->where([
                                                    ['ip', '<>', strtotime($a)],
                                                    ['ip', '<>', strtotime($b)],
                                                    ['ik', '<>', strtotime($a)],
                                                    ['ik', '<>', strtotime($b)],
                                                ]);
                                    })
                                    ->orwhere(function ($query) use ($a,$b) {
                                        $query  ->where([
                                                    ['ip', '>', strtotime($a)],
                                                    ['ip', '>', strtotime($b)],
                                                ])
                                                ->where([
                                                    ['ik', '<', strtotime($a)],
                                                    ['ik', '<', strtotime($b)],
                                                ]);
                                    })
                                    ->get();

        return view('mobil.sewalist', compact('mobil','a','b','npenyewa'));
    }
    public function sewaupdate(Request $request,mobil $id)
    {
        $stglpinjam = $request->session()->get('stglpinjam');
        $stglkembali = $request->session()->get('stglkembali');
        $npenyewa = $request->session()->get('npenyewa');

        $sdates = strtotime($stglpinjam);
        $edates = strtotime($stglkembali);

        $day = $edates - $sdates;
        $days = ($day/86400)+1;

        $totalhrg = $days*$id->tarif;
        return view('mobil.sewaupdate', compact('id','stglpinjam','stglkembali','days','totalhrg','npenyewa'));
    }
    public function sewainput(Request $request,mobil $id)
    {
        $stglpinjam = $request->session()->get('stglpinjam');
        $stglkembali = $request->session()->get('stglkembali');
        $npenyewa = $request->session()->get('npenyewa');

        $sdates = strtotime($stglpinjam);
        $edates = strtotime($stglkembali);

        $day = $edates - $sdates;
        $days = ($day/86400)+1;
        $ip=strtotime($stglpinjam);
        $ik=strtotime($stglkembali);

        $totalhrg = $days*$id->tarif;

        DB::table('mobils')->where('id',$id->id)->update([
            'status' => 'Disewa',
            'tglpinjam' => $stglpinjam,
            'tglkembali' => $stglkembali,
            'ip' => $ip,
            'ik' => $ik,
        ]);
        $jml=DB::table('penyewa')->get();
        DB::table('penyewa')->insert([
            'id' => count($jml)+1,
            'penyewa' => $npenyewa,
            'merek' => $id->merek,
            'model' => $id->model,
            'plat' => $id->plat,
            'harga' => $id->tarif,
            'status' => 'Aktif',
            'tglpinjam' => $stglpinjam,
            'tglkembali' => $stglkembali,
        ]);
        return view('mobil.sewainput', compact('id','stglpinjam','stglkembali','days','totalhrg','npenyewa'));
    }

    public function pengembalian()
    {
        return view('mobil.pengembalian');
    }
    public function pengembaliancek(Request $request)
    {   
        $request->validate(
            [
                'kembali' => 'required',
            ],
            [
                'kembali.required' => 'Plat nomor wajib diisi',
            ]
        );

        $id1 = DB::table('mobils')->where('plat', $request->kembali)->get();
        $id2 = DB::table('penyewa')->where('plat', $request->kembali)->get();

        $sdates = strtotime($id1[0]->tglpinjam);
        $edates = strtotime($id1[0]->tglkembali);

        $day = $edates - $sdates;
        $days = ($day/86400)+1;;

        $totalhrg = $days*$id1[0]->tarif;
        DB::table('mobils')->where('plat',$request->kembali)->update([
            'status' => 'Tersedia',
            'tglpinjam' => '',
            'tglkembali' => '',
            'ip' => 0,
            'ik' => 0,
        ]);
        DB::table('penyewa')->where('plat',$request->kembali)->update([
            'status' => 'NonAktif',
        ]);
        return view('mobil.pengembaliancek', compact('id1','id2','days','day','totalhrg'));
    }
    public function laporan()
    {
        //
        $mobil = DB::table('penyewa')->get();
        return view('mobil.laporan', compact('mobil'));
    }
    public function destroy(Mobil $id)
    {
        $id->delete();

        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
