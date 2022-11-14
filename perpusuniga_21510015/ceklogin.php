<?php
session_start();

include "config/app.php";

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * FROM t_akun WHERE username = '$username' and password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    if($data['level'] == "admin"){

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:index.php");
    }else if ($data['level'] == "petugas"){
        
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        header("location:index.php");
    }else {
        $_SESSION['gagal'] ="";
        header("location:login.php");
    }

}else{
    $_SESSION['gagal'] ="";
    header("location:login.php");
}
?>