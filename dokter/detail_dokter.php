<?php
include_once '../_header.php';
?>

<div class="box">
    <h2>Dokter</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Detail Dokter</small>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="text-center" style="margin-bottom: 50px;">
                <h3>
                    <strong> Detail Data Dokter</strong>
                </h3>
            </div>
            <div class="table-responsive">
                <table class="display table table-striped table-bordered table-hover" style="width: 100%;">
                    <?php
                    $id_dokter = $_GET['id'];
                    $sql_select_dokter = mysqli_query($connect, "SELECT * FROM tb_dokter WHERE id_dokter = '$id_dokter'") or die(mysqli_error($connect));

                    while ($data_dokter = mysqli_fetch_array($sql_select_dokter)) {
                    ?>
                        <tr>
                            <th width="25%">Nama Dokter</th>
                            <td style="text-align: center; width:5%;">:</td>
                            <td width="70%"><?= $data_dokter['nama_dokter']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_dokter['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th>Spesialis</th>
                            <td style="text-align: center;">:</td>
                            <td>Dokter Spesialis <?= $data_dokter['spesialis']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_dokter['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td style="text-align: center;">:</td>
                            <td><?= $data_dokter['no_telp']; ?></td>
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