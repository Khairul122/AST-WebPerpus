
<?php
include 'koneksi.php';
$idorder = $_GET['idjual'];
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian` WHERE kd_pengembalian='$idorder'"));
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-book"></i> Detail Pengembalian
              <small class="pull-right">Tanggal: <?= date('Y-m-d'); ?> </small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>
              No Pengembalian : <b><?= $sql['kd_pengembalian'] ?></b><br>
            </h4>
          </div>
          <!-- /.col -->
          <div class="col-sm-8 invoice-col">
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Kelas</th>
                  <th>Kategori</th>
                  <th>Pengarang</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $total=0;
                $sqlorder = mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian_detail` JOIN `tbl_buku` ON tbl_pengembalian_detail.kd_buku = tbl_buku.kd_buku JOIN tbl_pengembalian ON tbl_pengembalian_detail.kd_pengembalian=tbl_pengembalian.kd_pengembalian  join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori WHERE tbl_pengembalian.kd_pengembalian = '$idorder'");
                while ($b = mysqli_fetch_array($sqlorder)) { 
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['kd_buku'] ?></td>
                    <td><?= $b['judul_buku'] ?></td>
                    <td><?= $b['kelas'] ?></td>
                    <td><?= $b['nm_kategori']?></td>
                    <td><?= $b['nm_pengarang']?></td>
                    <td><?= $b['jumlah_kembali']?></td>
                  </tr>
                  
                <?php }  ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
          </div>
          <!-- /.col -->
          <div class="col-xs-12">
            <div class="table-responsive">
            </div>
          </div>
          <!-- /.col -->
        </div>
      </section>
    </div>
  </section>
</div>

?>
