@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-tie mr-2 text-primary"></i>Data Guru</h1>
    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm shadow-sm">+ Tambah Guru</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Guru / Tenaga Pendidik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gurus as $index => $g)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge badge-secondary p-2">{{ $g->nip }}</span></td>
                            <td>{{ $g->nama }}</td>
                            <td>
                                <span class="badge {{ $g->gender == 'L' ? 'badge-primary' : 'badge-danger' }} p-2 rounded-pill">
                                    {{ $g->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td><span class="text-primary">{{ $g->email }}</span></td>
                            <td>{{ $g->no_hp }}</td>
                            <td>
                                <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data guru ini?')"><i class="fas fa-trash"></i></button>
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
