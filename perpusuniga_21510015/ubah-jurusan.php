<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk";
        header("location:login.php");
    exit;
}



$id_jurusan = (int)$_GET ['id_jurusan'];

$jurusan = select ("SELECT * FROM t_jurusan WHERE id_jurusan = $id_jurusan")[0];

if(isset($_POST['edit'])){
    if (update_jurusan($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Jurusan Berhasil Diedit!',
        }).then(function(){
            document.location.href = 'jurusan.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Jurusan Gagal Diedit!',
        }).then(function(){
            document.location.href = 'jurusan.php';
        });
        </script>";
}

?>


<body>
    <div class="container mt-5">
        <h1>Edit Data Mahasiswa</h1>

        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_jurusan" value="<?= $jurusan['id_jurusan']; ?>">
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?= $jurusan['nama_jurusan'];?>" required>
            </div>
            <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Edit</button>
        </form>
    </div>


    <?php include "layout/footer.php"; ?>