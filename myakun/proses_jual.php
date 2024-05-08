<?php
include 'koneksi.php';
if (isset($_POST['tambahbarang'])) {
    $sqlkategori = mysqli_query($koneksi,"INSERT INTO `tbl_cart_jual`(`kode_barang`, `jumlah`) VALUES ('$_POST[kode_barang]','$_POST[jumlah_beli]')");
    if ($sqlkategori) {
        echo "<script>location='index.php?page=penjualan';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan');</script>";
        echo "<script>location='index.php?page=penjualan';</script>";
    }
    
}
if (isset($_POST['jual'])) {
    $sqlkategori = mysqli_query($koneksi,"INSERT INTO `tbl_cart_pesan`(`kode_barang`, `jumlah`) VALUES ('$_POST[kode_barang]','$_POST[jumlah]')");
    if ($sqlkategori) {
        echo "<script>location='index.php?page=pemesanan';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan');</script>";
        echo "<script>location='index.php?page=pemesanan';</script>";
    }
    
}
