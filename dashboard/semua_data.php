<?php
include_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

// Menghitung jumlah pasien di database
$sql_pasien = mysqli_query($connect, "SELECT * FROM tb_pasien");
$jumlah_pasien = mysqli_num_rows($sql_pasien);

// Menghitung jumlah dokter di database
$sql_dokter = mysqli_query($connect, "SELECT * FROM tb_dokter");
$jumlah_dokter = mysqli_num_rows($sql_dokter);

// Menghitung jumlah poliklinik di database
$sql_poliklinik = mysqli_query($connect, "SELECT * FROM tb_poliklinik");
$jumlah_poliklinik = mysqli_num_rows($sql_poliklinik);

// Menghitung jumlah obat di database
$sql_obat = mysqli_query($connect, "SELECT * FROM tb_obat");
$jumlah_obat = mysqli_num_rows($sql_obat);

// Menghitung jumlah rekam medis di database
$sql_rm = mysqli_query($connect, "SELECT * FROM tb_rekam_medis");
$jumlah_rm = mysqli_num_rows($sql_rm);
