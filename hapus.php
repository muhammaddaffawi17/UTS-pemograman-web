<?php
include 'koneksi.php';
$id = $_GET['id'];


$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM mahasiswa WHERE id='$id'"));
if (file_exists("uploads/" . $data['foto'])) {
    unlink("uploads/" . $data['foto']);
}

mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
header("Location: index.php");
?>