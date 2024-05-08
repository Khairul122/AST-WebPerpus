<?php 
include 'koneksi.php';
    $a = date('Y-m-d-h-i-s');
    $krr = explode('-',$a);
    $id_kembali = implode("",$krr);

    $tanggal = date('Y-m-d');
?>
<?php
include 'koneksi.php';
    if (isset($_POST['selesai'])) {
            $idorder = $_POST['no_sewa'];
            $id_kembali = $_POST['id_kembali'];
            $id_anggota = $_POST['id_anggota'];
            $tgl = $_POST['tgl'];
            $tglorg = date('Y-m-d');

            $tanggal1 = new DateTime($tgl);
            $tanggal2 = new DateTime($tglorg);
            $denda = 0;
            $perbedaan = 0;

            if($tanggal2 > $tanggal1)
            {
              $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
              $denda = $perbedaan * 1000;
            }

            $keranjang = mysqli_query($koneksi,"SELECT * FROM tbl_peminjaman where kd_sewa='$idorder'");
            $xx = mysqli_fetch_array($keranjang);
            $jumlah =  $xx['jumlah'];

            $sqltambahorder = mysqli_query($koneksi, "INSERT INTO `tbl_pengembalian`(`kd_pengembalian`, `tanggal_kembali`, `id_anggota`, `kd_sewa`, `jml_item`, `telat`, `denda`, `status`) 

              VALUES ('$id_kembali','$tglorg','$id_anggota','$idorder','$jumlah','$perbedaan','$denda','DI KEMBALIKAN')");


            //mengamnil nilai no order
            $sqltampilorder = mysqli_query($koneksi, "SELECT `kd_sewa`,`kd_pengembalian` FROM `tbl_pengembalian` WHERE `id_anggota`='$id_anggota' and `jml_item`='$jumlah' AND `tanggal_kembali`='$tglorg'");

            $zz_id = mysqli_fetch_array($sqltampilorder);
            $idcartorder =  $zz_id['kd_sewa'];
            $kd_pengembalian =  $zz_id['kd_pengembalian'];


            // ambil data cart
            $sqlkeranjang = mysqli_query($koneksi, "SELECT * FROM `tbl_pinjam_detail` JOIN tbl_buku ON tbl_pinjam_detail.kd_buku = tbl_buku.kd_buku where tbl_pinjam_detail.kd_sewa='$idorder'");

            while ($ambilnilai = mysqli_fetch_array($sqlkeranjang)) {

                $sqltambahdetailorder = mysqli_query($koneksi,"INSERT INTO `tbl_pengembalian_detail`(`kd_pengembalian`, `kd_sewa`, `tanggal`, `kd_buku`, `jumlah_kembali`)

                 VALUES 

                  ('$kd_pengembalian','$idcartorder','$tglorg','$ambilnilai[kd_buku]','$ambilnilai[jumlah_pinjam]')");


                $sqlp = mysqli_query($koneksi, "SELECT kd_buku,stok FROM tbl_buku WHERE kd_buku='$ambilnilai[kd_buku]'");
                $c_bl = mysqli_fetch_array($sqlp);
                
                $stk= ($c_bl['stok'] + $ambilnilai['jumlah_pinjam']);
                if ($stk < 0) {
                    echo $stk;
                }else{
                    $aa = mysqli_query($koneksi, "UPDATE tbl_buku SET stok='$stk' WHERE kd_buku='$ambilnilai[kd_buku]'");
                }
            }
            if ($sqltambahdetailorder) {
               $aa = mysqli_query($koneksi, "UPDATE `tbl_peminjaman` SET `status`='DI KEMBALIKAN' WHERE `kd_sewa`='$idorder'");
            }else{
                  echo "<script>alert('Data Di Simpan');</script>";
                  echo "<script>location='index.php?module=data_peminjaman';</script>";
            }
                  echo "<script>location='index.php?module=data_peminjaman';</script>";
    }
?>

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
              <small class="pull-right">Tanggal: <?= date('Y-m-d'); ?> </small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>
              No Peminjaman : <b><?= $sql['kd_sewa'] ?></b><br>
              Tanggal Pinjam: <?= $sql['tgl_pinjam']; ?> <br>
              Tanggal Kembali : <?= $sql['tgl_kembali']; ?>
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
          <div class="col-xs-12">
            <div class="table-responsive">
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <form action="" method="post">
            <td>
                  
                    <input type="hidden" class="form-control" name="no_sewa" value="<?= $idorder ?>" readonly>
                    <input type="hidden" class="form-control" name="id_kembali" value="F-<?= $id_kembali ?>" readonly>
                    <input type="hidden" class="form-control" name="id_anggota" value="<?= $sql['id_anggota'] ?>" readonly>
                    <input type="hidden" class="form-control" name="tgl" value="<?= $sql['tgl_kembali'] ?>" readonly>
                            <button type="submit" name="selesai" class="btn btn-info" style="margin-top: 5px"><i class=""></i>  KEMBALIKAN</button>
                        </td>
                        </form>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>

?>
