<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>Dokter</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> Dokter</small>
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
            <form action="proses_dokter.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_dokter = $_GET['id'];
                    $sql_dokter = mysqli_query($connect, "SELECT * FROM tb_dokter WHERE id_dokter = '$id_dokter'") or die(mysqli_error($connect));
                    $data_dokter = mysqli_fetch_array($sql_dokter);
                } else {
                    $data_dokter = [
                        'id_dokter' => null,
                        'nama_dokter' => null,
                        'jenis_kelamin' => null,
                        'spesialis' => null,
                        'alamat' => null,
                        'no_telp' => null
                    ];
                }
                ?>
                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="hidden" name="id_dokter" class="form-control" value="<?= $data_dokter['id_dokter'] ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $data_dokter['nama_dokter'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="">--- Pilih Jenis Kelamin ---</option>
                        <option value="Pria" <?= $data_dokter['jenis_kelamin'] == "Pria" ? 'selected' : '' ?>>Pria</option>
                        <option value="Wanita" <?= $data_dokter['jenis_kelamin'] == "Wanita" ? 'selected' : '' ?>>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="satuan">Spesialis</label>
                    <select id="single2dokter" class="form-control select2-single" name="spesialis" required>
                        <option></option>
                        <option value="<?= $data_dokter['spesialis'] ?>" <?= $data_dokter['spesialis'] != null ? 'selected' : '' ?>><?= $data_dokter['spesialis'] ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="5" style="resize: none;" required><?= $data_dokter['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="number" name="no_telp" class="form-control" value="<?= $data_dokter['no_telp'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../_footer.php'; ?>