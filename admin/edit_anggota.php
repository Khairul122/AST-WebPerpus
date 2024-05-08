<?php
include 'koneksi.php';

    $a = date('Y-m-d-h-i-s');
    $krr = explode('-',$a);
    $idorder = implode("",$krr);

    $tanggal = date('Y-m-d');
?>
 <div class="content-wrapper">
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="box box-info">
                     <div class="box-header with-border">
                         <h3 class="box-title">Form Edit Anggota</h3>
                     </div>
                                         <?php
                    include "koneksi.php";
                    ?>
                    <?php
                    $ida = $_GET['id_anggota'];
                    $sqlt = mysqli_query($koneksi, "SELECT * FROM `tbl_anggota` WHERE   `id_anggota`='$ida'");
                    while ($sqlubah = mysqli_fetch_array($sqlt)) {
                        ?>
                     <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                         <div class="box-body">
                        <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nisn</label>

                                 <div class="col-sm-3">
                                     <input type="hidden" class="form-control"  value="<?= $sqlubah['id_anggota']?>" name="id_anggota" placeholder="">
                                      <input type="text" class="form-control"  value="<?= $sqlubah['nis']?>" name="nisn" placeholder="">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nama Anggota</label>

                                 <div class="col-sm-4">
                                     <input type="text" class="form-control" value="<?= $sqlubah['nm_anggota']?>" name="nama" placeholder="">
                                 </div>
                             </div>

                            <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>

                                 <div class="col-sm-5">
                                     <input type="date" class="form-control" value="<?= $sqlubah['tgl_lahir']?>" name="tanggal" placeholder="">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>

                                 <div class="col-sm-5">
                                     <select name="jk" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" value="<?= $sqlubah['kelas']?>" name="kelas" placeholder="">
                                     
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" value="<?= $sqlubah['alamat']?>" name="alamat" placeholder="">
                                 </div>
                             </div>                                                          
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control"  value="<?= $sqlubah['username']?>"name="username" placeholder="">
                                 </div>
                             </div>                             
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control"  value="<?= $sqlubah['password']?>"name="password" placeholder="">
                                 </div>
                             </div>                             
                         </div>
                         <!-- /.box-body -->


                         <div class="modal-footer">
                             <a href="index.php?module=data_anggota" type="button" class="btn btn-danger pull-left">Kembali</a>
                             <button type="submit" name="tambahproduk" class="btn btn-success pull-left">Simpan</button>
                         </div>
             <!-- /.modal-content -->
             </form>
         <?php }?>
         </div>
 </div>
</div>
 </section>
</div>

<?php
include 'koneksi.php';
if (isset($_POST['tambahproduk'])) {
    $id_anggota = $_POST['id_anggota'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tglpost = date('Y-m-d');



    $sqlsimpanproduk = mysqli_query($koneksi, "UPDATE `tbl_anggota` SET `nis`='$nisn',`nm_anggota`='$nama',`kelas`='$kelas',`alamat`='$alamat',`jenis_kelamin`='$jk',`tgl_lahir`='$tanggal',`tglreg`='$tglpost',`username`='$username',`password`='$password' WHERE `id_anggota`=$id_anggota");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Di Simpan');</script>";
        echo "<script>location='index.php?module=data_anggota';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?module=edit_anggota';</script>";
    }
}