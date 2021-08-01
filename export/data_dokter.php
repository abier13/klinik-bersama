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
$pdf->Image('../_assets/images/logo-export.png', 110, 10);
$pdf->Cell(275, 7, 'Klinik Bersama', 0, 1, 'C');
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(275, 10, 'Export Data Dokter', 0, 1, 'C');
$pdf->Ln(10);

//Header Table
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(90, 10, 'Nama Dokter', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(55, 10, 'Spesialis', 1, 0, 'C');
$pdf->Cell(60, 10, 'Alamat', 1, 0, 'C');
$pdf->Cell(30, 10, 'No Telepon', 1, 1, 'C');

//Isi Table
$pdf->SetFont('Arial', '', 10);
$no = 1;
$sql_select = mysqli_query($connect, "SELECT * FROM tb_dokter");
while ($data_row = mysqli_fetch_array($sql_select)) {
    $cellWidth = 70; //lebar sel
    $cellHeight = 7; //tinggi sel satu baris normal

    //periksa apakah teksnya melibihi kolom?
    if ($pdf->GetStringWidth($data_row['alamat']) < $cellWidth) {
        //jika tidak, maka tidak melakukan apa-apa
        $line = 1;
    } else {
        //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
        //dengan memisahkan teks agar sesuai dengan lebar sel
        //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

        $textLength = strlen($data_row['alamat']);    //total panjang teks
        $errMargin = 3;        //margin kesalahan lebar sel, untuk jaga-jaga
        $startChar = 0;        //posisi awal karakter untuk setiap baris
        $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
        $textArray = array();    //untuk menampung data untuk setiap baris
        $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)

        while ($startChar < $textLength) { //perulangan sampai akhir teks
            //perulangan sampai karakter maksimum tercapai
            while (
                $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                ($startChar + $maxChar) < $textLength
            ) {
                $maxChar++;
                $tmpString = substr($data_row['alamat'], $startChar, $maxChar);
            }
            //pindahkan ke baris berikutnya
            $startChar = $startChar + $maxChar;
            //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
            array_push($textArray, $tmpString);
            //reset variabel penampung
            $maxChar = 0;
            $tmpString = '';
        }
        //dapatkan jumlah baris
        $line = count($textArray);
    }

    //tulis selnya
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(10, ($line * $cellHeight), $no++, 1, 0, 'C');
    $pdf->Cell(90, ($line * $cellHeight), $data_row['nama_dokter'], 1);
    $pdf->Cell(30, ($line * $cellHeight), $data_row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(55, ($line * $cellHeight), $data_row['spesialis'], 1, 0, 'C');
    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    $pdf->MultiCell(60, $cellHeight, $data_row['alamat'], 1, 'L');
    $pdf->SetXY($xPos + 60, $yPos);
    $pdf->Cell(30, ($line * $cellHeight), $data_row['no_telp'], 1, 1);
}

$pdf->Output();
