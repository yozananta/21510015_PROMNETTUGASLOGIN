<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk Matakuliah";
        header("location:login.php");
    exit;
}


 $data_matkul = select("SELECT * FROM t_matakuliah ORDER BY id_matkul ASC");

?>

<div class="container mt-5">
<h1><i class="fas fa-stream"></i> Data Matakuliah</h1>

    <hr>
    <?php if ($_SESSION['level'] == "admin") {?>
    <a href="tambah-matkul.php" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
    <?php  } ?>
    
    <table id="table" class="table table-dark table-bordered table-striped mt-3">
        <thead>
            <tr>
                <td><b>No</td>
                <td><b>Nama Matakuliah</td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td><b>Aksi</td>
                <?php  } ?>
                
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_matkul as $matkul):   ?>
            <tr>
                <td width="10%"><?= $no++; ?></td>
                <td><?= $matkul['nama_matkul']; ?></td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td width="20%" class="text-center">
                    <a href="ubah-matkul.php?id_matkul=<?= $matkul['id_matkul'];?>" class="btn btn-success"><i
                            class="fas fa-edit"></i> Edit</a>
                    <a href="hapus-matkul.php?id_matkul=<?= $matkul['id_matkul'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                        Hapus</a>
                </td>
                <?php  } ?>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<?php include "layout/footer.php"; ?>