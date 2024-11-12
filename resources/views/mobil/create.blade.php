@extends('mobil.main')
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Input Unit Mobil</h2>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah data
            </div>
            <div class="card-body">
                <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="merek">Merek:</label>
                        <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek') }}">
                        @error('merek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}">
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plat">Nomor Plat:</label>
                        <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" value="{{ old('plat') }}">
                        @error('plat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif Harga per Hari:</label>
                        <input type="number" class="form-control @error('tarif') is-invalid @enderror" id="tarif" name="tarif" value="{{ old('tarif') }}">
                        @error('tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection