<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
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
        //membuat  api untuk list obat
        return Obat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat api tambah obat
        $validator = Validator::make($request->all(), [
            'nama_obat' => 'required',
            'harga_obat' => 'required',
            'stok_obat' => 'required',
            'deskripsi_obat' => 'required',
            'added_by' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(["message" => $validator->errors()->toArray(), "status" => 400]);
        }

        $create = Obat::create($request->all());
        if ($create) {
            return json_encode(["message" => "tambah data obat berhasil", "status" => 200]);
        } else {
            return json_encode(["message" => "tambah data obat gagal", "status" => 400]);
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
        //membuat api detail obat
        return Obat::findOrFail($id);
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
        //membuat api update obat
        $validator = Validator::make($request->all(), [
            'nama_obat' => 'required',
            'harga_obat' => 'required',
            'deskripsi_obat' => 'required',
            'added_by' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(["message" => $validator->errors()->toArray(), "status" => 400]);
        }

        $obat = Obat::find($id_obat);
        $update = $obat->update($request->all());
        return $update;

        if ($update) {
            return json_encode(["message" => "Ubah data obat berhasil", "status" => 200]);
        } else {
            return json_encode(["message" => "Ubah data obat gagal", "status" => 400]);
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
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return $obat;
        if ($obat) {
            return json_encode(["message" => "Hapus data obat berhasil", "status" => 200]);
        } else {
            return json_encode(["message" => "Hapus data obat gagal", "status" => 400]);
        }

    }
}
