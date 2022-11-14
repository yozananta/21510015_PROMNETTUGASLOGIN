<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}
$id_matkul = (int)$_GET ['id_matkul'];

$matkul = select ("SELECT * FROM t_matakuliah WHERE id_matkul = $id_matkul")[0];

if(isset($_POST['edit'])){
    if (update_matkul($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Matakuliah Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'matkul.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Matakuliah Gagal Diedit!',
        }).then(function(){
            document.location.href = 'matkul.php';
        });
        </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Edit Data Mahasiswa</h1>

        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_matkul" value="<?= $matkul['id_matkul']; ?>">
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama matkul</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $matkul['nama_matkul'];?>" required>
            </div>
            <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Edit</button>
        </form>
    </div>


    <?php include "layout/footer.php"; ?>