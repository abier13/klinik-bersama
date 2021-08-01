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
$id_obat = mysqli_escape_string($connect, $_POST['id_obat']);
$nama_obat = trim(mysqli_escape_string($connect, $_POST['nama']));
$jenis_obat = trim(mysqli_escape_string($connect, $_POST['jenis_obat']));
$satuan_obat = trim(mysqli_escape_string($connect, $_POST['satuan_obat']));
$harga = trim(mysqli_escape_string($connect, $_POST['harga']));
$keterangan = trim(mysqli_escape_string($connect, $_POST['keterangan']));

if ($_POST['simpan'] == "Tambah") {
    $sql_insert_obat = "INSERT INTO tb_obat (id_obat, nama_obat, jenis_obat, satuan, harga, keterangan) VALUES ('$uuid', '$nama_obat', '$jenis_obat', '$satuan_obat','$harga','$keterangan')";
    if (mysqli_query($connect, $sql_insert_obat)) {
        $_SESSION['sukses'] = "menambahkan data obat";
        echo "<script>window.location='" . base_url('obat') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menambahkan data obat";
        echo "<script>window.location='" . base_url('obat/form_obat.php') . "';</script>";
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_obat = "UPDATE tb_obat SET nama_obat = '$nama_obat', jenis_obat = '$jenis_obat', satuan = '$satuan_obat', harga = '$harga', keterangan = '$keterangan' WHERE id_obat = '$id_obat'";
    if (mysqli_query($connect, $sql_update_obat)) {
        $_SESSION['sukses'] = "mengubah data obat";
        echo "<script>window.location='" . base_url('obat') . "';</script>";
    } else {
        $_SESSION['gagal'] = "mengubah data obat";
        echo "<script>window.location='" . base_url('obat/form_obat.php?id=' . $id_obat . '') . "';</script>";
    }
}
