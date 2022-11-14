<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}




$id_jadwal = $_GET ['id_jadwal']; 
$jadwalkuliah = select ("SELECT * FROM t_jadwalkuliah WHERE id_jadwal = $id_jadwal")[0];

$getmat = mysqli_query($koneksi, "SELECT * FROM t_matakuliah");
$getdos = mysqli_query($koneksi, "SELECT * FROM t_dosen");

if(isset($_POST['edit'])){
    if (update_jadwal($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Jadwal Kuliah Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'jadwalkuliah.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Jadwal Kuliah Gagal Diedit!',
        }).then(function(){
            document.location.href = 'jadwalkuliah.php';
        });
        </script>";
}

?>

<body>
    <div class="container mt-5">
        <h1>Edit Data Jadwal Kuliah</h1>

        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_jadwal" value="<?= $jadwalkuliah['id_jadwal']; ?>">
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                    <?php  $hari = $jadwalkuliah['hari'];?>
                    <option value="Senin" <?= $hari == 'Senin' ? 'selected' : null ?>>Senin</option>
                    <option value="Selasa" <?= $hari == 'Selasa' ? 'selected' : null ?>>Selasa</option>
                    <option value="Rabu" <?= $hari == 'Rabu' ? 'selected' : null  ?>>Rabu</option>
                    <option value="Kamis" <?= $hari == 'Kamis' ? 'selected' : null ?>>Kamis</option>
                    <option value="Jumat" <?= $hari == 'Jumat' ? 'selected' : null ?>>Jumat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" value="<?= $jadwalkuliah['jam']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Matakuliah</label>
                <select name="id_matkul" id="id_matkul" class="form-control">
                    <option>--Pilih Matkul--</option>
                    <?php
                            while($mat=mysqli_fetch_array($getmat)){?>
                    <option value="<?=$mat['id_matkul']?>"
                    <?=$jadwalkuliah['id_matkul'] == $mat['id_matkul'] ? 'selected' : null ?>
                    ><?=$mat['nama_matkul']?> </option>
                    <?php }?>

                </select>

                
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Nama Dosen</label>
                <select name="id_dosen" id="id_dosen" class="form-control">
                    <option>--Pilih Dosen--</option>
                    <?php
                            while($dos=mysqli_fetch_array($getdos)){?>
                    <option value="<?=$dos['id_dosen']?>"
                    <?=$jadwalkuliah['id_dosen'] == $dos['id_dosen'] ? 'selected' : null ?>
                    ><?=$dos['nama_dosen']?> </option>
                    <?php }?>

                </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Edit</button>
        </form>
    </div>


    <?php include "layout/footer.php"; ?>