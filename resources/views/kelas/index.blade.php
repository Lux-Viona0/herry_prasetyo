@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-university mr-2 text-primary"></i>Data Kelas</h1>
    <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm shadow-sm">+ Tambah Kelas</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas SISFO Akademik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Tingkat</th>
                        <th>Jurusan</th>
                        <th>Tahun Ajaran</th>
                        <th>Jumlah Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td><span class="badge badge-info px-2 py-2 rounded-circle">{{ $k->tingkat }}</span></td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->tahun_ajaran }}</td>
                            <td>
                                <span class="badge badge-dark p-2">
                                    <i class="fas fa-users mr-1"></i> {{ $k->siswas_count }} Siswa
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kelas ini?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection