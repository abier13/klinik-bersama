<?php include_once '../_header.php'; ?>

<div class="box">
    <h2>Poliklinik</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Data Poliklinik</small>
        <div class="pull-right">
            <a href="form_poliklinik.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Poliklinik</a>
            <button class="btn btn-danger btn-xs" id="hapus_poliklinik"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus Poliklinik</button>
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
                        <th style="width: 20%; text-align: center;">Nama Poliklinik</th>
                        <th style="width: 20%; text-align: center;">Lokasi Poliklinik</th>
                        <th style="width: 10%; text-align: center;"><i class="glyphicon glyphicon-cog"></i> &nbsp; <input type="checkbox" id="select_all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_poliklinik = mysqli_query($connect, "SELECT * FROM tb_poliklinik");
                    while ($data_poliklinik = mysqli_fetch_array($sql_select_poliklinik)) {
                    ?>
                        <tr>
                            <td></td>
                            <td>Poli <?= $data_poliklinik['nama_poli']; ?></td>
                            <td><?= $data_poliklinik['lokasi']; ?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <a href="form_poliklinik.php?id=<?= $data_poliklinik['id_poli']; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                <input type="checkbox" name="checked[]" class="check" value="<?= $data_poliklinik['id_poli']; ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<?php include_once '../_footer.php'; ?>