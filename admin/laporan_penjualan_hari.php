<?php
include 'koneksi.php'; 
include 'tglindo.php';
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Peminjaman Perhari</h3><br>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>

                <tr>
                  <th colspan="7">
                    <form method="POST">
                      <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>">
                      <button class="btn btn-warning" type="submit" name="lihatlaporan"><i class="fa fa-eye"></i> Lihat</button>
                    </form>
                  </th>
                </tr>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Kode Pinjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Jumlah Pinjam</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (isset($_POST['lihatlaporan'])) {
                  $no = 1;
                  $tanggal = $_POST['tanggal'];
                    $a = mysqli_query($koneksi, "SELECT * FROM `tbl_peminjaman` join tbl_anggota on tbl_peminjaman.id_anggota=tbl_anggota.id_anggota  WHERE tgl_pinjam='$tanggal' AND status='Di Pinjam'");
                    
                  while ($tampilkategori = mysqli_fetch_array($a)) {
                    ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $tampilkategori['kd_sewa'] ?></td>
                      <td><?= TanggalIndo($tampilkategori['tgl_pinjam']) ?></td>
                      <td><?= $tampilkategori['jumlah'] ?></td>
                      <td><?= $tampilkategori['status'] ?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="7">
                      <form method="POST" action="cetak_penjualan_hari.php"  target="_BLANK">
                        <input type="hidden" name="cetaktanggal" value="<?= $tanggal ?>"> <button name="tblcetak"  class="btn btn-danger btn-xs"><i class="fa fa-print"></i> Cetak Laporan</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>