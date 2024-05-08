<?php
include '../koneksi.php';

$kode_barang = $_POST['kode_barang'];

$hsl= mysqli_query($koneksi,"SELECT * FROM `tbl_barang` JOIN tbl_eoq ON tbl_barang.kode_barang=tbl_eoq.kode_barang WHERE tbl_barang.kode_barang='$kode_barang'");

$data = mysqli_fetch_assoc($hsl);

echo json_encode($data);