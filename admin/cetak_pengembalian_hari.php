<?php
include 'koneksi.php';
include 'tglindo.php';
if (isset($_POST['tblcetak'])) {
  $tanggal1 = $_POST['cetaktanggal'];
} else {
  header("Location: index.php?module=laporan_pengembalian_hari");
}
?>

<body>
    <div class="row">
        <div style='margin-top:10px' align="center">
            <h3>
                SMKN 7 PADANG<br>
               Jl. Raya Padang Indarung, Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang<br>
                Prov. Sumatera Barat
            </h3>
            <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
        </div>
    </div>
<center><h4>Laporan Pengembalian Perhari<br>Tanggal :<?php echo TanggalIndo($tanggal1) ?></h4></center>
    <table class="table table-bordered table-striped" border="1" align="center" style="width: 65%;" cellpadding="5" cellspacing="0">
        <thead>
            <td style="width: 5%">No</td>
            <td>Kode Pengembalian</td>
            <td>Judul Buku</td>
            <td>Jumlah Kembali</td>
        </thead>
        <?php
                $no = 1;
                  $totalBayar = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian_detail` JOIN `tbl_buku` ON tbl_pengembalian_detail.kd_buku = tbl_buku.kd_buku JOIN tbl_pengembalian ON tbl_pengembalian_detail.kd_pengembalian=tbl_pengembalian.kd_pengembalian  join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori join tbl_anggota on tbl_pengembalian.id_anggota=tbl_anggota.id_anggota where tanggal_kembali='$tanggal1' and status='DI KEMBALIKAN'  GROUP by tbl_pengembalian.kd_pengembalian");
                while ($data = mysqli_fetch_array($query)) {
                     ?>
                <tbody>
                    <td><?= $no++ ?></td>
                    <td><?php echo $data['kd_pengembalian'] ?></td>
                    <td><?php
                                $queryPLB = mysqli_query($koneksi, "SELECT * FROM `tbl_pengembalian_detail` JOIN `tbl_pengembalian` ON tbl_pengembalian_detail.kd_pengembalian=tbl_pengembalian.kd_pengembalian WHERE tbl_pengembalian.tanggal_kembali ='$data[tanggal_kembali]' and tbl_pengembalian_detail.kd_pengembalian='$data[kd_pengembalian]'");

                                  while ($dataLB = mysqli_fetch_array($queryPLB)) {
                                    $queryB = mysqli_query($koneksi, "SELECT * FROM `tbl_buku` WHERE kd_buku = '$dataLB[kd_buku]'");
                                    $dataB = mysqli_fetch_array($queryB);
                                    
                                    echo "<li>" . $dataB['judul_buku'] . "</li>";
                                }
                                ?></td>
                    <td><?php echo $data['jml_item'] ?></td>
                </tbody>
          <?php $totalBayar = $totalBayar + $data['jml_item']; ?>
    <?php } ?>
            <tfoot>
            <td colspan="3">TOTAL </td>
            <td><?php echo ($totalBayar) ?> Buku</td>
        </tfoot>
    </table>
</body>
<br />
<table width=65% align="center">
    <tr>
        <td colspan="2"></td>
        <td width="286"></td>
    </tr>
    <tr>
        <td width="230" align="center"> <br>
        </td>
        <td width="530"></td>

        <td align="center"><?php
                            $bulan = array(
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            );
                            ?>

            Padang, <?php echo date('d') . ' ' . ($bulan[date('m')]) . ' ' . date('Y') ?></td>
    </tr>
    <tr>
        <td align="center"><br /><br /><br /><br /><br />
            <br /><br /><br /></td>
        <td>&nbsp;</td>
        <td align="center" valign="top"><br /><br /><br /><br />
            ( .............. )<br />
        </td>
    </tr>


</table>
</body>
