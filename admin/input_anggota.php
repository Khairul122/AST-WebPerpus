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
                         <h3 class="box-title">Form Pendaftaran Anggota</h3>
                     </div>
                     <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                         <div class="box-body">
                        <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nisn</label>

                                 <div class="col-sm-3">
                                     <input type="text" class="form-control" value="" name="nisn" placeholder="">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nama Anggota</label>

                                 <div class="col-sm-4">
                                     <input type="text" class="form-control" name="nama" placeholder="">
                                 </div>
                             </div>

                            <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>

                                 <div class="col-sm-5">
                                     <input type="date" class="form-control" name="tanggal" placeholder="">
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
                                     <input type="text" class="form-control" name="kelas" placeholder="">
                                     
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="alamat" placeholder="">
                                 </div>
                             </div>                                                          
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="username" placeholder="">
                                 </div>
                             </div>                             
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="password" placeholder="">
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
         </div>
 </div>
</div>
 </section>
</div>

<?php
include 'koneksi.php';
if (isset($_POST['tambahproduk'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tglpost = date('Y-m-d');



    $sqlsimpanproduk = mysqli_query($koneksi, "INSERT INTO `tbl_anggota`(`id_anggota`, `nis`, `nm_anggota`, `kelas`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `tglreg`, `username`, `password`) VALUES (null,'$nisn','$nama','$kelas','$alamat','$jk','$tanggal','$tglpost','$username','$password')");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Di Simpan');</script>";
        echo "<script>location='index.php?module=data_anggota';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?module=input_anggota';</script>";
    }
}