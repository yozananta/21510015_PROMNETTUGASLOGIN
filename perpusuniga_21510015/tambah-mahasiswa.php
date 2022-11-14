<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



$getjur = mysqli_query($koneksi, "SELECT * FROM t_jurusan");

if(isset($_POST['tambah'])){
      
    if (create_mahasiswa($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Mahasiswa Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'mahasiswa.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Mahasiswa Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'mahasiswa.php';
        });
        </script>";
}
?>


<body>
    <div class="container mt-5">
        <h1>Tambah Data Mahasiswa</h1>

        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Jurusan</label>
                <select name="id_jurusan" id="id_jurusan" class="form-control">
                    <option>--Pilih Jurusan--</option>
                    <?php
                            while($mahasiswa=mysqli_fetch_array($getjur)){?>
                    <option name="id_jurusan" value="<?=$mahasiswa['id_jurusan']?>"><?=$mahasiswa['nama_jurusan']?>
                    </option>
                    <?php }?>

                </select>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;" onclick="">Tambah</button>
        </form>

    </div>


    <?php include "layout/footer.php"; ?>