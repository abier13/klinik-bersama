<?php
include_once '../_header.php';
include_once '../_config/tidaklogin.php';
include_once 'semua_data.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <p>Selamat Datang <strong><?= $nama_user ?></strong> di Website Klinik Bersama</p>
        <?php if (isset($_SESSION['notif'])) {    ?>
            <div class="alert alert-success" role="alert">
                <strong><?= $nama_user ?></strong> <?= $_SESSION['notif']; ?>
            </div>
        <?php
            unset($_SESSION['notif']);
        } ?>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <img src="../_assets/images/icon/pasien.png" alt="icon-pasien" width="100">
                <div class="caption">
                    <h4>Jumlah Data Pasien</h4>
                    <h3><strong><?= $jumlah_pasien; ?></strong></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <img src="../_assets/images/icon/dokter.png" alt="icon-dokter" width="100">
                <div class="caption">
                    <h4>Jumlah Data Dokter</h4>
                    <h3><strong><?= $jumlah_dokter; ?></strong></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <img src="../_assets/images/icon/poliklinik.png" alt="icon-poliklinik" width="100">
                <div class="caption">
                    <h4>Jumlah Data Poliklinik</h4>
                    <h3><strong><?= $jumlah_poliklinik; ?></strong></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <img src="../_assets/images/icon/obat.png" alt="icon-obat" width="100">
                <div class="caption">
                    <h4>Jumlah Data Obat</h4>
                    <h3><strong><?= $jumlah_obat; ?></strong></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <img src="../_assets/images/icon/rekam_medis.png" alt="icon-rekam_medis.png" width="100">
                <div class="caption">
                    <h4>Jumlah Data Rekam Medis</h4>
                    <h3><strong><?= $jumlah_rm; ?></strong></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>

<?php include_once '../_footer.php'; ?>