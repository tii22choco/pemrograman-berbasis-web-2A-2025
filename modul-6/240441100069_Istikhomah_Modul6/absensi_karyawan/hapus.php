<?php
require_once '../includes/config.php';
require_once '../includes/session.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $id_safe = mysqli_real_escape_string($conn, $id);

    $delete = mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE id = '$id_safe'");

    if ($delete) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
