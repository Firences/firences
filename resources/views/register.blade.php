<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Akun</title>
</head>
<body>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <label>REGISTER</label>
                    <hr>
                    <div class="form-group">
                        <label>User</label>
                        <input type="text" class="form-control" id="user" placeholder="Masukkan User">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <label>Nomor SIM</label>
                        <input type="number" class="form-control" id="sim" placeholder="Masukkan Nomor SIM">
                    </div>
                    <button class="btn btn-register btn-block btn-success">REGISTER</button>
                </div>
            </div>
            <div class="text-center" style="margin-top: 15px">
                Sudah punya akun? <a href="/login">Silahkan Login</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-register").click( function() {
            var user = $("#user").val();
            var password    = $("#password").val();
            var nama = $("#nama").val();
            var alamat = $("#alamat").val();
            var telepon = $("#telepon").val();
            var sim = $("#sim").val();
            var token = $("meta[name='csrf-token']").attr("content");
            if (user.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'User Wajib Diisi !'
                });
            } else if(password.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });
            } else if(nama.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Lengkap Wajib Diisi !'
                });
            } else if(alamat.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Wajib Diisi !'
                });
            } else if(telepon.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Telepon Wajib Diisi !'
                });
            } else if(sim.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor SIM Wajib Diisi !'
                });
            } else {
                //ajax
                $.ajax({
                    url: "{{ route('register') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "user": user,
                        "password": password,
                        "nama": nama,
                        "alamat": alamat,
                        "telepon": telepon,
                        "sim": sim,
                        "_token": token
                    },
                    success:function(response){
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil!',
                                text: 'silahkan login!'
                            });
                            $("#nama_lengkap").val('');
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Register Gagal!',
                                text: 'User sudah ada!'
                            });
                        }
                        console.log(response);
                    },
                    error:function(response){
                        Swal.fire({
                            type: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }
                })
            }
        });
    });
</script>

</body>
</html>