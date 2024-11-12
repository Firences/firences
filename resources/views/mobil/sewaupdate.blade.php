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
        <h2 class="mt-4">Detail Booking</h2>
    <div class="col-sm-8">
         <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail Booking & Status Mobil</h5>
            </div>
           <div class="card-body">
               <form action="{{ route('mobil.sewainput', $id->id) }}" method="GET" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Nama Penyewa </td>
                            <td>:</td>
                            <td> {{ $npenyewa }}</td>
                        </tr>
                        <tr>
                            <td>Merek</td>
                            <td>:</td>
                            <td> {{ $id->merek }}</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>:</td>
                            <td> {{ $id->model }}</td>
                        </tr>
                        <tr>
                            <td>Plat Nomor</td>
                            <td>:</td>
                            <td> {{ $id->plat }}</td>
                        </tr>
                        <tr>
                            <td>Tarif Per Hari</td>
                            <td>:</td>
                            <td> {{ $id->tarif }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Peminjaman</td>
                            <td>:</td>
                            <td> {{ $stglpinjam }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengembalian</td>
                            <td>:</td>
                            <td> {{ $stglkembali }}</td>
                        </tr>
                        <tr>
                            <td>Lama Sewa</td>
                            <td>:</td>
                            <td> {{ $days }} Hari</td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td>:</td>
                            <td> {{ $totalhrg }}</td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary float-right">
                        Konfirmasi
                    </button>
            </form>
               
           </div>
         </div> 
    </div>
    </div>
@endsection
