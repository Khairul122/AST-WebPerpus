<div class="content-wrapper">
<section class="content-header">
      <h1>
     Daftar Peminjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Peminjaman</li>
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
                  <th>Nama Anggota</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
        include'koneksi.php';
          $be = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian join tbl_anggota on tbl_pengembalian.id_anggota=tbl_anggota.id_anggota where tbl_pengembalian.status='DI KEMBALIKAN' GROUP BY tbl_pengembalian.id_anggota");
          
          $no=1;
          while($r=mysqli_fetch_assoc($be)){
        ?>
        <tr>
          <td><?= $no; ?></td>        
          <td><?= $r["nm_anggota"];?></td>        
          <td><?= $r["kelas"];?></td>       
          <td>
            <a  href="?module=cetak_pengembalian_peranggota&idjual=<?= $r['id_anggota'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Cetak Laporan</a>
           
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
