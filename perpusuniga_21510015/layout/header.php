<?php
include "config/app.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>UNIGA LIBRARY</title>
    <style>
    :root {
        --bs-body-bg: #18191A;
    }

    .navbar-custom {
        background-color: #242526;
    }

    .text-custom {
        color: #242526;
    }
    h1{
        color: white;
    }
    label{
        color: white;
    }

    </style>

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-custom navbar-dark" id="topheader">
            <div class="container">
                <a class="navbar-brand"><img src="assets/loginlogo.png" style="width: 20px" /> WVGS.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="mahasiswa.php">Data Mahasiswa</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="dosen.php">Data Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jurusan.php">Jurusan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="matkul.php">Matakuliah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jadwalkuliah.php">Jadwal Kuliah</a>
                        </li>
                        <?php if ($_SESSION['level'] == "admin") {?>
                        <li class="nav-item">
                            <a class="nav-link" href="akun.php">Akun</a>
                        </li>
                        <?php  } ?>
                        
                    </ul>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="navbar-brand dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><small><i class="fas fa-user-circle"></i>Welcome </small></a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>