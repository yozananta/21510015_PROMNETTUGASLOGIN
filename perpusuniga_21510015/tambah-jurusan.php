<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}


if(isset($_POST['tambah-jurusan'])){
      
    if (create_jurusan($_POST) > 0){
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Jurusan Berhasil Ditambahkan!',
    }).then(function(){
        document.location.href = 'jurusan.php';
    });
    </script>";
    }else
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Jurusan Gagal Ditambahkan!',
    }).then(function(){
        document.location.href = 'jurusan.php';
    });
    </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Tambah Data Jurusan</h1>

        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
            </div>          
            <button type="submit" name="tambah-jurusan" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>

    </div>


    <?php include "layout/footer.php"; ?>