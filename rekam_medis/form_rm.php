<?php
include_once '../_header.php';
if (isset($_GET['id']) != null) {
    $page = "Edit";
} else {
    $page = "Tambah";
}
?>

<div class="box">
    <h2>Rekam Medis</h2>
    <h4 style="margin-bottom: 25px;">
        <small><?= $page; ?> Rekam Medis</small>
        <div class="pull-right">
            <a href="index.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_SESSION['gagal'])) {    ?>
                <div class=" alert alert-danger" role="alert">
                    <strong>Gagal</strong> <?= $_SESSION['gagal']; ?>
                </div>
            <?php
                unset($_SESSION['gagal']);
            } ?>
            <form action="proses_rm.php" method="POST">
                <?php
                if (isset($_GET['id']) != null) {
                    $id_rm = $_GET['id'];
                    $sql_rm = mysqli_query($connect, "SELECT * FROM tb_rekam_medis JOIN tb_pasien ON tb_pasien.id_pasien = tb_rekam_medis.id_pasien JOIN tb_dokter ON tb_dokter.id_dokter = tb_rekam_medis.id_dokter JOIN tb_poliklinik ON tb_poliklinik.id_poli = tb_rekam_medis.id_poli WHERE id_rm = '$id_rm'") or die(mysqli_error($connect));
                    $data_rm = mysqli_fetch_array($sql_rm);
                } else {
                    $data_rm = [
                        'id_rm' => null,
                        'id_pasien' => null,
                        'id_dokter' => null,
                        'id_poli' => null,
                        'keluhan' => null,
                        'diagnosa' => null,
                        'tgl_periksa' => date('Y-m-d')
                    ];
                }
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="hidden" name="id_rm" class="form-control" value="<?= $data_rm['id_rm'] ?>">
                            <select id="select2pasien" class="form-control select2-single" name="id_pasien" required>
                                <option></option>
                                <option value="<?= $data_rm['id_pasien'] ?>" <?= $data_rm['id_pasien'] != null ? 'selected' : '' ?>><?= $data_rm['nama_pasien'] ?></option>
                                <?php
                                $sql_pasien = mysqli_query($connect, "SELECT * FROM tb_pasien");
                                while ($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                ?>
                                    <option value="<?= $data_pasien['id_pasien'] ?>"><?= $data_pasien['nama_pasien'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="id_poli">Nama Dokter</label>
                            <select id="select2dokter" class="form-control select2-single" name="id_dokter" required>
                                <option></option>
                                <option value="<?= $data_rm['id_dokter'] ?>" <?= $data_rm['id_dokter'] != null ? 'selected' : '' ?>><?= $data_rm['nama_dokter'] ?></option>
                                <?php
                                $sql_dokter = mysqli_query($connect, "SELECT * FROM tb_dokter");
                                while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                ?>
                                    <option value="<?= $data_dokter['id_dokter'] ?>"><?= $data_dokter['nama_dokter'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="id_poli">Nama Poliklinik</label>
                            <select id="select2poli" class="form-control select2-single" name="id_poli" required>
                                <option></option>
                                <option value="<?= $data_rm['id_poli'] ?>" <?= $data_rm['id_poli'] != null ? 'selected' : '' ?>><?= $data_rm['nama_poli'] ?></option>
                                <?php
                                $sql_poli = mysqli_query($connect, "SELECT * FROM tb_poliklinik");
                                while ($data_poli = mysqli_fetch_array($sql_poli)) {
                                ?>
                                    <option value="<?= $data_poli['id_poli'] ?>"><?= $data_poli['nama_poli'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <textarea name="keluhan" class="form-control" id="keluhan" rows="3" style="resize: none;" required><?= $data_rm['keluhan'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa</label>
                            <textarea name="diagnosa" class="form-control" id="diagnosa" rows="3" style="resize: none;" required><?= $data_rm['diagnosa'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="diagnosa">Tanggal Periksa</label>
                            <input type="date" class="form-control" name="tgl_periksa" value="<?= $data_rm['tgl_periksa'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row col-lg-12 " style="margin-bottom: 25px;">
                    <button id="tambahInput" type="button" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Obat</button>
                </div>
                <div class="row">
                    <div id="inputObat">
                        <?php
                        if (isset($_GET['id']) != null) {
                            $id_rm = $_GET['id'];
                        } else {
                            $id_rm = null;
                        }
                        $sql_select_rm_obat = mysqli_query($connect, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_obat.id_obat = tb_rm_obat.id_obat WHERE id_rm = '$id_rm'");
                        while ($row = mysqli_fetch_array($sql_select_rm_obat)) {
                        ?>
                            <div class="form-group col-lg-5">
                                <select class="form-control select2obat" name="id_obat[]" required>
                                    <option></option>
                                    <option value="<?= $row['id_obat'] ?>" <?= $row['id_obat'] != null ? 'selected' : '' ?>><?= $row['nama_obat'] ?></option>
                                    <?php
                                    $sql_obat = mysqli_query($connect, "SELECT * FROM tb_obat");
                                    while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                    ?>
                                        <option value="<?= $data_obat['id_obat'] ?>"><?= $data_obat['nama_obat'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-5">
                                <input type="text" class="form-control" name="keterangan[]" placeholder="Keterangan" value="<?= $row['catatan'] != null ? $row['catatan'] : '' ?>" required>
                            </div>
                            <div class="form-group col-lg-2">
                                <button id="hapusInput" type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="newRow"></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="simpan" class="btn btn-primary" value="<?= $page ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // add row
        $("#tambahInput").click(function(e) {
            var html = '';
            html += '<div id="inputObat">';
            html += '<div class="form-group col-lg-5">';
            html += '<select class="form-control select2obat" name="id_obat[]" required>';
            html += '<option></option>';
            <?php
            $sql_obat = mysqli_query($connect, "SELECT * FROM tb_obat");
            while ($data_obat = mysqli_fetch_array($sql_obat)) {
            ?>
                html += '<option value="<?= $data_obat['id_obat'] ?>"><?= $data_obat['nama_obat'] ?></option>';
            <?php } ?>
            html += '</select>';
            html += '</div>';
            html += '<div class="form-group col-lg-5">';
            html += '<input type="text" class="form-control" name="keterangan[]" placeholder="Keterangan">';
            html += '</div>';
            html += '<div class="form-group col-lg-2">';
            html += '<button id="hapusInput" type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);

            var placeholder = "Pilih Obat"
            $(".select2obat").select2({
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            });
        });

        // remove row
        $(document).on('click', '#hapusInput', function() {
            $(this).closest('#inputObat').remove();
        });


    });
</script>

<?php include_once '../_footer.php'; ?>