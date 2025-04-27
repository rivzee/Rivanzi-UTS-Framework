@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Daftar Servis Kendaraan</h1>

            <div class="mb-3 d-flex justify-content-between">
                <a href="{{ route('servis.create') }}" class="btn btn-success">Tambah Servis</a>
                <a href="{{ route('servis.deleted') }}" class="btn btn-secondary">Riwayat Servis Dihapus</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>No Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Jenis Servis</th>
                            <th>Tanggal Servis</th>
                            <th>Status</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($servis as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($servis->currentPage() - 1) * $servis->perPage() }}</td>
                            <td>{{ $item->nama_pemilik }}</td>
                            <td>{{ $item->no_polisi }}</td>
                            <td>{{ $item->jenis_kendaraan }}</td>
                            <td>{{ $item->jenis_servis }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_servis)->format('d-m-Y') }}</td>
                            <td>
                                @if ($item->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif ($item->status == 'dikerjakan')
                                    <span class="badge bg-primary">Dikerjakan</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($item->biaya, 0, ',', '.') }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('servis.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('servis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data servis.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $servis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
