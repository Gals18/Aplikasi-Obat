<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\KlasifikasiObat;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KlasifikasiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = Obat::all();
        // Mengirim data klasifikasi ke view
        return view('klasifikasiobat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obat = Obat::all();
        $klasifikasi = Klasifikasi::all();
        return view('klasifikasiobat.create',compact('obat','klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_obat)
    {
        $validator = Validator::make($request->all(), [
            'id_klasifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $klasifikasiobat = KlasifikasiObat::create(
            [
                'id_obat' => $id_obat,
                'id_klasifikasi' => $request->id_klasifikasi,
                'added_by' => Auth::id(),
            ]
        );

        if ($klasifikasiobat) {
            return redirect('/klasifikasi-obat')->withSuccess('klasifikasi berhasil ditambahkan!');
        } else {
            return redirect()->back()->withErrors('Gagal menambahkan klasifikasi, terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_klasifikasi_obat)
    {
        $klasifikasiobat = KlasifikasiObat::find($id_klasifikasi_obat);
        return view('klasifikasiobat.detail', compact('klasifikasiobat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_klasifikasi_obat)
    {
        $obat = Obat::all();
        $klasifikasiobat = KlasifikasiObat::find($id_klasifikasi_obat);
        return view('klasifikasiobat.edit', compact('klasifikasiobat','obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_klasifikasi_obat)
    {

        $validator = Validator::make($request->all(), [
            'id_obat' => 'required',
            'id_klasifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $searchklasifikasi = KlasifikasiObat::find($id_klasifikasi_obat);

        $klasifikasiobat = $searchklasifikasi->update(
            [
                'id_obat' => $request->id_obat,
                'id_klasifikasi' => $request->id_klasifikasi,
                'added_by' => Auth::id(),
            ]
        );

        if ($klasifikasiobat) {
            return redirect('/klasifikasi')->withSuccess('klasifikasi berhasil diedit!');
        } else {
            return redirect()->back()->withErrors('Gagal edit klasifikasi, terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_klasifikasi_obat)
    {
        $searchklasifikasi = KlasifikasiObat::find($id_klasifikasi_obat);

        $klasifikasiobat = $searchklasifikasi->delete();

        if ($klasifikasiobat) {
            return redirect('/klasifikasi-obat')->withSuccess('klasifikasi berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors('Gagal menghapus klasifikasi, terjadi kesalahan');
        }
    }
}
