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
                         <h3 class="box-title">Form Input Kategori</h3>
                     </div>
                     <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                         <div class="box-body">
                        <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>

                                 <div class="col-sm-3">
                                     <input type="text" class="form-control" value="" name="nama" placeholder="">
                                 </div>
                             </div>                  
                                                       
                         </div>
                         <!-- /.box-body -->


                         <div class="modal-footer">
                             <a href="index.php?module=data_kategori" type="button" class="btn btn-danger pull-left">Kembali</a>
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
    $nama = $_POST['nama'];



    $sqlsimpanproduk = mysqli_query($koneksi, "INSERT INTO `tbl_kategori`(`id_kategori`, `nm_kategori`) VALUES (null,'$nama')");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Di Simpan');</script>";
        echo "<script>location='index.php?module=data_kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?module=input_kategori';</script>";
    }
}