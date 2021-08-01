<?php include_once '../_config/config.php';
include_once '../_config/tidaklogin.php'; ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Detail Rekam Medis</title>
    <link rel="stylesheet" href="../_assets/css/style-rm.css">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
</head>

<body>
    <header>
        <h1>Detail Rekam Medis</h1>
    </header>
    <?php
    $id_rm = $_GET['id'];
    $sql_select_rm = mysqli_query($connect, "SELECT * FROM tb_rekam_medis JOIN tb_pasien ON tb_pasien.id_pasien = tb_rekam_medis.id_pasien JOIN tb_dokter ON tb_dokter.id_dokter = tb_rekam_medis.id_dokter JOIN tb_poliklinik ON tb_poliklinik.id_poli = tb_rekam_medis.id_poli WHERE id_rm = '$id_rm'") or die(mysqli_error($connect));

    $row = mysqli_fetch_array($sql_select_rm);
    ?>
    <article>
        <table class="meta" style="margin-right: 200px;">
            <tr>
                <th><span>Nama Pasien</span></th>
                <td><span><?= $row['nama_pasien']; ?></span></td>
            </tr>
            <tr>
                <th><span>Nama Dokter</span></th>
                <td><span><?= $row['nama_dokter']; ?></span></td>
            </tr>
            <tr>
                <th><span>Poliklinik</span></th>
                <td><span>Poli <?= $row['nama_poli']; ?></span></td>
            </tr>
        </table>
        <table class="meta">
            <tr>
                <th><span>Tanggal</span></th>
                <td><span><?= date("d F Y", strtotime($row['tgl_periksa'])); ?></span></td>
            </tr>
            <tr>
                <th><span>Pembayaran</span></th>
                <td><span><?= $row['jenis_pembayaran']; ?></span></td>
            </tr>
            <tr>
                <th><span>Total</span></th>
                <td><span>Rp. <?= number_format($row['total_pembayaran']); ?></span></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th>Nama Obat</span></th>
                    <th>Harga Obat</span></th>
                    <th>Catatan</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sub_total = 0;
                $sql_select = mysqli_query($connect, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_obat.id_obat = tb_rm_obat.id_obat  WHERE id_rm = '$id_rm'");
                while ($row = mysqli_fetch_array($sql_select)) {
                    $sub_total += $row['harga'];
                ?>
                    <tr>
                        <td><?= $row['nama_obat']; ?></td>
                        <td>Rp. <?= number_format($row['harga']); ?></td>
                        <td><?= $row['catatan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table class="balance">
            <tr>
                <th><span>Sub Total Obat</span></th>
                <td><span>Rp. <?= number_format($sub_total); ?></span></td>
            </tr>
            <tr>
                <th><span>Biaya Administrasi</span></th>
                <td><span>Rp. <?= number_format(10000); ?></span></td>
            </tr>
            <tr>
                <th><span>Biaya Periksa Dokter</span></th>
                <td><span>Rp. <?= number_format(35000); ?></span></td>
            </tr>
            <tr>
                <th><span>Total Keseluruhan</span></th>
                <td><span>Rp. <?= number_format($sub_total + 10000 + 35000); ?></span></td>
            </tr>
        </table>
    </article>
    <a href="<?= base_url('rekam_medis') ?>" class="button-kembali">
        << Kembali </a>
</body>

</html>