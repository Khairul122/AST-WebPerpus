
<?php
include 'koneksi.php';
if (isset($_POST['tblcetak'])) {
    $tahun1 = $_POST['cetaktahun'];
    $bulan1 = $_POST['cetakbulan'];
    $bulan2 = $_POST['cetakbulan'];
} else {
    header("Location:index.php?module=laporan_penjualan_bulan");
}
$bulan2 = array(
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

<body onload="window.print()">
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
<center><h4>Laporan Peminjaman Perbulan<br>Bulan : <?php echo $bulan2[$bulan1]  ?> <?php echo $tahun1 ?></h3></h4></center>
    <table class="table table-bordered table-striped" border="1" align="center" style="width: 65%;" cellpadding="5" cellspacing="0">
        <thead>
            <td style="width: 5%">No</td>
            <td class="isilap">Tanggal</td>
            <td class="isilap">Jumlah Pinjam</td>
        </thead>
        <style type="text/css">
            .isilap {
                padding: 15px;
                width: 15%;
            }
        </style>

        <?php
            $no = 1;
                 $totalBayar = 0;
            $query = mysqli_query($koneksi, "SELECT *,sum(jumlah) as jml FROM tbl_peminjaman where month(tgl_pinjam)='$bulan1' and status='Di Pinjam' GROUP by day(tgl_pinjam)");
            while ($data = mysqli_fetch_array($query)) {
                ?>

                <tbody>
                    <td><?= $no++ ?></td>
                    <td><?php echo date('d-F-Y', strtotime($data['tgl_pinjam'])) ?></td>
                    <td><?php echo $data['jml'] ?></td>
                </tbody>

         <?php $totalBayar = $totalBayar + $data['jml']; ?>
    <?php } ?>
            <tfoot>
            <td colspan="2">TOTAL </td>
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
            ( ............... )<br />
        </td>
    </tr>
</table>
</body>