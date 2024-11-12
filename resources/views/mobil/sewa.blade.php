@extends('mobil.main')
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Tanggal Sewa</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('mobil.sewalist') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="npenyewa">Nama Penyewa:</label>
                        <input type="text" class="form-control @error('npenyewa') is-invalid @enderror" id="npenyewa" name="npenyewa" value="">
                        @error('npenyewa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tglpinjam">Tanggal Pinjam:</label>
                        <input type="date" class="form-control @error('tglpinjam') is-invalid @enderror" id="tglpinjam" name="tglpinjam" value="">
                        @error('tglpinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tglkembali">Tanggal Selesai:</label>
                        <input type="date" class="form-control @error('tglkembali') is-invalid @enderror" id="tglkembali" name="tglkembali" value="">
                        @error('tglkembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Cari Mobil</button>
                </form>
            </div>
        </div>
    </div>
@endsection