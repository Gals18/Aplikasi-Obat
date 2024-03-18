@extends('component.main')
@section('content')
<div class="container p-4 card-body">
    <h4>Form Obat</h4>
    <form action="/create-obat" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" id="inputnama_obat" type="text" name="nama_obat"/>
            <label for="inputnama_obat">Masukan Nama Obat</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputstok_obat" type="text" name="stok_obat"/>
            <label for="inputstok_obat">Masukan Stok Obat</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputharga_obat" type="text" name="harga_obat"/>
            <label for="inputharga_obat">Masukan Harga Obat</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputdeskripsi_obat" type="text" name="deskripsi_obat"/>
            <label for="inputdeskripsi_obat">Masukan Deskripsi Obat</label>
        </div>
        
      <button class="submit btn-primary">Submit</button>  
    </form>
</div>
@endsection