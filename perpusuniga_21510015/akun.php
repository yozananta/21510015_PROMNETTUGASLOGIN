<?php 
session_start();

include "layout/header.php";

    if($_SESSION['level']==""){
        $_SESSION['gagal-login'] = "Gagal Masuk Akun";
        header("location:login.php");
    exit;
}



$data_akun = select("SELECT * FROM t_akun");

if (isset($_POST['tambah'])){
    if (create_akun($_POST) > 0){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Akun Berhasil Ditambahkan!',
        }).then(function(){
            document.location.href = 'akun.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Akun Gagal Ditambahkan!',
        }).then(function(){
            document.location.href = 'akun.php';
        });
        </script>";
    }

    if(isset($_POST['edit'])){
        if (update_akun($_POST) > 0){
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Akun Berhasil Diedit!',
            }).then(function(){
                document.location.href = 'akun.php';
            });
            </script>";
            }else
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data Akun Gagal Diedit!',
            }).then(function(){
                document.location.href = 'akun.php';
            });
            </script>";
        }
       

?>
<?php if ($_SESSION['level'] == "admin") {?>
<body>
    <div class="container mt-5">
        <h1><i class="fas fa-user-circle"></i> Daftar Akun</h1>

        <hr>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"><i
                class="fas fa-plus-circle"></i> Tambah Akun</button>

        <table id="table" class="table table-dark table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <td><b>No</td>
                    <td><b>Nama</td>
                    <td><b>Username</td>
                    <td><b>Password</td>
                    <td><b>Level</td>
                    <td><b>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;  ?>
                <?php foreach ($data_akun as $akun)  : ?>

                <tr>
                    <td> <?= $no++; ?></td>
                    <td> <?= $akun['nama']; ?></td>
                    <td> <?= $akun['username']; ?></td>
                    <td> <?= $akun['password']; ?> </td>
                    <td> <?= $akun['level']; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                            data-bs-target="#modalEdit<?= $akun['id_user'];?>"><i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                            data-bs-target="#modalHapus<?= $akun['id_user']?>"><i class="fas fa-trash-alt"></i>
                            Hapus</button>
                    </td>
                </tr>
                <?php endforeach;   ?>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-control" name="level" id="level" required>
                                <option value="">--Level Akun--</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php   foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalEdit<?= $akun['id_user'];?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_user" value="<?= $akun['id_user']; ?>">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama'];?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?= $akun['username'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="<?= $akun['password'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level" required>
                                <?php  $level = $akun['level'];?>
                                <option value="admin" <?= $level == 'admin' ? 'selected' : null ?>>Admin</option>
                                <option value="petugas" <?= $level == 'petugas' ? 'selected' : null ?>>Petugas</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button href="" type="submit" name="edit" class="btn btn-success">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php   endforeach; ?>


    <?php   foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_user']?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <p>Yakin Ingin Menghapus Akun : <b><?= $akun['nama']; ?> ? </b></p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id_user=<?= $akun['id_user'];?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <?php   endforeach; ?>


    <?php 
include "layout/footer.php";
?>
</body>
<?php  }
else {
    header("location:index.php");
} ?>
