<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk Dosen";
        header("location:login.php");
    exit;
}



 $data_dosen = select("SELECT * FROM t_dosen ORDER BY id_dosen ASC");

?>

<div class="container mt-5">
    <h1><i class="fas fa-chalkboard-teacher"></i> Data Dosen</h1>

    <hr>
    <?php if ($_SESSION['level'] == "admin") {?>
    <a href="tambah-dosen.php" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
    <?php  } ?>
    

    <table id="table" class="table table-dark table-bordered table-striped mt-3">
        <thead>
            <tr>
                <td><b>No</td>
                <td><b>Nama Dosen</td>
                <td><b>Alamat</td>
                <td><b>Telepon</td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td><b>Aksi</td>
                <?php  } ?>
                
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_dosen as $dosen):   ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $dosen['nama_dosen']; ?></td>
                <td><?= $dosen['alamat']; ?></td>
                <td><?= $dosen['telepon']; ?></td>
                <?php if ($_SESSION['level'] == "admin") {?>
                <td width="20%" class="text-center">
                    <a href="ubah-dosen.php?id_dosen=<?= $dosen['id_dosen'];?>" class="btn btn-success"><i
                            class="fas fa-edit"></i> Edit</a>
                 <a href="hapus-dosen.php?id_dosen=<?= $dosen['id_dosen'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                        Hapus</a>
                </td>
                <?php  } ?>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include "layout/footer.php"; ?>