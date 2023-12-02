<?php

session_start();


include("koneksi.php");


$username = $_POST["username"];
$password = $_POST["password"];


$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if(mysqli_num_rows($result) == 1) {

    $_SESSION["username"] = $username;
    header("location: welcome.php");    
} else {

    $_SESSION["error"] = "username atau password salah";
    header("location: index.php");
}