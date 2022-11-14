<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}


$id_user = (int)$_GET['id_user'];

if (delete_akun($id_user) > 0) {
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Akun Berhasil Dihapus!',
    }).then(function(){
        document.location.href = 'akun.php';
    });
    </script>";
    }else
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Akun Gagal Dihapus!',
    }).then(function(){
        document.location.href = 'akun.php';
    });
    </script>";
?>