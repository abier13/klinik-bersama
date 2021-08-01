<?php
require_once '../_config/config.php';
require_once '../_config/jikalogin.php';

$username = trim(mysqli_real_escape_string($connect, $_POST['username']));
$password = sha1(trim(mysqli_real_escape_string($connect, $_POST['password'])));

$sql_login = mysqli_query($connect, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($connect));

$data_login = mysqli_fetch_array($sql_login);

if (mysqli_num_rows($sql_login) > 0) {
    $_SESSION['nama_user'] = $data_login['nama_user'];
    $_SESSION['username'] = $data_login['username'];
    $_SESSION['level'] = $data_login['level'];
    $_SESSION['notif'] = "Berhasil Login";

    echo "<script>window.location='" . base_url('dashboard') . "';</script>";
} else {
    $_SESSION['notif'] = "Username / Password Salah!";
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
