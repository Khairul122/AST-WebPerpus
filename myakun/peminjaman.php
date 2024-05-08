<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Peminjaman
        </h1>

    </section>
<?php 
include 'koneksi.php';
    $a = date('Y-m-d-h-i-s');
    $krr = explode('-',$a);
    $idorder = implode("",$krr);

    $tanggal = date('Y-m-d');
    $t = date('Y-m-d', strtotime("+3 day",strtotime(date("Y-m-d"))));
?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<title>Peminjaman</title>
<legend> </legend>
    <div style="width:47%; float:left; border:0px solid #999; padding:5px;">
        <table class=''>
            <tr style="padding-bottom: 10px">
                <td>No. Peminjaman &nbsp;</td>
                <td>
                    <input type="text" class="form-control" name="no_sewa" value="P-<?= $idorder ?>" readonly>
                </td>
            </tr>
            <tr style="padding-bottom: 10px">
                <td>Tanggal Pinjam &nbsp;</td>
                <td>
                    <input class="form-control"  type="date" id="tgljual"  value="<?= $tanggal?>" readonly/>
                </td>
            </tr>
            <tr >
                <td>Tanggal Kembali &nbsp;</td>
                <td>
                    <input class="form-control"  type="date" id=""  value="<?= $t?>" readonly/>
                </td>
            </tr>
        </table>
    </div>
 
        <table style="clear:both; width:100%;" width="100%" class='table table-condensed'>
                <tr>
                </tr>
                    <tr>
                        <tr>
                            <td>Kode Buku</td> 
                            <td>Nama Buku</td> 
                            <td>Jumlah Pinjam</td>
                            <td>Pengarang</td>
                            <td>Tahun</td>
                            <td>Stok</td>
                            <td></td>
                        </tr>
                    </tr>
        <tr>
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data" name="frmBeli">
                    <td style="" class="col-sm-3">
                          <input type="text" class="form-control" name="kd_buku" id="kd_buku">
                    </td>
                    <td class="col-sm-3">
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="" disabled="disabled" />
                    </td>
                    <td class="col-sm-3">
                        <input class="form-control" type="number" id="jumlah_beli"  autocomplete="off"  onkeyup="cek_stok(this)" placeholder="qty" value="1" name="jumlah_beli" />
                    </td>

                    <td class="col-sm-6">
                        <input class="form-control" type="text" id="pengarang" name="pengarang" placeholder="" disabled="disabled" />
                    </td>

                    
                    <td class="col-sm-6">
                        <input class="form-control" type="text" id="tahun" name="tahun" placeholder="0"  style="width:100px;" readonly="" autocomplete="off" />
                    </td>

                    <td class="col-sm-6">
                        <input class="form-control" type="text" id="stok" name="stok" style="width:100px;" placeholder="0" disabled="disabled" />
                    </td>
                    <td >
                    <button id="simpanitem" name="tambahbarang" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> </button>
                    </td>
                </form>
            </tr>
        </table>

            <div style="overflow:auto; max-height:350px; margin:0px 0 0px 0;" >
                <fieldset>
                    <table class="data table table-bordered table-striped" id="barang_dijual">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Kelas</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                                $sqlt = mysqli_query($koneksi, "SELECT * FROM `tbl_pinjam_tmp` JOIN tbl_buku ON tbl_pinjam_tmp.kd_buku=tbl_buku.kd_buku WHERE id_pinjam");
                                $no = 1;
                                $tot = 0;
                                while ($dat = mysqli_fetch_array($sqlt)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dat['kd_buku']; ?></td>
                                        <td><?= $dat['judul_buku']; ?></td>
                                        <td><?= $dat['nm_pengarang']; ?></td>
                                        <td><?= $dat['nm_penerbit']; ?></td>
                                        <td><?= $dat['kelas']; ?></td>
                                        <td><?= $dat['jumlah']; ?></td>
                                        <td>
                                             <a href="hapus_pesan.php?id_pinjam=<?= $dat['id_pinjam'] ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>
                                             </a>
                                        </td>
                                    </tr>
                                    
                                <?php } ?>
                        </tbody>
                        
                    </table>
                </fieldset>
            </div>

            <div style="display:inline-table; vertical-align:top;">
                 <form class="form-horizontal" method="POST" action="">
                <table class='table table-condensed table-bordered'>
                    <tr>
                        <td>
                              <input type="hidden" class="form-control" name="id_anggota" value="<?=  $_SESSION['idadmin'] ?>" readonly>
                              <input type="hidden" class="form-control" name="no_sewa" value="P-<?= $idorder ?>" readonly>
                            <button type="submit" name="selesai" class="btn btn-info" style="margin-top: 5px"><i class=""></i>  Selesai</button>
                        </td>
                    </tr>
                </table>
                 </form>

            </div>
                </div>

            </div>

        </div>
    </section>
</div>


<script type="text/javascript" src="asset/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $('#kd_buku').on('input',function(){
                var kd_buku = $(this).val();
                $.ajax({
                    type : "post",
                    url  : "ajax/penjualan.php",
                    dataType : "json",
                    data : {kd_buku: kd_buku},
                    cache:false,
                    success: function(data){
                        $('[name="nama"]').val(data.judul_buku);
                        $('[name="pengarang"]').val(data.nm_pengarang);
                        $('[name="tahun"]').val(data.tahun_terbit);
                        $('[name="stok"]').val(data.stok);
                    }
                });
           });

        });

    </script>
<script type="text/javascript">
    function cek_stok(input) {
        stk = document.frmBeli.stok.value;
        jml = document.frmBeli.jumlah_beli.value;
        var num = input.value;
        var stok = eval(stk);
        var jumlah = eval(jml);
        if(stok < jumlah){
            alert('Jumlah Melebihi Stok, Kurangi Jumlah Meminjam');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>
<?php
include 'koneksi.php';
if (isset($_POST['tambahbarang'])) {
    $sqlkategori = mysqli_query($koneksi,"INSERT INTO `tbl_pinjam_tmp`(`kd_buku`, `jumlah`) VALUES ('$_POST[kd_buku]','$_POST[jumlah_beli]')");
    if ($sqlkategori) {
        echo "<script>location='index.php?module=peminjaman';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan');</script>";
        echo "<script>location='index.php?module=peminjaman';</script>";
    }
    
}

?>
<?php
include 'koneksi.php';
    if (isset($_POST['selesai'])) {
            $idorder = $_POST['no_sewa'];
            $id_anggota = $_POST['id_anggota'];
            $tglorg = date('Y-m-d');

            $t = date('Y-m-d', strtotime("+3 day",strtotime(date("Y-m-d"))));



            $keranjang = mysqli_query($koneksi,"SELECT *,sum(jumlah) AS jumlahjual FROM `tbl_pinjam_tmp`");
            $xx = mysqli_fetch_array($keranjang);
            $jumlah =  $xx['jumlahjual'];

            $sqltambahorder = mysqli_query($koneksi, "INSERT INTO `tbl_peminjaman`(`kd_sewa`, `id_anggota`, `jumlah`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES ('$idorder','$id_anggota','$jumlah','$tglorg','$t','Di Pinjam')");


            //mengamnil nilai no order
            $sqltampilorder = mysqli_query($koneksi, "SELECT `kd_sewa` FROM `tbl_peminjaman` WHERE `id_anggota`='$id_anggota' and `jumlah`='$jumlah' AND `tgl_pinjam`='$tglorg'");
            $zz_id = mysqli_fetch_array($sqltampilorder);
            $idcartorder =  $zz_id['kd_sewa'];


            // ambil data cart
            $sqlkeranjang = mysqli_query($koneksi, "SELECT * FROM `tbl_pinjam_tmp` JOIN tbl_buku ON tbl_pinjam_tmp.kd_buku = tbl_buku.kd_buku");

            while ($ambilnilai = mysqli_fetch_array($sqlkeranjang)) {

                $sqltambahdetailorder = mysqli_query($koneksi, "INSERT INTO `tbl_pinjam_detail`(`kd_sewa`, `tanggal`, `kd_buku`, `jumlah_pinjam`) VALUES ('$idcartorder','$tglorg','$ambilnilai[kd_buku]','$ambilnilai[jumlah]')");


                $sqlp = mysqli_query($koneksi, "SELECT kd_buku,stok FROM tbl_buku WHERE kd_buku='$ambilnilai[kd_buku]'");
                $c_bl = mysqli_fetch_array($sqlp);
                
                $stk= ($c_bl['stok'] - $ambilnilai['jumlah']);
                if ($stk < 0) {
                    echo $stk;
                }else{
                    $aa = mysqli_query($koneksi, "UPDATE tbl_buku SET stok='$stk' WHERE kd_buku='$ambilnilai[kd_buku]'");
                }
            }
            if ($sqltambahdetailorder) {
                $hapus = mysqli_query($koneksi,"DELETE FROM `tbl_pinjam_tmp` WHERE 1");
            }else{
                 echo "<script>alert('Barang Succes');</script>";
                 echo "<script>location='index.php?module=orderdetail&idjual=$idcartorder';</script>";
            }
                 echo "<script>location='index.php?module=orderdetail&idjual=$idcartorder';</script>";
    }
