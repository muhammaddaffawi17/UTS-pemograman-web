<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa - Ocean Theme</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #e0f7fa; color: #172525; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th { background-color: #000000; color: white; padding: 12px; }
        td { padding: 10px; border-bottom: 1px solid #001e22; text-align: center; }
        .thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 2px solid #25383a; background-color: #f0f0f0; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 14px; }
        .btn-add { background: #5c3030; color: white; }
        .btn-edit { color: #3f545f; }
        .btn-delete { color: #c62828; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🌊 Data Mahasiswa Teknik Informatika</h2>
        <a href="form.php" class="btn btn-add">+ Tambah Mahasiswa</a>
        
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
            $no = 1;
            while($row = mysqli_fetch_assoc($query)) :
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <?php if($row['foto'] != ''): ?>
                        <img src="uploads/<?= $row['foto']; ?>" class="thumb">
                    <?php else: ?>
                        <div class="thumb" style="display:flex;align-items:center;justify-content:center;font-size:10px;">No Photo</div>
                    <?php endif; ?>
                </td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                    <a href="form.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a> | 
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>