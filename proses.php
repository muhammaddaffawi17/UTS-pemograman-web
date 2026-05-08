<?php
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    
    $foto_name = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    
    if($foto_name != "") {
        $final_name = time() . "_" . $foto_name;
        move_uploaded_file($tmp_name, "uploads/" . $final_name);
        
        if($id == "") {
            $sql = "INSERT INTO mahasiswa VALUES (NULL, '$nim', '$nama', '$jurusan', '$final_name')";
        } else {
            $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', foto='$final_name' WHERE id='$id'";
        }
    } else {
        // Jika edit tanpa ganti foto
        $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>