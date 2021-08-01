<?php
include_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

if (!isset($_POST['checked'])) {
    echo "<script type='text/javascript'>alert('Tidak ada data yang dipilih'); window.location = 'index.php';</script>";
} else {
    $pilih = $_POST['checked'];
    foreach ($pilih as $row) {
        $sql_delete = mysqli_query($connect, "DELETE FROM tb_rekam_medis WHERE id_rm = '$row'") or die(mysqli_error($connect));
    }

    if ($sql_delete) {
        $_SESSION['sukses'] = "menghapus " . count($pilih) . " data rekam medis";
        echo "<script>window.location='" . base_url('rekam_medis') . "';</script>";
    } else {
        $_SESSION['gagal'] = "menghapus data rekam medis";
        echo "<script>window.location='" . base_url('rekam_medis') . "';</script>";
    }
}
