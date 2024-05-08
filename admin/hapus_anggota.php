<?php
	include 'koneksi.php';
	$id = $_GET['id_anggota'];

	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_anggota` WHERE id_anggota='$id'");
	if ($sqlhapus) {
		echo "<script>alert('Berhasil Dihapus');</script>";
		echo "<script>location='index.php?module=data_anggota';</script>";
	}
