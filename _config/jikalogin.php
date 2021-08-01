<?php
if (isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('dashboard') . "';</script>";
}
