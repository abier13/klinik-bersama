<?php
require_once '_config/config.php';
include_once '../_config/tidaklogin.php';
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Klinik Bersama</title>
    <link rel="icon" href="<?= base_url() ?>/_assets/images/logo.ico">

    <!-- CSS -->
    <link href="<?= base_url() ?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/_assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?= base_url() ?>/_assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/_assets/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/_assets/css/select2-bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>/_assets/css/style.css" rel="stylesheet">


    <!-- JS -->
    <script src="<?= base_url() ?>/_assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/_assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/_assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/_assets/js/select2.full.js"></script>
</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <img class="mb-4" src="<?= base_url() ?>/_assets/images/logo.svg" alt="" width="52" height="27"> Klinik Bersama
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard') ?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('pasien') ?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?= base_url('dokter') ?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?= base_url('poliklinik') ?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?= base_url('obat') ?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?= base_url('rekam_medis') ?>">Rekam Medis</a>
                </li>
                <?php
                if ($level == "superadmin") {
                ?>
                    <li>
                        <a href="<?= base_url('user') ?>">Data User</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="<?= base_url('auth/logout.php') ?>" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>