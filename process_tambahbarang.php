<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST["nama_barang"];
    $jumlah_barang = $_POST["jumlah_barang"];
    $harga_barang = $_POST["harga_barang"];

    $query = "INSERT INTO barang (nama_barang, jumlah_barang, harga_barang) VALUES ('$nama_barang', '$jumlah_barang', '$harga_barang')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["success"] = "Data berhasil disimpan.";
        header("location: welcome.php");
    } else {
        $_SESSION["error"] = "Gagal menyimpan data.";
        header("location: tambahbarang.php");
    }
}
