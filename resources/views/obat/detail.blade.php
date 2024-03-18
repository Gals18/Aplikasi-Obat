@extends('component.main')
@section('content')
    <div class="container p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               <h7>Obat {{ $obat->nama_obat }}</h7>
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
                                {{ $obat->user->username }}
                            </td>
                            <td>
                                <a href="/edit-obat/{{ $obat->id_obat }}" class="btn">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="container p-2">
                    <form action="/tambah-stok/{{ $obat->id_obat }}" method="post">
                        @csrf
                        <label for="stok baru">Tambah stok Obat</label>
                        <input type="number" name="stok_baru" min="0">
                        <button class="submit">Tambah</button>
                    </form>
                </div>
                <hr>
                <div class="container p-2">
                    <form action="/create-klasifikasi-obat/{{ $obat->id_obat }}" method="post">
                        @csrf
                        <label for="stok baru">Tambahkan Klasifikasi Obat</label>
                        <div class="form-group mb-3 mr-5">
                            <select class="form-select" name="id_klasifikasi" id="id_klasifikasi">
                                <option selected disabled>Pilih klasifikasi</option>
                                @foreach ($klasifikasi as $item)
                                    <option value="{{ $item->id_klasifikasi }}">{{ $item->nama_klasifikasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="submit">Tambah</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
