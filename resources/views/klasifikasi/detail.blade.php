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
                            <th>Nama klasifikasi</th>
                            <th>Deskripsi</th>
                            <th>Ditambahkan Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                {{ $klasifikasi->nama_klasifikasi }}
                            </td>
                            <td>
                                {{ $klasifikasi->deskripsi_klasifikasi }}
                            </td>
                            <td>
                                {{ $klasifikasi->user->username }}
                            </td>
                            <td>
                                <a href="/edit-klasifikasi/{{ $klasifikasi->id_klasifikasi }}" class="btn">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
