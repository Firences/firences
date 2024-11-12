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

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Pengembalian Mobil</h2>
    <div class="col-sm-8">
         <div class="card">
           <div class="card-body">
               <form action="#" method="GET" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Nama Penyewa </td>
                            <td>:</td>
                            <td> <?php echo e($id2[0]->penyewa); ?></td>
                        </tr>
                        <tr>
                            <td>Merek</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->merek); ?></td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->model); ?></td>
                        </tr>
                        <tr>
                            <td>Plat Nomor</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->plat); ?></td>
                        </tr>
                        <tr>
                            <td>Tarif Per Hari</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->tarif); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Peminjaman</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->tglpinjam); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengembalian</td>
                            <td>:</td>
                            <td> <?php echo e($id1[0]->tglkembali); ?></td>
                        </tr>
                        <tr>
                            <td>Lama Sewa</td>
                            <td>:</td>
                            <td> <?php echo e($days); ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td>:</td>
                            <td> <?php echo e($totalhrg); ?></td>
                        </tr>
                    </table>
            </form>
               
           </div>
         </div> 
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mobil.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\project\Mobil\resources\views/mobil/pengembaliancek.blade.php ENDPATH**/ ?>