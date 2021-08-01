<?php include_once '../_header.php'; ?>

<div class="box">
    <h2>Pasien</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Data Pasien</small>
        <div class="pull-right">
            <a href="form_pasien.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Pasien</a>
            <a href="../export/data_pasien.php" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;Export Data</a>
            <button class="btn btn-danger btn-xs" id="hapus_pasien"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus Pasien</button>
        </div>
    </h4>
    <?php if (isset($_SESSION['sukses'])) {    ?>
        <div class="alert alert-success" role="alert">
            <strong>Berhasil</strong> <?= $_SESSION['sukses']; ?>
        </div>
    <?php
        unset($_SESSION['sukses']);
    } ?>

    <?php if (isset($_SESSION['gagal'])) {    ?>
        <div class="alert alert-success" role="alert">
            <strong>Berhasil</strong> <?= $_SESSION['gagal']; ?>
        </div>
    <?php
        unset($_SESSION['gagal']);
    } ?>

    <form name="proses" method="POST">
        <div class="table-responsive">
            <table id="dataTable" class="display table table-striped table-bordered table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th style="width: 20%; text-align: center;">Nama Pasien</th>
                        <th style="width: 20%; text-align: center;">Dokumen Identitas</th>
                        <th style="width: 10%; text-align: center;">No Telepon</th>
                        <th style="width: 10%; text-align: center;"><i class="glyphicon glyphicon-cog"></i> &nbsp; <input type="checkbox" id="select_all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_pasien = mysqli_query($connect, "SELECT * FROM tb_pasien");
                    while ($data_pasien = mysqli_fetch_array($sql_select_pasien)) {
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $data_pasien['nama_pasien']; ?></td>
                            <td><?= $data_pasien['dok_identitas']; ?></td>
                            <td><?= $data_pasien['no_telp']; ?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <a href="form_pasien.php?id=<?= $data_pasien['id_pasien']; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                <a href="detail_pasien.php?id=<?= $data_pasien['id_pasien']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp;
                                <input type="checkbox" name="checked[]" class="check" value="<?= $data_pasien['id_pasien']; ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include_once '../_footer.php'; ?>