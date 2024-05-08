<div class="content-wrapper">
<section class="content-header">
      <h1>
     DATA PENGEMBALIAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengembalian</li>
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
                  <th>Kode Pengembalian</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jumlah</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
        include'koneksi.php';
        $a = $_SESSION['idadmin'];
          $be = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian join tbl_anggota on tbl_pengembalian.id_anggota=tbl_anggota.id_anggota WHERE tbl_pengembalian.id_anggota='$a'");
          
          $no=1;
          while($r=mysqli_fetch_assoc($be)){
        ?>
        <tr>
          <td><?= $no; ?></td>         
          <td><?= $r["kd_pengembalian"];?></td>        
          <td><?= $r["nm_anggota"];?></td>        
          <td><?= $r["kelas"];?></td>        
          <td><?= $r["jml_item"];?></td>        
          <td><?= $r["tanggal_kembali"];?></td>          
          <td>
            <?php if($r['status'] == 'DI KEMBALIKAN') : ?>
              <button class="btn btn-xs btn-success" style="border-radius:2px;"><?php echo $r['status']; ?></button>
            <?php else : ?>
              <button class="btn btn-xs btn-danger" style="border-radius:2px;"><?php echo $r['status']; ?></button>
            <?php endif ; ?>      
          <td>          
          <td>
            <a  href="?module=detail_pengembalian&idjual=<?= $r['kd_pengembalian'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Detail Data</a>
           
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
