<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>Obat</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> Obat</small>
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
            <form action="proses_obat.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_obat = $_GET['id'];
                    $sql_obat = mysqli_query($connect, "SELECT * FROM tb_obat WHERE id_obat = '$id_obat'") or die(mysqli_error($connect));
                    $data_obat = mysqli_fetch_array($sql_obat);
                } else {
                    $data_obat = [
                        'id_obat' => null,
                        'nama_obat' => null,
                        'jenis_obat' => null,
                        'satuan' => null,
                        'harga' => null,
                        'keterangan' => null
                    ];
                }
                ?>
                <div class="form-group">
                    <label for="nama">Nama Obat</label>
                    <input type="hidden" name="id_obat" class="form-control" value="<?= $data_obat['id_obat']; ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $data_obat['nama_obat'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="jenis_obat">Jenis Obat</label>
                    <input type="text" name="jenis_obat" class="form-control" value="<?= $data_obat['jenis_obat'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select id="single2" class="form-control select2-single" name="satuan_obat" required>
                        <option></option>
                        <option value="<?= $data_obat['satuan'] ?>" <?= $data_obat['satuan'] != null ? 'selected' : '' ?>><?= $data_obat['satuan'] ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $data_obat['harga'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="5" style="resize: none;" required><?= $data_obat['keterangan'] ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../_footer.php'; ?>