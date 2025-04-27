@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Servis yang Dihapus</h1>

    <a href="{{ route('servis.index') }}" class="btn btn-primary mb-3">← Kembali ke Daftar Servis</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Pemilik</th>
                <th>Nomor Polisi</th>
                <th>Jenis Kendaraan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deletedServis as $servis)
            <tr>
                <td>{{ $servis->nama_pemilik }}</td>
                <td>{{ $servis->no_polisi }}</td>
                <td>{{ $servis->jenis_kendaraan }}</td>
                <td>{{ ucfirst($servis->status) }}</td>
                <td>
                    <form action="{{ route('servis.restore', $servis->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                    </form>

                    <form action="{{ route('servis.forceDelete', $servis->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data servis yang dihapus.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $deletedServis->links() }}
    </div>
</div>
@endsection
