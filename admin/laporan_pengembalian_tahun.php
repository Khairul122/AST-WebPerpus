<?php 
include 'koneksi.php';
include 'tglindo.php' ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengembalian Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th colspan="7">
                    <form method="POST">
                    <!-- <input type="date" name="tanggal" value="">   -->
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
                    <button class="btn btn-warning btn-xs" type="submit" name="lihatlaporan"> Lihat Data</button>
                    </form>
                  </th>
                </tr>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Kode Pengembalian</th>
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
                    $a= mysqli_query($koneksi,"SELECT * FROM `tbl_pengembalian`  WHERE YEAR(tanggal_kembali)='$tahun'  and status='DI KEMBALIKAN'");
                  while ($tampilkategori = mysqli_fetch_array($a)) {
                ?>
                <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $tampilkategori['kd_pengembalian'] ?></td>
                      <td><?= TanggalIndo($tampilkategori['tanggal_kembali']) ?></td>
                      <td><?= $tampilkategori['jml_item'] ?></td>
                      <td><?= $tampilkategori['status'] ?></td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="7">
                    <form method="POST" action="cetak_pengembalian_tahun.php" target="_BLANK">
                    <input type="hidden" name="cetaktahun" value="<?= $tahun ?>"> <button name="tblcetak" class="btn btn-danger btn-xs"><i class="fa fa-print"></i> Cetak Laporan</button>
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