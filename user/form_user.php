<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>User</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> User</small>
        <div class="pull-right">
            <a href="index.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php if (isset($_SESSION['gagal'])) {    ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Gagal</strong> <?= $_SESSION['gagal']; ?>
                </div>
            <?php
                unset($_SESSION['gagal']);
            } ?>
            <form action="proses_user.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_user = $_GET['id'];
                    $sql_user = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user = '$id_user'") or die(mysqli_error($connect));
                    $data_user = mysqli_fetch_array($sql_user);
                } else {
                    $data_user = [
                        'id_user' => null,
                        'nama_user' => null,
                        'username' => null,
                        'password' => null,
                        'level' => null
                    ];
                }
                ?>
                <div class="form-group">
                    <label for="nama">Nama User</label>
                    <input type="hidden" name="id_user" class="form-control" value="<?= $data_user['id_user']; ?>">
                    <input type="text" name="nama_user" class="form-control" value="<?= $data_user['nama_user'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $data_user['username'] ?>" required>
                </div>
                <?php if ($page == "Tambah") { ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ulangin_password">Ulangi Password</label>
                        <input type="password" name="ulangi_password" class="form-control" required>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level" required>
                        <option value="">--- Pilih Level ---</option>
                        <option value="superadmin" <?= $data_user['level'] == "superadmin" ? 'selected' : '' ?>>superadmin</option>
                        <option value="dokter" <?= $data_user['level'] == "dokter" ? 'selected' : '' ?>>dokter</option>
                        <option value="apoteker" <?= $data_user['level'] == "apoteker" ? 'selected' : '' ?>>apoteker</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../_footer.php'; ?>