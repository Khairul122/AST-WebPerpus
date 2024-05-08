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
              <h3 class="box-title">Data Peminjaman Perbulan</h3><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th colspan="7">
                    <form method="POST">
                    <select name="bulan">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select name="tahun">
                      <?php 
                          $v = date('Y');
                          for ($i=2019; $i <= $v; $i++) { 
                            if ($i == $v) {?>
                              <option value="<?= $i ?>" selected="selected"><?= $i ?></option>
                             <?php }else{  ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                      <?php }} ?>
                    </select>
                    <button class="btn btn-warning btn-xs" type="submit" name="lihatlaporan">Lihat Data</button>
                    </form>
                  </th>
                </tr>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Kode Pinjam</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($_POST['lihatlaporan'])) {
                  $no = 1;
                  $tahun = $_POST['tahun'];
                  $bulan = $_POST['bulan'];
                  $a= mysqli_query($koneksi,"SELECT * FROM `tbl_peminjaman`  WHERE YEAR(tgl_pinjam) ='$tahun' AND MONTH(tgl_pinjam) ='$bulan' and status='Di Pinjam'");

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
                    <form method="POST" action="cetak_penjualan_bulan.php" target="_BLANK">
                    <input type="hidden" name="cetaktahun" value="<?= $tahun ?>">
                    <input type="hidden" name="cetakbulan" value="<?= $bulan ?>"> <button name="tblcetak" class="btn btn-danger btn-xs"> Cetak Laporan</button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
</div>
                  </section>
                  </div>