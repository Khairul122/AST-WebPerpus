<div class="content-wrapper">
<section class="content-header">
      <h1>
     DATA BUKU
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data BUKU</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
             
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
        					<th>Aksi</th>
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
					<td>
						<!-- <a  href="?module=edit_buku&kd_buku=<?= $r['kd_buku'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Edit Data</a> -->
              <a  href="?module=detail_buku&kd_buku=<?= $r['kd_buku'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Detail Data</a>
						<a onclick="return confirm('Are you sure you want to delete this Data?');" href="?module=hapus_buku&kd_buku=<?= $r['kd_buku'];?>">
					</td>
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
