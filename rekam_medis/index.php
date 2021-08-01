<?php include_once '../_header.php'; ?>

<div class="box">
    <h2>Rekam Medis</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Data Rekam Medis</small>
        <div class="pull-right">
            <a href="form_rm.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Rekam Medis</a>
            <a href="../export/data_rm.php" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;Export Data</a>
            <button class="btn btn-danger btn-xs" id="hapus_rm"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus Rekam Medis</button>
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
            <table id="dataTableRm" class="display table table-striped table-bordered table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th style="width: 30%; text-align: center;">Nama Pasien</th>
                        <th style="width: 30%; text-align: center;">Nama Dokter</th>
                        <th style="width: 20%; text-align: center;">Tanggal Periksa</th>
                        <th style="width: 15%; text-align: center;"><i class="glyphicon glyphicon-cog"></i> &nbsp; <input type="checkbox" id="select_all"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql_select_rm = mysqli_query($connect, "SELECT * FROM tb_rekam_medis JOIN tb_pasien ON tb_pasien.id_pasien = tb_rekam_medis.id_pasien JOIN tb_dokter ON tb_dokter.id_dokter = tb_rekam_medis.id_dokter");
                    while ($row = mysqli_fetch_array($sql_select_rm)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_pasien']; ?></td>
                            <td><?= $row['nama_dokter']; ?></td>
                            <td style="text-align: center;"><?= date('d F Y', strtotime($row['tgl_periksa'])); ?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <a href="form_rm.php?id=<?= $row['id_rm']; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <?php if ($row['jenis_pembayaran'] == null) { ?>
                                    <a href="pembayaran_rm.php?id=<?= $row['id_rm']; ?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-tasks"></i></a>
                                <?php } else { ?>
                                    <a href="detail_rm.php?id=<?= $row['id_rm']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <?php } ?>
                                <input type="checkbox" name="checked[]" class="check" value="<?= $row['id_rm']; ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        //Datatable
        var t = $('#dataTableRm').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0,
                "className": "dt-center"
            }],
            "order": [
                [3, 'desc']
            ]
        });
        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script>
<?php include_once '../_footer.php'; ?>