<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



$getmat = mysqli_query($koneksi, "SELECT * FROM t_matakuliah");
$getdos = mysqli_query($koneksi, "SELECT * FROM t_dosen");

if(isset($_POST['tambah-jadwal'])){
      
    if (create_jadwal($_POST) > 0){
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Jadwal Kuliah Berhasil Ditambahkan!',
    }).then(function(){
        document.location.href = 'jadwalkuliah.php';
    });
    </script>";
    }else
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Jadwal Kuliah Gagal Ditambahkan!',
    }).then(function(){
        document.location.href = 'jadwalkuliah.php';
    });
    </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Tambah Data Jadwal Kuliah</h1>

        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select class="form-control" name="hari" id="hari" required>
                <option value="">--Pilih Hari--</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Matakuliah</label>
                <select name="id_matkul" id="id_matkul" class="form-control">
                    <option>--Pilih Matkul--</option>
                    <?php
                            while($jadwalkuliah=mysqli_fetch_array($getmat)){?>
                    <option name="id_matkul" value="<?=$jadwalkuliah['id_matkul']?>"><?=$jadwalkuliah['nama_matkul']?></option>
                    <?php }?>

                </select>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Nama Dosen</label>
                <select name="id_dosen" id="id_dosen" class="form-control">
                    <option>--Pilih Dosen--</option>
                    <?php
                            while($jadwalkuliah=mysqli_fetch_array($getdos)){?>
                    <option name="id_dosen" value="<?=$jadwalkuliah['id_dosen']?>"><?=$jadwalkuliah['nama_dosen']?></option>
                    <?php }?>

                </select>
            </div>
            <button type="submit" name="tambah-jadwal" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>

    </div>


    <?php include "layout/footer.php"; ?>