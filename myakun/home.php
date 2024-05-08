 <?php
include "koneksi.php";
  $a = $_SESSION['idadmin'];
$sqlp = mysqli_query($koneksi,"SELECT * FROM tbl_peminjaman where id_anggota='$a' ");
$jmll = 0;
while($rm = mysqli_fetch_array($sqlp)){
  $jmll++;
}
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_buku ");
$jmlt = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmlt++;
}


?>

<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="small-box bg-yellow">

                <div class="inner">
                  <h3 align="center">"SELAMAT DATANG DI SISTEM INFORMASI E-LIBRARY<br> SMAN 1 SUTER"</h3>
                </div>
                <div class="icon">
               
                </div>
               
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-red">

                <div class="inner">
                  <h3><?= $jmll ?></h3>
                  <p>DATA PEMINJAMAN</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="?module=data_peminjaman" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-green">

                <div class="inner">
                  <h3><?= $jmlt ?></h3>
                  <p>DATA BUKU</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="?module=data_buku" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
		</div>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="chart" id="bar-chart" style="height: 300px; width: 100%;"></div>
        </div>
    </div>

	</section>
</div>

<link rel="stylesheet" href="assets/a/morris/morris.css">
<script src="assets/a/jquery.min.js"></script>
<script src="assets/a/raphael.min.js"></script>
<script src="assets/a/morris/morris.min.js"></script>
