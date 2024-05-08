<?php
include 'koneksi.php';
$idorder = $_GET['idjual'];
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_peminjaman` WHERE kd_sewa='$idorder'"));
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-book"></i> Detail Peminjaman
              <small class="pull-right">Tanggal Pinjam: <?= $sql['tgl_pinjam']; ?> / Tanggal Kembali : <?= $sql['tgl_kembali']; ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>
              No Peminjaman : <b><?= $sql['kd_sewa'] ?></b><br>
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
                $sqlorder = mysqli_query($koneksi, "SELECT * FROM `tbl_pinjam_detail` JOIN `tbl_buku` ON tbl_pinjam_detail.kd_buku = tbl_buku.kd_buku JOIN tbl_peminjaman ON tbl_pinjam_detail.kd_sewa=tbl_peminjaman.kd_sewa  join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori WHERE tbl_peminjaman.kd_sewa = '$idorder'");
                while ($b = mysqli_fetch_array($sqlorder)) { 
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['kd_buku'] ?></td>
                    <td><?= $b['judul_buku'] ?></td>
                    <td><?= $b['kelas'] ?></td>
                    <td><?= $b['nm_kategori']?></td>
                    <td><?= $b['nm_pengarang']?></td>
                    <td><?= $b['jumlah_pinjam']?></td>
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
<!--           <div class="col-xs-12">
            <div class="table-responsive">
            <table style='width:75%; font-size:15pt;' cellspacing='2' border="0">
                <tr>
                    <td align='center'>Tanda Terima,</br></br><u>( ............. )</u></td>
                    <td></td>
                    <td align='center'>Hormat Kami,</br></br><u>( ............... )</u></td>
                </tr>
            </table>
            </div>
          </div> -->
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="" onclick="window.print()"class="btn btn-danger pull-right"><i class="fa fa-print"></i> Cetak</a>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>