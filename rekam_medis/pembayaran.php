<?php
include_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

$id_rm = mysqli_escape_string($connect, $_POST['id_rm']);
$jenis_pembayaran = trim(mysqli_escape_string($connect, $_POST['jenis_pembayaran']));
$total = trim(mysqli_escape_string($connect, $_POST['total']));

$sql_update_pembayaran = "UPDATE tb_rekam_medis SET jenis_pembayaran = '$jenis_pembayaran', total_pembayaran = '$total' WHERE id_rm = '$id_rm'";
if (mysqli_query($connect, $sql_update_pembayaran)) {
    $_SESSION['sukses'] = "melakukan pembayaran";
    echo "<script>window.location='" . base_url('rekam_medis') . "';</script>";
}
