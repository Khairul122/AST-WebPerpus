<div class="content-wrapper">
<section class="content-header">
      <h1>
     DATA ANGGOTA
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Anggota</li>
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
                  <th>Tanggal Daftar</th>
                  <th>Nisn</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
        include'koneksi.php';
        include 'tglindo.php';
          $be = mysqli_query($koneksi, "SELECT * FROM tbl_anggota  ORDER BY tglreg asc");
          
          $no=1;
          while($r=mysqli_fetch_assoc($be)){
        ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= TanggalIndo($r["tglreg"]);?></td>          
          <td><?= $r["nis"];?></td>        
          <td><?= $r["nm_anggota"];?></td>         
          <td><?= $r["tgl_lahir"];?></td>         
          <td><?= $r["jenis_kelamin"];?></td>          
          <td><?= $r["kelas"];?></td>          
          <td><?= $r["alamat"];?></td>          
          <td>
            <a  href="?module=edit_anggota&id_anggota=<?= $r['id_anggota'];?>" class="btn btn-xs btn-primary" style="border-radius:2px;">Edit Data</a>
            <a onclick="return confirm('Are you sure you want to delete this Data?');" href="?module=hapus_anggota&id_anggota=<?= $r['id_anggota'];?>" class="btn btn-xs btn-danger">Delete Data</a> 
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
