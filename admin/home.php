 <?php
include "koneksi.php";
$sqlp = mysqli_query($koneksi,"SELECT * FROM tbl_anggota");
$jmll = 0;
while($rm = mysqli_fetch_array($sqlp)){
  $jmll++;
}
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_buku ");
$jmlt = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmlt++;
}
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_peminjaman");
$jmlg = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmlg++;

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
                  <h3 align="center">"SELAMAT DATANG DI DIGITAL LIBRARY<br> SMKN 7 PADANG"</h3>
                </div>
                <div class="icon">
               
                </div>
               
              </div>
            </div>

            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-red">

                <div class="inner">
                  <h3><?= $jmll ?></h3>
                  <p>DATA ANGGOTA</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="?module=data_anggota" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-green">

                <div class="inner">
                  <h3><?= $jmlt ?></h3>
                  <p>DATA BUKU</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="?module=data_buku" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-aqua">

                <div class="inner">
                  <h3><?= $jmlg ?></h3>
                  <p>DATA PEMINJAMAN</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="?module=data_peminjaman" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
