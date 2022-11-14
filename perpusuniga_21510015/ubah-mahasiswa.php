<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}


$id_mahasiswa = (int)$_GET ['id_mahasiswa'];

$mahasiswa = select ("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = $id_mahasiswa" )[0];

$getjur = mysqli_query($koneksi, "SELECT * FROM t_jurusan");

if(isset($_POST['edit'])){
    if (update_mahasiswa($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Mahasiswa Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'mahasiswa.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Mahasiswa Gagal Diedit!',
        }).then(function(){
            document.location.href = 'mahasiswa.php';
        });
        </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Edit Data Mahasiswa</h1>

        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama'];?>" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim'];?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa['alamat'];?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $mahasiswa['username'];?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $mahasiswa['password'];?>" required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Jurusan</label>
                <select name="id_jurusan" id="id_jurusan" class="form-control">
                    <?php
                            while($jur=mysqli_fetch_array($getjur)){?>
                    <option value="<?=$jur['id_jurusan']?>"
                    <?=$mahasiswa['id_jurusan'] == $jur['id_jurusan'] ? 'selected' : null ?>
                    ><?=$jur['nama_jurusan']?> </option>
                    <?php }?>
                </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Edit</button>
        </form>
    </div>


    <?php include "layout/footer.php"; ?>