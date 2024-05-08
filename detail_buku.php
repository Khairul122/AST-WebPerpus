  <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Detail Buku
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- /.col -->
        <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php
                include 'koneksi.php';
                $idorder = $_GET['kd_buku'];
                $sql = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_buku join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori WHERE tbl_buku.kd_buku='$idorder'"));
                ?>
            </ul>
            <div class="tab-content">
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="nopen" value="<?= $sql['kd_buku'] ?>">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="admin/foto/<?= $sql['gambar'] ?>" alt="user image">
                        <span class="username">
                          <a href="#">Kode  Buku : <?= $sql['kd_buku'] ?></a>
                          
                        </span>
                  </div>
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">JUDUL BUKU</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['judul_buku']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">KELAS</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['kelas']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">KATEGORI</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['nm_kategori']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">PENGARANG</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['nm_pengarang']; ?></p>
                    </div>
                  </div> <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">PENERBIT</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['nm_penerbit']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">TAHUN</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['tahun_terbit']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">STOK</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?= $sql['stok']; ?></p>
                    </div>
                  </div>  
                                    <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">GAMBAR</label>
                    </div>
                    <div class="col-sm-9">
                      <img style="width: 300px;height: 300px" src="admin/foto/<?= $sql['gambar'] ?>" alt="user image">
                    </div>
                     <a  href="index.php" class="btn btn-xs btn-danger">Kembali</a> 
                  </div>                   
                </div>
            </form>
            </div>
       
<!-- BATAS DATA SISWA -->


              <!-- /.tab-pane -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include 'koneksi.php';
if (isset($_POST['diterima'])) {
   $nopen = $_POST['nopen'];
   $sqlupdate = mysqli_query($koneksi, "UPDATE `tbl_pendaftar` SET `status_kelulusan`='LULUS'  WHERE no_pendaftran='$nopen'");
   if ($sqlupdate) {
      echo "<script>alert('Data Diubah');</script>";
      echo "<script>location='index.php?page=data_pendaftar';</script>";
   } else {
      echo "<script>alert('Data Tidak Bisa Diubah');</script>";
      echo "<script>location='index.php?page=data_pendaftar';</script>";
   }
}
?>
<?php
include 'koneksi.php';
if (isset($_POST['ditolak'])) {
   $nopen = $_POST['nopen'];
   $sqlubah = mysqli_query($koneksi, "UPDATE `tbl_pendaftar` SET `status_kelulusan`='TIDAK LULUS'  WHERE no_pendaftran='$nopen'");
   if ($sqlubah) {
      echo "<script>alert('Data Diubah');</script>";
      echo "<script>location='index.php?page=data_pendaftar';</script>";
   } else {
      echo "<script>alert('Data Tidak Bisa Diubah');</script>";
      echo "<script>location='index.php?page=data_pendaftar';</script>";
   }
}