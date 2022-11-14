<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



if(isset($_POST['tambah-dosen'])){
      
    if (create_dosen($_POST) > 0){
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Dosen Berhasil Ditambahkan!',
    }).then(function(){
        document.location.href = 'dosen.php';
    });
    </script>";
    }else
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Dosen Gagal Ditambahkan!',
    }).then(function(){
        document.location.href = 'dosen.php';
    });
    </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Tambah Data Dosen</h1>

        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah-dosen" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>

    </div>
    
    
    <?php include "layout/footer.php"; ?>