<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk Jurusan";
        header("location:login.php");
    exit;
}


 $data_jurusan = select("SELECT * FROM t_jurusan ORDER BY id_jurusan ASC");

?>

<div class="container mt-5">
    <h1><i class="fas fa-chalkboard"></i> Data Jurusan</h1>

    <hr>
    <?php if ($_SESSION['level'] == "admin") {?>
    <a href="tambah-jurusan.php" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
    <?php  } ?>
        
    <table id="table" class="table table-dark table-bordered table-striped mt-3">
        <thead>
            <tr>
                <td><b>No</td>
                <td><b>Nama Jurusan</td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td><b>Aksi</td>
                <?php  } ?>
                
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_jurusan as $jurusan):   ?>
            <tr>
                <td width="10%"><?= $no++; ?></td>
                <td><?= $jurusan['nama_jurusan']; ?></td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td width="20%" class="text-center">
                    <a href="ubah-jurusan.php?id_jurusan=<?= $jurusan['id_jurusan'];?>"
                        class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                    <a href="hapus-jurusan.php?id_jurusan=<?= $jurusan['id_jurusan'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
                <?php  } ?>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<?php include "layout/footer.php"; ?>