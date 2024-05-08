<?php
include 'koneksi.php';
	if (isset($_POST['selesai'])) {
			$idorder = $_POST['faktur'];
			$tglorg = date('Y-m-d');
			$totalbayar = $_POST['total'];
			$bayar = $_POST['bayar'];
			$kembalian = $_POST['kembalian'];

			$keranjang = mysqli_query($koneksi,"SELECT *,sum(jumlah) AS jumlahjual FROM `tbl_cart_jual`");
			$xx = mysqli_fetch_array($keranjang);
			$jumlah =  $xx['jumlahjual'];

			$sqltambahorder = mysqli_query($koneksi, "INSERT INTO `tbl_penjualan` (`no_faktur`, `tanggal`,`jumlah_jual`, `total_bayar`, `bayar`, `kembalian`) VALUES ('$idorder', '$tglorg', '$jumlah','$totalbayar', '$bayar','$kembalian')");


			//mengamnil nilai no order
			$sqltampilorder = mysqli_query($koneksi, "SELECT `no_faktur` FROM `tbl_penjualan` WHERE `total_bayar`='$totalbayar' AND `tanggal`='$tglorg'");
			$zz_id = mysqli_fetch_array($sqltampilorder);
			$idcartorder =  $zz_id['no_faktur'];


			// ambil data cart
			$sqlkeranjang = mysqli_query($koneksi, "SELECT * FROM `tbl_cart_jual` JOIN tbl_barang ON tbl_cart_jual.kode_barang = tbl_barang.kode_barang");

			while ($ambilnilai = mysqli_fetch_array($sqlkeranjang)) {
				$subtotal = $ambilnilai['harga_jual']*$ambilnilai['jumlah'];

				$sqltambahdetailorder = mysqli_query($koneksi, "INSERT INTO `tbl_jualdetail`(`no_faktur`, `kode_barang`, `jumlah_jual`, `subtotal`) VALUES ('$idcartorder','$ambilnilai[kode_barang]','$ambilnilai[jumlah]','$subtotal')");

				$sqlp = mysqli_query($koneksi, "SELECT kode_barang,stok,stok_terjual FROM tbl_barang WHERE kode_barang='$ambilnilai[kode_barang]'");
				$c_bl = mysqli_fetch_array($sqlp);
				
				$stk= ($c_bl['stok'] - $ambilnilai['jumlah']);
				if ($stk < 0) {
					echo $stk;
				}else{
					$aa = mysqli_query($koneksi, "UPDATE tbl_barang SET stok='$stk' WHERE kode_barang='$ambilnilai[kode_barang]'");
				}

				$stok_jual= ($c_bl['stok_terjual'] + $ambilnilai['jumlah']);
				if ($stok_jual < 0) {
					echo $stok_jual;
				}else{
					$stk_jual = mysqli_query($koneksi, "UPDATE tbl_barang SET stok_terjual='$stok_jual' WHERE kode_barang='$ambilnilai[kode_barang]'");
				}
			}
			if ($sqltambahdetailorder) {
				$hapus = mysqli_query($koneksi,"DELETE FROM `tbl_cart_jual` WHERE 1");
			}else{
				 echo "<script>alert('Barang Succes');</script>";
       			 echo "<script>location='index.php?page=orderdetail&idjual=$idcartorder';</script>";
			}
       			 echo "<script>location='index.php?page=orderdetail&idjual=$idcartorder';</script>";
	}

		if (isset($_POST['pesanbarang'])) {
			$idpesan = $_POST['nota'];
			$tglorg = date('Y-m-d');
			$totalbayar = $_POST['total'];
			$supplier = $_POST['supplier'];

			$keranjang = mysqli_query($koneksi,"SELECT *,sum(jumlah) AS jumlahjual FROM `tbl_cart_pesan`");
			$xx = mysqli_fetch_array($keranjang);
			$jumlah =  $xx['jumlahjual'];

			$sqltambahorder = mysqli_query($koneksi, "INSERT INTO `tbl_pemesanan` (`no_nota`, `tanggal`,`jumlah_pesan`, `total_harga`,`kode_supplier`) VALUES ('$idpesan', '$tglorg', '$jumlah','$totalbayar','$supplier')");



			//mengamnil nilai no order
			$sqltampilorder = mysqli_query($koneksi, "SELECT `no_nota` FROM `tbl_pemesanan` WHERE `total_harga`='$totalbayar' AND `tanggal`='$tglorg'");
			$zz_id = mysqli_fetch_array($sqltampilorder);
			$idbeli =  $zz_id['no_nota'];


			// ambil data cart
			$sqlkeranjang = mysqli_query($koneksi, "SELECT * FROM `tbl_cart_pesan` JOIN tbl_barang ON tbl_cart_pesan.kode_barang = tbl_barang.kode_barang");
			while ($ambilnilai = mysqli_fetch_array($sqlkeranjang)) {
				$subtotal = $ambilnilai['harga_beli']*$ambilnilai['jumlah'];
				$sqltambahdetailorder = mysqli_query($koneksi, "INSERT INTO `tbl_detailpesan`(`no_nota`, `kode_barang`, `jumlah`, `subtotal`) VALUES ('$idbeli','$ambilnilai[kode_barang]','$ambilnilai[jumlah]','$subtotal')");
				$sqlp = mysqli_query($koneksi, "SELECT kode_barang,stok FROM tbl_barang WHERE kode_barang='$ambilnilai[kode_barang]'");
				$c_bl = mysqli_fetch_array($sqlp);
				$stk= $c_bl['stok'] + $ambilnilai['jumlah'];
				if ($stk < 0) {
					echo $stk;
				}else{
					$aa = mysqli_query($koneksi, "UPDATE tbl_barang SET stok='$stk' WHERE kode_barang='$ambilnilai[kode_barang]'");
				}
			}
			if ($sqltambahdetailorder) {
				$hapus = mysqli_query($koneksi, "DELETE FROM `tbl_cart_pesan` WHERE 1");
			}
			else{
				 echo "<script>alert('Barang Succes');</script>";
       			 echo "<script>location='index.php?page=beli_detail&idjual=$idbeli';</script>";
			}
       			 echo "<script>location='index.php?page=beli_detail&idjual=$idbeli';</script>";
	}
	
?>