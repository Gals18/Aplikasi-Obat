@extends('component.main')
@section('content')
    <div class="container p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <a href="/form-klasifikasi" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Klasifikasi</th>
                            <th>Deskripsi</th>
                            <th>Ditambahkan Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klasifikasi as $item)
                            <tr>
                                <td>
                                    {{ $item->nama_klasifikasi }}
                                </td>
                                <td>
                                    {{ $item->deskripsi_klasifikasi }}
                                </td>
                                <td>
                                    {{ $item->user->username }}
                                </td>
                                <td>
                                    <a href="/edit-klasifikasi/{{ $item->id_klasifikasi }}" class="btn">Edit</a>
                                    <a href="/detail-klasifikasi/{{ $item->id_klasifikasi }}" class="btn">Detail</a>
                                    <a href="/delete-klasifikasi/{{ $item->id_klasifikasi }}"class="btn">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
