<?php
	include 'koneksi.php';
	$id = $_GET['id_kategori'];

	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_kategori` WHERE id_kategori='$id'");
	if ($sqlhapus) {
		echo "<script>alert('Berhasil Dihapus');</script>";
		echo "<script>location='index.php?module=data_kategori';</script>";
}