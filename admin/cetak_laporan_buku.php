<script>
    window.print();
</script>


<?php 
include "koneksi.php";
$laporan= mysqli_query($koneksi,"SELECT * FROM tbl_buku join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori");
$no=1;
$tot=0;
?>
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
<p align="center">LAPORAN DATA STOK BUKU <br>Tanggal : <?= date('d-m-Y') ?></p>
<table class="table-bordered table table-striped " border="1" cellspacing="0" cellpadding="5" align="center"
    width="100%%">
    <tr style="background-color: #d2d6de;">
        <th>No</th>
        <th>Kode Buku</th>
        <th>Kategori Buku</th>
        <th>Nomor Rak</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Kelas</th>
        <th>Jumlah</th>
    </tr>
    <?php
    $totalBayar = 0;
        while ($r = mysqli_fetch_array($laporan)){ 
        ?>
    <tr>
        <td align="center"><?= $no++ ?></td>
        <td><?= $r["kd_buku"];?></td>         
        <td><?= $r["nm_kategori"];?></td>         
        <td><?= $r["nomor_rak"];?></td>         
        <td><?= $r["judul_buku"];?></td>        
        <td><?= $r["nm_pengarang"];?></td>           
        <td><?= $r["nm_penerbit"];?></td>          
        <td><?= $r["tahun_terbit"];?></td>        
        <td><?= $r["kelas"];?></td>        
        <td><?= $r["stok"];?></td>  
    </tr>
     <?php $totalBayar = $totalBayar + $r['stok']; ?>
    <?php } ?>
            <tfoot>
            <td align="center" class="totalse" colspan="9">JUMLAH STOK</td>
            <td align="center"><?php echo ($totalBayar) ?> Buku</td>
        </tfoot>
</table>
<br>
<br>
<table widht='600' align='right' style="padding-right:30px">
   <tr> <td align="center"><?php
                          $bulan = array(
                            '01' => 'JANUARI',
                            '02' => 'FEBRUARI',
                            '03' => 'MARET',
                            '04' => 'APRIL',
                            '05' => 'MEI',
                            '06' => 'JUNI',
                            '07' => 'JULI',
                            '08' => 'AGUSTUS',
                            '09' => 'SEPTEMBER',
                            '10' => 'OKTOBER',
                            '11' => 'NOVEMBER',
                            '12' => 'DESEMBER',
                          );
                          ?>

        Padang, <?php echo date('d') . ' ' . (strtolower($bulan[date('m')])) . ' ' . date('Y') ?></td>
    </tr>
    <tr>
        <td></br><br/></td>
    </tr>
    <tr>
        <td align="right">( .............. )</td>
    </tr>
</table>
</body>