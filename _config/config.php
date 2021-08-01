<?php
#region Set Zona Waktu
date_default_timezone_set('Asia/Jakarta');
#endregion

#region Set session
session_start();
#endregion

#region Koneksi Database
$connect = mysqli_connect("localhost", "root", "", "kuliah_tugas_weblanjut");

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}

#endregion

#region Fungsi base_url
function base_url($url = null)
{
    $base_url = "http://localhost/kuliah/tugas_web_lanjut";

    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}
#endregion

#region Set Variabel
if (isset($_SESSION['username'])) {
    $nama_user = $_SESSION['nama_user'];
    $username = $_SESSION['username'];
}
