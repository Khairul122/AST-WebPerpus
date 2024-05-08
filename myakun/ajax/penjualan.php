<?php
include '../koneksi.php';

$kd_buku = $_POST['kd_buku'];

$hsl= mysqli_query($koneksi,"SELECT * FROM `tbl_buku` WHERE kd_buku='$kd_buku'");

$data = mysqli_fetch_assoc($hsl);

echo json_encode($data);