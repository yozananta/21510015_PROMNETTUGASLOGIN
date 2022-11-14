<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}


$id_dosen = (int)$_GET ['id_dosen'];

$dosen = select ("SELECT * FROM t_dosen WHERE id_dosen = $id_dosen")[0];

if(isset($_POST['edit'])){
    if (update_dosen($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Dosen Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'dosen.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Dosen Gagal Diedit!',
        }).then(function(){
            document.location.href = 'dosen.php';
        });
        </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Edit Dosen</h1>

        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen']; ?>">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= $dosen['nama_dosen'];?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dosen['alamat'];?>" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $dosen['telepon'];?>" required>
            </div>
            <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Edit</button>
        </form>
    </div>


    <?php include "layout/footer.php"; ?>