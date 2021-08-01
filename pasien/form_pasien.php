<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>Pasien</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> Pasien</small>
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
            <form action="proses_pasien.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_pasien = $_GET['id'];
                    $sql_pasien = mysqli_query($connect, "SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'") or die(mysqli_error($connect));
                    $data_pasien = mysqli_fetch_array($sql_pasien);
                } else {
                    $data_pasien = [
                        'id_pasien' => null,
                        'nama_pasien' => null,
                        'dok_identitas' => null,
                        'nomor_identitas' => null,
                        'jenis_kelamin' => null,
                        'alamat' => null,
                        'NO_TELP' => null
                    ];
                }
                ?>
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="hidden" name="id_pasien" class="form-control" value="<?= $data_pasien['id_pasien'] ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $data_pasien['nama_pasien'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="dok_identitas">Dokumen Identitas</label>
                    <select class="form-control" name="dok_identitas" required>
                        <option value="">--- Pilih Dokumen Identitas ---</option>
                        <option value="KTP" <?= $data_pasien['dok_identitas'] == "KTP" ? 'selected' : '' ?>>KTP</option>
                        <option value="SIM" <?= $data_pasien['dok_identitas'] == "SIM" ? 'selected' : '' ?>>SIM</option>
                        <option value="Paspor" <?= $data_pasien['dok_identitas'] == "Paspor" ? 'selected' : '' ?>>Paspor</option>
                        <option value="Kitas" <?= $data_pasien['dok_identitas'] == "Kitas" ? 'selected' : '' ?>>Kitas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_identitas">Nomor Identitas</label>
                    <input type="text" name="nomor_identitas" class="form-control" value="<?= $data_pasien['nomor_identitas'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="">--- Pilih Jenis Kelamin ---</option>
                        <option value="Pria" <?= $data_pasien['jenis_kelamin'] == "Pria" ? 'selected' : '' ?>>Pria</option>
                        <option value="Wanita" <?= $data_pasien['jenis_kelamin'] == "Wanita" ? 'selected' : '' ?>>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="5" style="resize: none;" required><?= $data_pasien['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="number" name="no_telp" class="form-control" value="<?= $data_pasien['no_telp'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../_footer.php'; ?>