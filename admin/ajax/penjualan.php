<?php
include '../koneksi.php';

$kode_barang = $_POST['kode_barang'];

$hsl= mysqli_query($koneksi,"SELECT * FROM `tbl_barang` WHERE kode_barang='$kode_barang'");

$data = mysqli_fetch_assoc($hsl);

echo json_encode($data);