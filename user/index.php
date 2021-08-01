<?php include_once '../_header.php'; ?>

<div class="box">
    <h2>User</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Data User</small>
        <div class="pull-right">
            <a href="form_user.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah User</a>
            <button class="btn btn-danger btn-xs" id="hapus_user"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus User</button>
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
                        <th style="width: 20%; text-align: center;">Nama User</th>
                        <th style="width: 20%; text-align: center;">Username</th>
                        <th style="width: 10%; text-align: center;">Level</th>
                        <th style="width: 10%; text-align: center;"><i class="glyphicon glyphicon-cog"></i> &nbsp; <input type="checkbox" id="select_all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_user = mysqli_query($connect, "SELECT * FROM tb_user");
                    while ($data_user = mysqli_fetch_array($sql_select_user)) {
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $data_user['nama_user']; ?></td>
                            <td><?= $data_user['username']; ?></td>
                            <td><?= $data_user['level']; ?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <a href="form_user.php?id=<?= $data_user['id_user']; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                <input type="checkbox" name="checked[]" class="check" value="<?= $data_user['id_user']; ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<?php include_once '../_footer.php'; ?>