<?php 
include 'koneksi.php';
$id = $_GET['id'] ?? '';
$data = ['nim'=>'','nama'=>'','jurusan'=>'','foto'=>''];
if($id) {
    $res = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
    $data = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <style>
        body { font-family: sans-serif; background-color: #e0f7fa; padding: 40px; }
        .card { background: white; padding: 20px; border-radius: 10px; max-width: 400px; margin: auto; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { background: #00838f; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h3><?= $id ? 'Edit' : 'Tambah' ?> Data</h3>
        <form action="proses.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="nim" id="nim" placeholder="NIM" value="<?= $data['nim'] ?>">
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $data['nama'] ?>">
            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?= $data['jurusan'] ?>">
            
            <label style="font-size: 12px;">Foto (Maks 2MB):</label>
            <input type="file" name="foto" id="foto">
            
            <button type="submit" name="simpan">Simpan Data</button>
            <p style="text-align:center"><a href="index.php" style="font-size:12px; color:#666;">Kembali</a></p>
        </form>
    </div>

    <script>
    function validate() {
        let nim = document.getElementById('nim').value;
        let foto = document.getElementById('foto');
        if(nim == "") { alert("NIM wajib diisi!"); return false; }
        
        if(foto.files.length > 0) {
            let size = foto.files[0].size;
            if(size > 2000000) { // 2MB
                alert("File terlalu besar! Maksimal 2MB.");
                return false;
            }
        }
        return true;
    }
    </script>
</body>
</html>