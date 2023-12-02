<?php

session_start();

include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if (empty($_POST['password'])) {

        $sql = "UPDATE user SET username='$username' WHERE id=$id";

        $query = mysqli_query($koneksi, $sql);

        if ($query) {

            $_SESSION["success"] = "Update berhasil.";
            header('Location: welcome.php');
        } else {

            $_SESSION["error"] = "Update gagal. Silakan coba lagi.";
            header("location: edit.php");
        }
    } else {

        if ($password !== $confirm_password) {
            $_SESSION["error"] = "Password tidak sesuai dengan konfirmasi password.";
            header("Location: edit.php?id=$id");
        } else {

            $query = "UPDATE user SET username='$username', password='$password' WHERE id=$id";

            $result = mysqli_query($koneksi, $query);

            if ($result) {
                $_SESSION["success"] = "Update berhasil.";
                header('Location: welcome.php');
            } else { 
                $_SESSION["error"] = "Update gagal. silakan coba lagi.";
                header('Location: edit.php');
            }
        }
    }
}
