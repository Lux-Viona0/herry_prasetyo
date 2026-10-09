@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-book mr-2 text-primary"></i>Data Mata Pelajaran</h1>
    <a href="{{ route('mapel.create') }}" class="btn btn-primary btn-sm shadow-sm">+ Tambah Mapel</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>KKM Minimum</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapels as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge badge-secondary p-2">{{ $m->kode_mapel }}</span></td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td><span class="badge badge-warning p-2 font-weight-bold text-dark">{{ $m->kkm }}</span></td>
                            <td>
                                <a href="{{ route('mapel.edit', $m->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('mapel.destroy', $m->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus mata pelajaran ini?')"><i class="fas fa-trash"></i></button>
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
