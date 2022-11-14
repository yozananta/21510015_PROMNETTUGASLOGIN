<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}


$id_matkul = (int)$_GET['id_matkul'];

if (delete_matkul($id_matkul) > 0) {
  echo "<script>
  Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Data Mata Kuliah Berhasil Dihapus!',
  }).then(function(){
      document.location.href = 'matkul.php';
  });
  </script>";
  }else
  echo "<script>
  Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Data Mata Kuliah Gagal Dihapus!',
  }).then(function(){
      document.location.href = 'matkul.php';
  });
  </script>";
?>