<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>Poliklinik</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> Poliklinik</small>
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
            <form action="proses_poliklinik.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_poliklinik = $_GET['id'];
                    $sql_poliklinik = mysqli_query($connect, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id_poliklinik'") or die(mysqli_error($connect));
                    $data_poliklinik = mysqli_fetch_array($sql_poliklinik);
                } else {
                    $data_poliklinik = [
                        'id_poli' => null,
                        'nama_poli' => null,
                        'lokasi' => null
                    ];
                }
                ?>
                <div class="form-group">
                    <label for="nama">Nama Poliklinik</label>
                    <input type="hidden" name="id_poli" class="form-control" value="<?= $data_poliklinik['id_poli']; ?>">
                    <select id="single2poli" class="form-control select2-single" name="nama_poli" required autofocus>
                        <option></option>
                        <option value="<?= $data_poliklinik['nama_poli'] ?>" <?= $data_poliklinik['nama_poli'] != null ? 'selected' : '' ?>><?= $data_poliklinik['nama_poli'] ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Poli</label>
                    <input type="text" name="lokasi" class="form-control" value="<?= $data_poliklinik['lokasi'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../_footer.php'; ?>