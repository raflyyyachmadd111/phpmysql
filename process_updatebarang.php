<?php

session_start();

include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];

    $query = "UPDATE barang SET nama_barang='$nama_barang', harga_barang='$harga_barang', jumlah_barang='$jumlah_barang' WHERE id=$id";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["success"] = "Update berhasil.";
        header('Location: welcome.php');
    } else {
        $_SESSION["error"] = "Update gagal. silakan coba lagi.";
        header('Location: editbarang.php');
    }
}
