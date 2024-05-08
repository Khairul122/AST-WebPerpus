<?php
include 'koneksi.php';

if (isset($_POST['cetaktahun'])) {
   $tahun = $_POST['cetaktahun'];
}else{
}
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
<center><h4>Laporan Pengembalian Pertahun <br>Tahun : <?php echo $tahun ?></h3></h4></center>
 <table class="table table-bordered table-striped" border="1" align="center" style="width: 65%;" cellpadding="5" cellspacing="0">
        <thead>
            <td style="width: 5%">No</td>
            <td class="isilap">Bulan</td>
            <td class="isilap">Jumlah Kembali</td>
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
            $query = mysqli_query($koneksi, "SELECT *, sum(jml_item) as jm, MONTH(tanggal_kembali)AS bln FROM tbl_pengembalian where year(tanggal_kembali)='$tahun' and status='DI KEMBALIKAN'  GROUP by day(tanggal_kembali)");
            while ($data = mysqli_fetch_array($query)) { 
            if($data['bln']=="1"){
              $bulan = "Januari";
            }else if($data['bln']=="2"){
              $bulan = "Februari";
            }else if($data['bln']=="3"){
              $bulan = "Maret";
            }else if($data['bln']=="4"){
              $bulan = "April";
            }else if($data['bln']=="5"){
              $bulan = "Mei";
            }else if($data['bln']=="6"){
              $bulan = "Juni";
            }else if($data['bln']=="7"){
              $bulan = "Juli";
            }else if($data['bln']=="8"){
              $bulan = "Agustus";
            }else if($data['bln']=="9"){
              $bulan = "September";
            }else if($data['bln']=="10"){
              $bulan = "Oktober";
            }else if($data['bln']=="11"){
              $bulan = "November";
            }else if($data['bln']=="12"){
              $bulan = "Desember";
            }

              ?>



                <tbody>
                    <td><?= $no++ ?></td>
                     <td><?= $bulan ?></td>

                    <td><?php echo $data['jm'] ?></td>
                </tbody>


                  <?php $totalBayar = $totalBayar + $data['jm']; ?>
    <?php } ?>
            <tfoot>
            <td colspan="2">TOTAL </td>
            <td><?php echo ($totalBayar) ?> Buku</td>
        </tfoot>
    </table>
  <table width=80% align="center">
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
      <td align="center"><br /><br /><br /><br /><br />
        <br /><br /><br /></td>
      <td>&nbsp;</td>
      <td align="center" valign="top"><br /><br /><br /><br /><br />
        ( ............... )<br />
      </td>
    </tr>


  </table>
</body>