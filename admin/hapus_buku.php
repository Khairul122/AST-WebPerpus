<?php
	include 'koneksi.php';
	$id = $_GET['kd_buku'];

	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_buku` WHERE kd_buku='$id'");
	if ($sqlhapus) {
		echo "<script>alert('Berhasil Dihapus');</script>";
		echo "<script>location='index.php?module=data_buku';</script>";
}