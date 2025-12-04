<?php
require_once '../viewmodels/GrimoireViewModel.php';
$vm = new GrimoireViewModel();
$dataList = $vm->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grimoires List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>📖 Daftar Grimoire</h1>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="../index.php" class="btn" style="background:#636e72;">&laquo; Kembali</a>
            <a href="grimoire_form.php" class="btn">Tambah Grimoire Baru</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>No</th> <th>Nama Buku</th>
                    <th>Magic Power</th>
                    <th>Pemilik (Wizard)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($dataList as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_buku'] ?></td>
                    <td><?= number_format($row['magic_power']) ?></td>
                    <td><?= $row['nama_wizard'] ?? 'Tidak Diketahui' ?></td>
                    <td>
                        <a href="grimoire_form.php?id=<?= $row['id'] ?>" style="color: #fab1a0;">Edit</a> |
                        <a href="grimoire_delete.php?id=<?= $row['id'] ?>" style="color: #ff7675;" onclick="return confirm('Yakin hapus?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>