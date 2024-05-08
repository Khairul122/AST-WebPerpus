<?php
	include 'koneksi.php';
	$id = $_GET['id_pinjam'];

	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_pinjam_tmp` WHERE id_pinjam='$id'");
	if ($sqlhapus) {
		echo "<script>alert('Berhasil Dihapus');</script>";
		echo "<script>location='index.php?module=peminjaman';</script>";
}