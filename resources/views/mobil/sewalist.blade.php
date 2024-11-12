@extends('mobil.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Sewa Mobil</h2>
        <div class="card mb-4">
            <div class="card-header">
                <form action="{{ route('mobil.sewalist') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="npenyewa">Nama Penyewa:</label>
                        <input type="text" class="form-control @error('npenyewa') is-invalid @enderror" id="npenyewa" name="npenyewa" value="{{ $npenyewa }}">
                        @error('npenyewa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tglpinjam">Tanggal Pinjam:</label>
                        <input type="date" class="form-control @error('tglpinjam') is-invalid @enderror" id="tglpinjam" name="tglpinjam" value="{{ $a }}">
                        @error('tglpinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tglkembali">Tanggal Selesai:</label>
                        <input type="date" class="form-control @error('tglkembali') is-invalid @enderror" id="tglkembali" name="tglkembali" value="{{ $b }}">
                        @error('tglkembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Cari Mobil</button>
                </form>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Nomor Plat</th>
                            <th>Tarif Harga per Hari</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Nomor Plat</th>
                            <th>Tarif Harga per Hari</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($mobil as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->merek }}</td>
                                <td>{{ $k->model }}</td>
                                <td>{{ $k->plat }}</td>
                                <td>{{ $k->tarif }}</td>
                                <td>{{ $k->status }}</td>
                                <td>
                                    <a href="{{ route('mobil.sewaupdate', $k->id) }}" class="btn btn-sm btn-warning">SEWA</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
