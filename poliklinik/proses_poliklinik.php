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
$id_poli = mysqli_escape_string($connect, $_POST['id_poli']);
$nama_poli = trim(mysqli_escape_string($connect, $_POST['nama_poli']));
$lokasi = trim(mysqli_escape_string($connect, $_POST['lokasi']));

if ($_POST['simpan'] == "Tambah") {
    $sql_insert_poli = "INSERT INTO tb_poliklinik (id_poli, nama_poli, lokasi) VALUES ('$uuid', '$nama_poli', '$lokasi')";
    if (mysqli_query($connect, $sql_insert_poli)) {
        $_SESSION['sukses'] = "menambahkan data poliklinik";
        echo "<script>window.location='" . base_url('poliklinik') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menambahkan data poliklinik";
        echo "<script>window.location='" . base_url('poliklinik/form_poliklinik.php') . "';</script>";
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_poli = "UPDATE tb_poliklinik SET nama_poli = '$nama_poli', lokasi = '$lokasi' WHERE id_poli = '$id_poli'";
    if (mysqli_query($connect, $sql_update_poli)) {
        $_SESSION['sukses'] = "mengubah data poliklinik";
        echo "<script>window.location='" . base_url('poliklinik') . "';</script>";
    } else {
        $_SESSION['gagal'] = "mengubah data poliklinik";
        echo "<script>window.location='" . base_url('poliklinik/form_poliklinik.php?id=' . $id_poli . '') . "';</script>";
    }
}
