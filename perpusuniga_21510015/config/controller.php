<?php

function select($query){
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

//..............................................PUNYA MAHASISWA...................................................//

function create_mahasiswa($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $nim = $post['nim'];
    $alamat = $post['alamat'];
    $username = $post['username'];
    $password = $post['password'];
    $id_jurusan = $post['id_jurusan'];

    $query = "INSERT INTO t_mahasiswa VALUES (null, '$nama','$nim','$alamat','$username','$password','$id_jurusan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    

}

function update_mahasiswa($post)
{
    global $koneksi;

    $id_mahasiswa = $post ['id_mahasiswa'];
    $nama = $post['nama'];
    $nim = $post['nim'];
    $alamat = $post['alamat'];
    $username = $post['username'];
    $password = $post['password'];
    $id_jurusan = $post['id_jurusan'];

    $query = "UPDATE t_mahasiswa SET nama = '$nama' , nim = '$nim' , alamat = '$alamat' , username = '$username' , password = '$password' , id_jurusan = '$id_jurusan' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_mahasiswa($id_mahasiswa)
{
    global $koneksi;

    $query = "DELETE FROM t_mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}




//..............................................PUNYA DOSEN...................................................//




function create_dosen($post)
{
    global $koneksi;

    $nama_dosen = $post['nama_dosen'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];

    $query = "INSERT INTO t_dosen VALUES (null, '$nama_dosen','$alamat','$telepon')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_dosen($post)
{
    global $koneksi;

    $id_dosen = $post ['id_dosen'];
    $nama_dosen = $post['nama_dosen'];
    $alamat = $post['alamat'];
    $telepon = $post['telepon'];


    $query = "UPDATE t_dosen SET nama_dosen = '$nama_dosen', alamat = '$alamat' , telepon = '$telepon' WHERE id_dosen = $id_dosen";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_dosen($id_dosen)
{
    global $koneksi;

    $query = "DELETE FROM t_dosen WHERE id_dosen = $id_dosen";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//..............................................PUNYA JURUSAN...................................................//

function create_jurusan($post)
{
    global $koneksi;

    $nama_jurusan = $post['nama_jurusan'];
    $query = "INSERT INTO t_jurusan VALUES (null, '$nama_jurusan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_jurusan($post)
{
    global $koneksi;

    $id_jurusan = $post ['id_jurusan'];
    $nama_jurusan = $post['nama_jurusan'];


    $query = "UPDATE t_jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = $id_jurusan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_jurusan($id_jurusan)
{
    global $koneksi;

    $query = "DELETE FROM t_jurusan WHERE id_jurusan = $id_jurusan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//..............................................PUNYA MATKUL...................................................//


function create_matkul($post)
{
    global $koneksi;

    $nama_matkul = $post['nama_matkul'];
    $query = "INSERT INTO t_matakuliah VALUES (null, '$nama_matkul')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_matkul($post)
{
    global $koneksi;

    $id_matkul = $post ['id_matkul'];
    $nama_matkul = $post['nama_matkul'];


    $query = "UPDATE t_matakuliah SET nama_matkul = '$nama_matkul' WHERE id_matkul = $id_matkul";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_matkul($id_matkul)
{
    global $koneksi;

    $query = "DELETE FROM t_matakuliah WHERE id_matkul = $id_matkul";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//..............................................PUNYA JADWAL KULIAH...................................................//


function create_jadwal($post)
{
    global $koneksi;

    $hari = $post['hari'];
    $jam = $post['jam'];
    $id_matkul = $post['id_matkul'];
    $id_dosen = $post['id_dosen'];

    $query = "INSERT INTO t_jadwalkuliah VALUES (null, '$hari','$jam','$id_matkul', '$id_dosen')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_jadwal($post)
{
    global $koneksi;

    $id_jadwal = $post ['id_jadwal'];
    $hari = $post['hari'];
    $jam = $post['jam'];
    $id_matkul = $post['id_matkul'];
    $id_dosen = $post['id_dosen'];

    $query = "UPDATE t_jadwalkuliah SET hari = '$hari', jam = '$jam' , id_matkul = '$id_matkul' , id_dosen = '$id_dosen' WHERE id_jadwal = $id_jadwal";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_jadwal($id_jadwal)
{
    global $koneksi;

    $query = "DELETE FROM t_jadwalkuliah WHERE id_jadwal = $id_jadwal";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



//..............................................PUNYA AKUN...................................................//



function create_akun($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    $query = "INSERT INTO t_akun VALUES (null, '$nama','$username','$password','$level')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    

}

function update_akun($post)
{
    global $koneksi;

    $id_user = $post ['id_user'];
    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    $query = "UPDATE t_akun SET nama = '$nama', username = '$username' , password = '$password' , level = '$level' WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function delete_akun($id_user)
{
    global $koneksi;

    $query = "DELETE FROM t_akun WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}