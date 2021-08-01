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
$id_rm = mysqli_escape_string($connect, $_POST['id_rm']);
$id_pasien = trim(mysqli_escape_string($connect, $_POST['id_pasien']));
$id_dokter = trim(mysqli_escape_string($connect, $_POST['id_dokter']));
$id_poli = trim(mysqli_escape_string($connect, $_POST['id_poli']));
$keluhan = trim(mysqli_escape_string($connect, $_POST['keluhan']));
$diagnosa = trim(mysqli_escape_string($connect, $_POST['diagnosa']));
$tgl_periksa = trim(mysqli_escape_string($connect, $_POST['tgl_periksa']));
$id_obat = $_POST['id_obat'];
$keterangan = $_POST['keterangan'];
$hitung = count($id_obat);

if ($_POST['simpan'] == "Tambah") {
    $sql_insert_rm = "INSERT INTO tb_rekam_medis (id_rm, id_pasien, id_dokter, id_poli, keluhan, diagnosa, tgl_periksa) VALUES ('$uuid', '$id_pasien','$id_dokter','$id_poli','$keluhan','$diagnosa','$tgl_periksa')";
    if (mysqli_query($connect, $sql_insert_rm)) {
        for ($i = 0; $i < $hitung; $i++) {
            $sql_insert_rm_obat = mysqli_query($connect, "INSERT INTO tb_rm_obat (id_rm, id_obat, catatan) VALUES ('$uuid','$id_obat[$i]','$keterangan[$i]')");
        }
        $_SESSION['sukses'] = "menambahkan data rekam medis";
        echo "<script>window.location='" . base_url('rekam_medis') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menambahkan data rekam_medis";
        echo "<script>window.location='" . base_url('rekam_medis/form_rm.php') . "';</script>";
    }
} else if ($_POST['simpan'] == "Edit") {
    $sql_update_rm = "UPDATE tb_rekam_medis SET id_pasien = '$id_pasien', id_dokter = '$id_dokter', id_poli = '$id_poli', keluhan = '$keluhan', diagnosa = '$diagnosa', tgl_periksa = '$tgl_periksa' WHERE id_rm = '$id_rm'";
}
