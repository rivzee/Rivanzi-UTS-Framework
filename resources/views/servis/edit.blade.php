@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Servis Kendaraan</h1>

    <form action="{{ route('servis.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_polisi" class="form-label">Nomor Polisi</label>
            <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="{{ old('no_polisi') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
            <select class="form-select" id="jenis_kendaraan" name="jenis_kendaraan" required>
                <option value="motor" {{ old('jenis_kendaraan') == 'motor' ? 'selected' : '' }}>Motor</option>
                <option value="mobil" {{ old('jenis_kendaraan') == 'mobil' ? 'selected' : '' }}>Mobil</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required>{{ old('keluhan') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jenis_servis" class="form-label">Jenis Servis</label>
            <input type="text" class="form-control" id="jenis_servis" name="jenis_servis" value="{{ old('jenis_servis') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_servis" class="form-label">Tanggal Servis</label>
            <input type="date" class="form-control" id="tanggal_servis" name="tanggal_servis" value="{{ old('tanggal_servis') }}" required>
        </div>

        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ old('biaya') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dikerjakan" {{ old('status') == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
