<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



if(isset($_POST['tambah-matkul'])){
      
    if (create_matkul($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Mata Kuliah Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'matkul.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Mata Kuliah Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'matkul.php';
        });
        </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Tambah Data Matakuliah</h1>

        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
            </div>          
            <button type="submit" name="tambah-matkul" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>

    </div>


    <?php include "layout/footer.php"; ?>