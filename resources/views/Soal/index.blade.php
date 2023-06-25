@extends('admin-theme._master')

@section('judul','Data Soal')

@section('isi')

<div class="row mt-4">
    <div class="col-10">
        <divc class="card">
            <div class="card-header">Data Soal 
                <a class="btn btn-primary float-right"
                 href="{{ url('/test/create') }}" role="button">Tambah</a>
        </div>
            
             <div class="card-body">
                <table class="table table-border">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Matakuliah</th>
                            <th>Dosen</th>
                            <th>Jumlah Soal</th>
                            <th>Keterangan</th>
                            <th>#</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($soal as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data-> nama_mk }}</td>
                            <td>{{ $data-> dosen }}</td>
                            <td>{{ $data-> jumlah_soal }}</td>
                            <td>{{ $data-> keterangan  }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                     </tbody>
                </table>

             </div>
        </div>

    </div>

</div>

@endsection