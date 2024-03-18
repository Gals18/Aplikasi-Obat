<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
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
        //membuat  api untuk list klasifikasi
        return Klasifikasi::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat api tambah klasifikasi
        $validator = Validator::make($request->all(), [
            'nama_klasifikasi' => 'required',
            'deskripsi_klasifikasi' => 'required',
            'added_by' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(["message" => $validator->errors()->toArray(), "status" => 400]);
        }

        $create = Klasifikasi::create($request->all());
        if ($create) {
            return json_encode(["message" => "tambah data klasifikasi berhasil", "status" => 200]);
        } else {
            return json_encode(["message" => "tambah data klasifikasi gagal", "status" => 400]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //api tampilan detail klasifikasi
        return Klasifikasi::findOrFail($id);
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
        //membuat api update klasifikasi
        $validator = Validator::make($request->all(), [
            'nama_klasifikasi' => 'required',
            'deskripsi_klasifikasi' => 'required',
            'added_by' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(["message" => $validator->errors()->toArray(), "status" => 400]);
        }

        $klasifikasi = Klasifikasi::find($id_klasifikasi);
        $update = $klasifikasi->update($request->all());
        return $update;

        if ($update) {
            return json_encode(["message" => "Ubah data klasifikasi berhasil", "status" => 200]);
        } else {
            return json_encode(["message" => "Ubah data klasifikasi gagal", "status" => 400]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //mmembuat api delete obat
         $klasifikasi = Klasifikasi::findOrFail($id);
         $klasifikasi->delete();
         return $klasifikasi;
         if ($klasifikasi) {
             return json_encode(["message" => "Hapus data klasifikasi berhasil", "status" => 200]);
         } else {
             return json_encode(["message" => "Hapus data klasifikasi gagal", "status" => 400]);
         }
    }
}
