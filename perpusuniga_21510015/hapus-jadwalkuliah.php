<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



$id_jadwal = (int)$_GET['id_jadwal'];

if (delete_jadwal($id_jadwal) > 0) {
  echo "<script>
  Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Data Jadwal Kuliah Berhasil Dihapus!',
  }).then(function(){
      document.location.href = 'jadwalkuliah.php';
  });
  </script>";
  }else
  echo "<script>
  Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Data Jadwal Kuliah Gagal Dihapus!',
  }).then(function(){
      document.location.href = 'jadwalkuliah.php';
  });
  </script>";
?>