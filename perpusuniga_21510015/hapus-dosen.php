<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



$id_dosen = (int)$_GET['id_dosen'];

if (delete_dosen($id_dosen) > 0) {
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Dosen Berhasil Dihapus!',
    }).then(function(){
        document.location.href = 'dosen.php';
    });
    </script>";
    }else
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Dosen Gagal Dihapus!',
    }).then(function(){
        document.location.href = 'dosen.php';
    });
    </script>";
?>