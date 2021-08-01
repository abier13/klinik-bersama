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
$id_dokter = mysqli_escape_string($connect, $_POST['id_dokter']);
$nama_dokter = trim(mysqli_escape_string($connect, $_POST['nama']));
$jenis_kelamin = trim(mysqli_escape_string($connect, $_POST['jenis_kelamin']));
$spesialis = trim(mysqli_escape_string($connect, $_POST['spesialis']));
$alamat = trim(mysqli_escape_string($connect, $_POST['alamat']));
$no_telp = trim(mysqli_escape_string($connect, $_POST['no_telp']));

if ($_POST['simpan'] == "Tambah") {
    $sql_insert_dokter = "INSERT INTO tb_dokter (id_dokter, nama_dokter, jenis_kelamin, spesialis, alamat, no_telp) VALUES ('$uuid', '$nama_dokter', '$jenis_kelamin', '$spesialis','$alamat', '$no_telp')";
    if (mysqli_query($connect, $sql_insert_dokter)) {
        $_SESSION['sukses'] = "menambahkan data dokter";
        echo "<script>window.location='" . base_url('dokter') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menambahkan data dokter";
        echo "<script>window.location='" . base_url('dokter/form_dokter.php') . "';</script>";
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_dokter = "UPDATE tb_dokter SET nama_dokter = '$nama_dokter', jenis_kelamin = '$jenis_kelamin', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$no_telp' WHERE id_dokter = '$id_dokter'";
    if (mysqli_query($connect, $sql_update_dokter)) {
        $_SESSION['sukses'] = "mengubah data dokter";
        echo "<script>window.location='" . base_url('dokter') . "';</script>";
    } else {
        $_SESSION['gagal'] = "mengubah data dokter";
        echo "<script>window.location='" . base_url('dokter/form_dokter.php?id=' . $id_dokter . '') . "';</script>";
    }
}
