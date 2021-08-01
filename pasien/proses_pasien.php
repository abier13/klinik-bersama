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
$id_pasien = mysqli_escape_string($connect, $_POST['id_pasien']);
$nama_pasien = trim(mysqli_escape_string($connect, $_POST['nama']));
$dok_identitas = trim(mysqli_escape_string($connect, $_POST['dok_identitas']));
$nomor_identitas = trim(mysqli_escape_string($connect, $_POST['nomor_identitas']));
$jenis_kelamin = trim(mysqli_escape_string($connect, $_POST['jenis_kelamin']));
$alamat = trim(mysqli_escape_string($connect, $_POST['alamat']));
$no_telp = trim(mysqli_escape_string($connect, $_POST['no_telp']));

$sql_cek_id = mysqli_query($connect, "SELECT nomor_identitas FROM tb_pasien WHERE nomor_identitas = '$nomor_identitas'");

if ($_POST['simpan'] == "Tambah") {
    if (mysqli_num_rows($sql_cek_id) > 0) {
        $_SESSION['gagal'] = "nomor identitas sudah terdaftar";
        echo "<script>window.location='" . base_url('pasien/form_pasien.php') . "';</script>";
    } else {
        $sql_insert_pasien = "INSERT INTO tb_pasien (id_pasien, nama_pasien, dok_identitas, nomor_identitas, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', '$nama_pasien', '$dok_identitas', '$nomor_identitas','$jenis_kelamin', '$alamat', '$no_telp')";
        if (mysqli_query($connect, $sql_insert_pasien)) {
            $_SESSION['sukses'] = "menambahkan data pasien";
            echo "<script>window.location='" . base_url('pasien') . "';</script>";
        } else {
            $_SESSION['gagal'] = "menambahkan data pasien";
            echo "<script>window.location='" . base_url('pasien/form_pasien.php') . "';</script>";
        }
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_pasien = "UPDATE tb_pasien SET nama_pasien = '$nama_pasien', dok_identitas = '$dok_identitas', nomor_identitas = '$nomor_identitas', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp' WHERE id_pasien = '$id_pasien'";
    if (mysqli_query($connect, $sql_update_pasien)) {
        $_SESSION['sukses'] = "mengubah data pasien";
        echo "<script>window.location='" . base_url('pasien') . "';</script>";
    } else {
        $_SESSION['gagal'] = "mengubah data pasien";
        echo "<script>window.location='" . base_url('pasien/form_pasien.php?id=' . $id_pasien . '') . "';</script>";
    }
}
