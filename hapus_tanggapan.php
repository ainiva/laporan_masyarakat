<?php
include "koneksi.php";

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id_tanggapan = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query to delete the record
    $delete_query = "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'";
    
    // Execute the delete query
    $result = mysqli_query($koneksi, $delete_query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='tabeltanggapan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location='tabeltanggapan.php';</script>";
    }
} else {
    // Redirect to the main page if 'id' is not provided
    header("Location: tabeltanggapan.php");
    exit();
}
?>

