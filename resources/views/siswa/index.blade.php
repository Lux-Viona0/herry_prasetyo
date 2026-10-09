@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users mr-2 text-primary"></i>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm shadow-sm">+ Tambah Siswa</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa Terdaftar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge badge-secondary p-2">{{ $s->nis }}</span></td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                <span class="badge {{ $s->jenis_kelamin == 'L' ? 'badge-primary' : 'badge-danger' }} p-2 rounded-pill">
                                    {{ $s->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td><span class="badge badge-info p-2">{{ $s->kelas->nama_kelas ?? '-' }}</span></td>
                            <td>{{ $s->no_hp }}</td>
                            <td>
                                <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data siswa ini?')"><i class="fas fa-trash"></i></button>
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
