@extends('component.main')
@section('content')
    <div class="container p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               <a href="/form-obat" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Stok Obat</th>
                            <th>Deskripsi</th>
                            <th>Ditambahkan Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $obat)
                        <tr>
                            <td>
                               {{ $obat->nama_obat }} 
                            </td>
                            <td>
                                {{ $obat->harga_obat }} 
                             </td>
                             <td>
                                {{ $obat->stok_obat }} 
                             </td>
                             <td>
                                {{ $obat->deskripsi_obat }} 
                             </td>
                             <td>
                                {{ $obat->user->username}} 
                             </td>
                             <td>
                                <a href="/edit-obat/{{ $obat->id_obat }}" class="btn">Edit</a>
                                <a href="/detail-obat/{{ $obat->id_obat }}" class="btn">Detail</a>
                                <a href="/delete-obat/{{ $obat->id_obat }}"class="btn">Hapus</a>
                             </td>
                        </tr>
                      
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection