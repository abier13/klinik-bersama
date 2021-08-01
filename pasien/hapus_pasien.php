<?php
include_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

if (!isset($_POST['checked'])) {
    echo "<script type='text/javascript'>alert('Tidak ada data yang dipilih'); window.location = 'index.php';</script>";
} else {
    $pilih = $_POST['checked'];
    foreach ($pilih as $row) {
        $sql_delete = mysqli_query($connect, "DELETE FROM tb_pasien WHERE id_pasien = '$row'") or die(mysqli_error($connect));
    }

    if ($sql_delete) {
        $_SESSION['sukses'] = "menghapus " . count($pilih) . " data pasien";
        echo "<script>window.location='" . base_url('pasien') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menghapus data pasien";
        echo "<script>window.location='" . base_url('pasien') . "';</script>";
    }
}
