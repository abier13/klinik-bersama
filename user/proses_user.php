<?php
include_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

function generate_uuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

$uuid = generate_uuid();
$id_user = mysqli_escape_string($connect, $_POST['id_user']);
$nama_user = trim(mysqli_escape_string($connect, $_POST['nama_user']));
$username = trim(mysqli_escape_string($connect, $_POST['username']));
$level = trim(mysqli_escape_string($connect, $_POST['level']));

$sql_cek_username = mysqli_query($connect, "SELECT username FROM tb_user WHERE username = '$username'");

if ($_POST['simpan'] == "Tambah") {
    $password = sha1(trim(mysqli_escape_string($connect, $_POST['password'])));
    $ulangi_password = sha1(trim(mysqli_escape_string($connect, $_POST['ulangi_password'])));
    if (mysqli_num_rows($sql_cek_username) > 0) {
        $_SESSION['gagal'] = "username sudah terdaftar";
        echo "<script>window.location='" . base_url('user/form_user.php') . "';</script>";
    } else {
        if ($password != $ulangi_password) {
            $_SESSION['gagal'] = "pasword tidak sama";
            echo "<script>window.location='" . base_url('user/form_user.php') . "';</script>";
        } else {
            $sql_insert_user = "INSERT INTO tb_user (id_user, nama_user, username, password, level) VALUES ('$uuid', '$nama_user', '$username', '$password','$level')";
            if (mysqli_query($connect, $sql_insert_user)) {
                $_SESSION['sukses'] = "menambahkan data user";
                echo "<script>window.location='" . base_url('user') . "';</script>";
            } else {
                $_SESSION['gagal'] = "menambahkan data user";
                echo "<script>window.location='" . base_url('user/form_user.php') . "';</script>";
            }
        }
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_user = "UPDATE tb_user SET nama_user = '$nama_user', username = '$username', level = '$level' WHERE id_user = '$id_user'";
    if (mysqli_query($connect, $sql_update_user)) {
        $_SESSION['sukses'] = "mengubah data user";
        echo "<script>window.location='" . base_url('user') . "';</script>";
    } else {
        $_SESSION['gagal'] = "mengubah data user";
        echo "<script>window.location='" . base_url('user/form_user.php?id=' . $id_user . '') . "';</script>";
    }
}
