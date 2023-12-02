<?php

session_start();


include("koneksi.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


if($password !== $confirm_password) {
    $_SESSION["error"] = "Password tidak sesuai dengan konfirmasi password.";
    header("location: register.php");
    exit();
}


$query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($koneksi, $query);


if ($result) {
    $_SESSION["success"] = "Registrasi berhasil. Silahkan login.";
    header("location: index.php");
} else {
    $_SESSION["error"] = "Registrasi gagal. silakan coba lagi.";
    header("location: register.php");
}
}
?>