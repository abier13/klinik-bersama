<?php

require_once '../_config/fpdf/fpdf.php';
require_once '../_config/config.php';
include_once '../_config/tidaklogin.php';

// Membuat object FPDF
$pdf = new FPDF('l', 'mm', 'A4');

//Halaman baru
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '14');

//Title
$pdf->Image('../_assets/images/logo-export.png', 100, 10);
$pdf->Cell(275, 7, 'Klinik Bersama', 0, 1, 'C');
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(275, 10, 'Export Data Rekam Medis', 0, 1, 'C');
$pdf->Ln(10);

//Header Table
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama Pasien', 1, 0, 'C');
$pdf->Cell(80, 10, 'Nama Dokter', 1, 0, 'C');
$pdf->Cell(60, 10, 'Diagnosa', 1, 0, 'C');
$pdf->Cell(55, 10, 'Tanggal Diperiksa', 1, 0, 'C');
$pdf->Cell(30, 10, 'Pembayaran', 1, 1, 'C');

//Isi Table
$pdf->SetFont('Arial', '', 10);
$no = 1;
$sql_select = mysqli_query($connect, "SELECT * FROM tb_rekam_medis JOIN tb_pasien ON tb_pasien.id_pasien = tb_rekam_medis.id_pasien JOIN tb_dokter ON tb_dokter.id_dokter = tb_rekam_medis.id_dokter ORDER BY tgl_periksa DESC");
while ($data_row = mysqli_fetch_array($sql_select)) {

    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $data_row['nama_pasien'], 1);
    $pdf->Cell(80, 10, $data_row['nama_dokter'], 1, 0, 'L');
    $pdf->Cell(60, 10, $data_row['diagnosa'], 1, 0, 'L');
    $pdf->Cell(55, 10, date("d F Y", strtotime($data_row['tgl_periksa'])), 1, 0, 'C');
    $pdf->Cell(30, 10, $data_row['jenis_pembayaran'], 1, 1);
}

$pdf->Output();
