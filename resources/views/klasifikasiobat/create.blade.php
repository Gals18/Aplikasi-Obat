@extends('component.main')
@section('content')
<div class="container p-4 card-body">
    <h4>Form Klasifikasi</h4>
    <form action="/create-klasifikasi-obat" method="post">
        @csrf
        <label >Pilih jenis obat:</label>
        <div class="form-floating mb-3">
            <select name="obat" id="obat">
                @foreach ($obat as $item)
                    <option value="{{ $item->id_obat }}">{{ $item->nama_obat }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <label >Pilih jenis klasifikasi:</label>
        <div class="form-floating mb-3">
            <select name="obat" id="obat">
                @foreach ($obat as $item)
                    <option value="{{ $item->id_ }}">{{ $item->nama_obat }}</option>
                @endforeach
            </select>
        </div>
        
      <button class="submit btn-primary">Submit</button>  
    </form>
</div>
@endsection