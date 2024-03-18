@extends('component.main')
@section('content')
<div class="container p-4 card-body">
    <h4>Form Klasifikasi</h4>
    <form action="/create-klasifikasi" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" id="inputnama_klasifikasi" type="text" name="nama_klasifikasi"/>
            <label for="inputnama_klasifikasi">Masukan Nama klasifikasi</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputdeskripsi_klasifikasi" type="text" name="deskripsi_klasifikasi"/>
            <label for="inputdeskripsi_klasifikasi">Masukan Deskripsi klasifikasi</label>
        </div>
        
      <button class="submit btn-primary">Submit</button>  
    </form>
</div>
@endsection