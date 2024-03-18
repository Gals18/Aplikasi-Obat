<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::with('user')->get();
        // Mengirim data klasifikasi ke view
        return view('klasifikasi.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.create');
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
            'nama_klasifikasi' => 'required',
            'deskripsi_klasifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $klasifikasi = klasifikasi::create(
            [
                'nama_klasifikasi' => $request->nama_klasifikasi,
                'deskripsi_klasifikasi' => $request->deskripsi_klasifikasi,
                'added_by' => Auth::id(),
            ]
        );

        if ($klasifikasi) {
            return redirect('/klasifikasi')->withSuccess('klasifikasi berhasil ditambahkan!');
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
    public function show($id_klasifikasi)
    {
        $klasifikasi = klasifikasi::find($id_klasifikasi);
        return view('klasifikasi.detail', compact('klasifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_klasifikasi)
    {
        $klasifikasi = klasifikasi::find($id_klasifikasi);
        return view('klasifikasi.edit', compact('klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_klasifikasi)
    {

        $validator = Validator::make($request->all(), [
            'nama_klasifikasi' => 'required',
            'deskripsi_klasifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $searchklasifikasi = klasifikasi::find($id_klasifikasi);

        $klasifikasi = $searchklasifikasi->update(
            [
                'nama_klasifikasi' => $request->nama_klasifikasi,
                'deskripsi_klasifikasi' => $request->deskripsi_klasifikasi,
                'added_by' => Auth::id(),
            ]
        );

        if ($klasifikasi) {
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
    public function destroy($id_klasifikasi)
    {
        $searchklasifikasi = klasifikasi::find($id_klasifikasi);

        $klasifikasi = $searchklasifikasi->delete();

        if ($klasifikasi) {
            return redirect('/klasifikasi')->withSuccess('klasifikasi berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors('Gagal menghapus klasifikasi, terjadi kesalahan');
        }
    }
}
