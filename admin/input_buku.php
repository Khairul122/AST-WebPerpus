<?php
include 'koneksi.php';
$kd_buku = mysqli_query($koneksi,"SELECT COUNT(*) as num FROM tbl_buku");
$kd_buku = mysqli_fetch_array($kd_buku);
$kd_buku = $kd_buku['num'];
$kd_buku = $kd_buku + 1;
if ($kd_buku < 10) {
    $kd_buku = 'KB000' . $kd_buku;
} else if ($kd_buku >= 10 && $kd_buku < 100) {
    $kd_buku = 'KB00' . $kd_buku;
} else if ($kd_buku >= 100 && $kd_buku < 1000) {
    $kd_buku = 'KB0' . $kd_buku;
} else if ($kd_buku >= 1000 && $kd_buku < 10000) {
    $kd_buku = 'KB' . $kd_buku;
} else {
    $kd_buku = "Database sudah penuh";
}
?>
 <div class="content-wrapper">
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="box box-info">
                     <div class="box-header with-border">
                         <h3 class="box-title">Form Entry Data Buku</h3>
                     </div>
                     <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                         <div class="box-body">
                        <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>

                                 <div class="col-sm-3">
                                     <input type="text" class="form-control" value="<?= $kd_buku ?>" name="kode" placeholder="" readonly>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>

                                 <div class="col-sm-4">
                                     <input type="text" class="form-control" name="judul" placeholder="">
                                 </div>
                             </div>
                                                          <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>

                                 <div class="col-sm-4">
                                     <input type="text" class="form-control" name="kelas" placeholder="">
                                 </div>
                             </div>

                            <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nama Pengarang</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="pengarang" placeholder="">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                                 <div class="col-sm-5">
                                    <select class="form-control" name="kategori">
                                        <option value="0">Pilih  :</option>
                                        <?php
                                        $tampilkat = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while ($kat = mysqli_fetch_array($tampilkat)) { ?>
                                            <option value="<?php echo "$kat[id_kategori]"; ?>"><?php echo $kat['nm_kategori'] ?></option>
                                        <?php }  ?>
                                    </select>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nama Penerbit</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="penerbit" placeholder="">
                                     
                                 </div>
                             </div>
                             <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nomor Rak</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="nomor" placeholder="">
                                     
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Tahun Terbit</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="tahun" placeholder="">
                                 </div>
                             </div>                                                          
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>

                                 <div class="col-sm-5">
                                     <input type="text" class="form-control" name="stok" placeholder="">
                                 </div>
                             </div>                             
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>

                                 <div class="col-sm-5">
                                     <input type="file" class="form-control" name="foto" placeholder="">
                                 </div>
                             </div>                             
                         </div>
                         <!-- /.box-body -->


                         <div class="modal-footer">
                             <a href="index.php?module=data_bayi" type="button" class="btn btn-danger pull-left">Kembali</a>
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
    session_start();
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $kelas = $_POST['kelas'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    $tahun = $_POST['tahun']; 
    $stok = $_POST['stok'];
    $nomor = $_POST['nomor'];
    $tanggal= date('Y-m-d-H-i-s');
    $foto = $_FILES['foto']['name'];




    $x = explode('.', $foto);
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'foto/' . $foto);



    $sqlsimpanproduk = mysqli_query($koneksi, "INSERT INTO `tbl_buku`(`kd_buku`, `id_kategori`, `kelas`, `judul_buku`,`nomor_rak`, `nm_pengarang`, `nm_penerbit`, `tahun_terbit`, `stok`, `gambar`, `tglinput`) VALUES ('$kode','$kategori','$kelas','$judul','$nomor','$pengarang','$penerbit','$tahun','$stok','$foto','$tanggal')");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Di Simpan');</script>";
        echo "<script>location='index.php?module=data_buku';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?module=input_buku';</script>";
    }
}