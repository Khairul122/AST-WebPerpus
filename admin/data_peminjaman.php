<div class="content-wrapper">
<section class="content-header">
      <h1>
     DATA PEMINJAMAN
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
                  <th>Kode Sewa</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
        include'koneksi.php';
          $be = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman join tbl_anggota on tbl_peminjaman.id_anggota=tbl_anggota.id_anggota ");
          
          $no=1;
          while($r=mysqli_fetch_assoc($be)){
        ?>
        <tr>
          <td><?= $no; ?></td>         
          <td><?= $r["kd_sewa"];?></td>        
          <td><?= $r["nm_anggota"];?></td>        
          <td><?= $r["kelas"];?></td>        
          <td><?= $r["jumlah"];?></td>         
          <td><?= $r["tgl_pinjam"];?></td>         
          <td><?= $r["tgl_kembali"];?></td>          
          <td>
            <?php if($r['status'] == 'DI KEMBALIKAN') : ?>
              <button class="btn btn-xs btn-success" style="border-radius:2px;"><?php echo $r['status']; ?></button>
            <?php else : ?>
              <button class="btn btn-xs btn-danger" style="border-radius:2px;"><?php echo $r['status']; ?></button>
            <?php endif ; ?>      
          <td>
            <a  href="?module=detail_peminjaman&idjual=<?= $r['kd_sewa'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Detail Data</a>
           
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
