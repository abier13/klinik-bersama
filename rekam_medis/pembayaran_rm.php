<?php
include_once '../_header.php';
$id = $_GET['id'];
include_once '../_config/tidaklogin.php';
?>

<div class="box">
    <h2>Rekam Medis</h2>
    <h4 style="margin-bottom: 25px;">
        <small>Halaman Pembayaran</small>
        <div class="pull-right">
            <a href="index.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="pembayaran.php" method="POST">
                <div class="form-group">
                    <label for="jenis_pembayaran">Jenis Pembayaran</label> <br>
                    <input type="hidden" name="id_rm" class="form-control" value="<?= $id ?>">
                    <input type="radio" id="bpjs" name="jenis_pembayaran" value="BPJS"> BPJS &nbsp; &nbsp;
                    <input type="radio" id="cash" name="jenis_pembayaran" value="Cash"> Cash
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="disabled" name="total" class="form-control" id="total" required readonly>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#bpjs').click(function() {
            $('#total').val('0');
        });
        $('#cash').click(function() {
            <?php
            $total = 0;
            $admin = 10000;
            $dokter = 35000;
            $sql_select = mysqli_query($connect, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_obat.id_obat = tb_rm_obat.id_obat WHERE id_rm = '$id'");
            while ($row = mysqli_fetch_array($sql_select)) {
                $total = $total + $row['harga'];
            }
            $grand_total = $total + $admin + $dokter;
            ?>
            $('#total').val('<?= $grand_total; ?>');
        });
    });
</script>

<?php include_once '../_footer.php'; ?>