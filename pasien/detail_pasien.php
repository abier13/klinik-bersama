<?php
include_once '../_header.php';
?>

<div class="box">
    <h2>Pasien</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Detail Pasien</small>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="text-center" style="margin-bottom: 50px;">
                <h3>
                    <strong> Detail Data Pasien</strong>
                </h3>
            </div>
            <div class="table-responsive">
                <table class="display table table-striped table-bordered table-hover" style="width: 100%;">
                    <?php
                    $id_pasien = $_GET['id'];
                    $sql_select_pasien = mysqli_query($connect, "SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'") or die(mysqli_error($connect));

                    while ($data_pasien = mysqli_fetch_array($sql_select_pasien)) {
                    ?>
                        <tr>
                            <th width="30%">Nama Pasien</th>
                            <td style="text-align: center; width: 5%;">:</td>
                            <td width="65%"><?= $data_pasien['nama_pasien']; ?></td>
                        </tr>
                        <tr>
                            <th>Dokumen Identitas</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_pasien['dok_identitas']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Identitas</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_pasien['nomor_identitas']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_pasien['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_pasien['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_pasien['no_telp']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <a href="index.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../_footer.php'; ?>