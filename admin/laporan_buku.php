<div class="content-wrapper">
<section class="content-header">
      <h1>
    LAPORAN DATA BUKU
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA BUKU</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <a href="cetak_laporan_buku.php" target="_BLANK" class="btn btn-success btn-sm pull-right">Cetak Laporan</a>
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
        					<th>Kategori</th>
                  <th>Kelas</th>
                  <th>Penerbit</th>
        					<th>Stok</th>
                </tr>
                </thead>
                <tbody>
				<?php
        include'koneksi.php';
        include 'tglindo.php';
					$be = mysqli_query($koneksi, "SELECT * FROM tbl_buku join tbl_kategori on tbl_buku.id_kategori=tbl_kategori.id_kategori");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>        
          <td><?= $r["kd_buku"];?></td>        
          <td><?= $r["judul_buku"];?></td>         
          <td><?= $r["nm_kategori"];?></td>         
          <td><?= $r["kelas"];?></td>          
          <td><?= $r["nm_penerbit"];?></td>         
					<td><?= $r["stok"];?></td>					
				</tr>
					<?php $no++; } ?>
				</tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
          </div>
     </section>
</div>
