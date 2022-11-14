<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk Beranda";
        header("location:login.php");
    exit;
}


?>

<style>
    
    .zoom {


  transition: transform .3s; 
  width: auto;
  height: auto;
  margin: 0 auto;
}

.card:hover {
    filter: none;
      filter: grayscale(0);
      transform: scale(1.03);
}
.card {
      filter: gray; 
      filter: grayscale(1); 
      transition: all .2s ease-in-out;  
    }


</style>

<div class="container">
    
    <br>
    <div class="card mb-3 navbar-custom text-white zoom">
        <div class="card-header">
            YOZAKHA KIRNANTA / 21510015
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Halo, saya Yozakha Kirnanta, saya mahasiswa sistem informasi aktif di Universitas Gajayana.
                    Kadang-kadang melamun untuk
                    mencari inspirasi</p>
                <footer class="blockquote-footer">wvgs<cite title="Source Title"> 2022</cite>
                </footer>
            </blockquote>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4 ">
        <div class="col">
            <div class="card navbar-custom text-white zoom">
                <img src="layout/portfolio.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Portfolio Website</h5>
                    <p class="card-text">Berisi tentang saya dan apa yang saya kerjakan akhir-akhir ini.</p>
                    <a href="https://yozananta.github.io" target="_blank" class="btn btn-primary">Klik!!</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row row-cols-1 row-cols-md-2 g-4 ">
                <div class="col">
                    <div class="card navbar-custom text-white zoom">
                    <img src="layout/data.png" style="height: 115px;" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-title">Mahasiswa Terdaftar</p>
                            <?php
                            $data_mahasiswa = mysqli_query($koneksi,"SELECT * FROM t_mahasiswa");
                            $tampil_mahasiswa = mysqli_num_rows($data_mahasiswa);
                            ?>
                            <h5 class="card-text"><b><?= $tampil_mahasiswa ?></b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card navbar-custom text-white zoom">
                    <img src="layout/dosen.png" style="height: 115px;" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-title">Dosen Terdaftar</p>
                            <?php
                            $data_dosen = mysqli_query($koneksi,"SELECT * FROM t_dosen");
                            $tampil_dosen = mysqli_num_rows($data_dosen);
                            ?>
                            <h5 class="card-text"><b><?= $tampil_dosen ?></b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card navbar-custom text-white zoom">
                    <img src="layout/jadwal.png" style="height: 115px;" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-title">Jadwal Kuliah Terdaftar</p>
                            <?php
                            $data_jadwal = mysqli_query($koneksi,"SELECT * FROM t_jadwalkuliah");
                            $tampil_jadwal = mysqli_num_rows($data_jadwal);
                            ?>
                            <h5 class="card-text"><b><?= $tampil_jadwal ?></b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card navbar-custom text-white zoom">
                    <img src="layout/akun.png"  style="height: 115px;" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-title">Akun Terdaftar</p>
                            <?php
                            $data_akun = mysqli_query($koneksi,"SELECT * FROM t_akun");
                            $tampil_akun = mysqli_num_rows($data_akun);
                            ?>
                            <h5 class="card-text"><b><?= $tampil_akun ?></b></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>



<?php include "layout/footer.php"; ?>