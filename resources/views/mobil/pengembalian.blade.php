@extends('mobil.main')
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Pengambalian Mobil</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('mobil.pengembaliancek') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kembali">Input Plat Nomor:</label>
                        <input type="text" class="form-control @error('kembali') is-invalid @enderror" id="kembali" name="kembali" value="">
                        @error('kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Cari Mobil</button>
                </form>
            </div>
        </div>
    </div>
@endsection