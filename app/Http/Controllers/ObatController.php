<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\KlasifikasiObat;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::with('user')->get();
        // Mengirim data obat ke view
        return view('obat.index', ['obats' => $obats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_obat' => 'required',
            'stok_obat' => 'required|numeric|min:0',
            'harga_obat' => 'required|numeric|min:0',
            'deskripsi_obat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $obat = Obat::create(
            [
                'nama_obat' => $request->nama_obat,
                'stok_obat' => $request->stok_obat,
                'harga_obat' => $request->harga_obat,
                'deskripsi_obat' => $request->deskripsi_obat,
                'added_by' => Auth::id(),
            ]
        );

        if ($obat) {
            return redirect('/obat')->withSuccess('Obat berhasil ditambahkan!');
        } else {
            return redirect()->back()->withErrors('Gagal menambahkan obat, terjadi kesalahan');
        }
    }

    public function tambah(Request $request, $id_obat)
    {
        $validator = Validator::make($request->all(), [
            'stok_baru' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $searchstok = Obat::find($id_obat);
        $jumlah_tambah = $request->stok_baru;
        $obat = $searchstok->stok_obat + $jumlah_tambah;

        $searchstok->stok_obat = $obat; // Mengupdate nilai stok_obat

        $searchstok->save(); // Menyimpan perubahan ke dalam database

        if ($obat) {
            return redirect('/detail-obat/'.$id_obat)->withSuccess('Obat berhasil ditambahkan!');
        } else {
            return redirect()->back()->withErrors('Gagal menambahkan obat, terjadi kesalahan');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_obat)
    {
        $obat = Obat::find($id_obat);
        $klasifikasi = Klasifikasi::all();
        return view('obat.detail', compact('obat','klasifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_obat)
    {
        $obat = Obat::find($id_obat);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_obat)
    {

        $validator = Validator::make($request->all(), [
            'nama_obat' => 'required',
            'stok_obat' => 'required|numeric|min:0',
            'harga_obat' => 'required|numeric|min:0',
            'deskripsi_obat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $searchObat = Obat::find($id_obat);

        $obat = $searchObat->update(
            [
                'nama_obat' => $request->nama_obat,
                'stok_obat' => $request->stok_obat,
                'harga_obat' => $request->harga_obat,
                'deskripsi_obat' => $request->deskripsi_obat,
                'added_by' => Auth::id(),
            ]
        );

        if ($obat) {
            return redirect('/obat')->withSuccess('Obat berhasil diedit!');
        } else {
            return redirect()->back()->withErrors('Gagal edit obat, terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_obat)
    {
        $searchObat = Obat::find($id_obat);

        $obat = $searchObat->delete();

        if ($obat) {
            return redirect('/obat')->withSuccess('Obat berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors('Gagal menghapus obat, terjadi kesalahan');
        }
    }
   
}
