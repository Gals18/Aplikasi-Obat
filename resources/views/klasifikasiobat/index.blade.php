@extends('component.main')
@section('content')
    <style>
        /* Style untuk pad */
        .pad {
            position: relative;
            width: 200px;
        }

        /* Style untuk tanda silang */
        .delete-btn {
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
            background-color: #f00;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 10%;
        }
    </style>
    <div class="container p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Obat</th>
                            <th>ID Klasifikasi</th>
                            <th>Ditambahkan Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nama_obat }}
                                    <br>
                                <a href="/detail-obat/{{ $item->id_obat }}">Tambah Klasifikasi</a>
                                </td>
                                <td>
                                    @foreach ($item->klasifikasiObat as $klasifikasiitem)
                                        {{-- jadi cara pemanggilannya dari tabel klasifikasiObat dulu baru ke tabel klasifikasi --}}
                                        {{-- 
                                    $klasifikasiitem = item untuk masing2 klasifikasiObat    
                                    klasifikasi = nama tabel klasfikasinya
                                    nama_klasifikasi = isian yang ada di tabel klasifikasi
                                --}}

                                        <div class="pad bg-secondary">
                                            <p class="ms-3">{{ $klasifikasiitem->klasifikasi->nama_klasifikasi }}.</p>
                                            <button class="delete-btn"><a href="/delete-klasifikasi-obat/{{ $klasifikasiitem->id_klasifikasi_obat }}">X</a></button>
                                        </div>
                    
                                        <br>
                                    @endforeach
                                </td>
                                <td>{{ $item->user->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk menghapus pad
        function hapusPad() {
            var element = document.querySelector('.pad');
            element.parentNode.removeChild(element);
        }
    </script>
@endsection
