
<?php
include 'koneksi.php';
$idorder = $_GET['idjual'];
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian` join tbl_anggota on tbl_pengembalian.id_anggota=tbl_anggota.id_anggota WHERE tbl_pengembalian.id_anggota='$idorder'"));
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header" align="center">
                  <div class="row">
        <div style='margin-top:10px' align="center">
            <h3>
                SMKN 7 PADANG<br>
               Jl. Raya Padang Indarung, Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang<br>
                Prov. Sumatera Barat
            </h3>
            <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
        </div>
    </div><br>
             Laporan Pengembalian
            <!--   <small class="pull-right">Tanggal: <?= date('Y-m-d'); ?> </small> -->
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>
              Nama Anggota : <b><?= $sql['nm_anggota'] ?></b><br>
              Kelas  : <b><?= $sql['kelas'] ?></b><br>
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
                  <th>Tanggal </th>
                  <th>Kode Buku</th>
                  <th>Kategori Buku</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Jumlah Pinjam</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $total=0;
                $sqlorder = mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian_detail` JOIN `tbl_buku` ON tbl_pengembalian_detail.kd_buku = tbl_buku.kd_buku JOIN tbl_pengembalian ON tbl_pengembalian_detail.kd_pengembalian=tbl_pengembalian.kd_pengembalian  join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori WHERE tbl_pengembalian.id_anggota='$idorder'");
                while ($b = mysqli_fetch_array($sqlorder)) { 
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['tanggal_kembali'] ?></td>
                    <td><?= $b['kd_buku'] ?></td>
                    <td><?= $b['nm_kategori']?></td>
                    <td><?= $b['judul_buku'] ?></td>
                    <td><?= $b['nm_pengarang'] ?></td>
                    <td><?= $b['nm_penerbit']?></td>
                    <td><?= $b['tahun_terbit']?></td>
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
                        <div class="col-xs-11">
            <a href="" onclick="window.print()"class="btn btn-danger pull-right"><i class="fa fa-print"></i> Cetak</a>
          </div>
        </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </section>
    </div>
  </section>
</div>

?>
