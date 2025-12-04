<?php
require_once '../viewmodels/PotionViewModel.php';
$vm = new PotionViewModel();
$potions = $vm->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Potions List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>🧪 Daftar Potion</h1>
        <div style="display: flex; justify-content: space-between;">
            <a href="../index.php" class="btn" style="background:#636e72;">&laquo; Kembali</a>
            <a href="potion_form.php" class="btn">Racik Potion Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th> <th>Nama Potion</th>
                    <th>Efek</th>
                    <th>Harga (Gold)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($potions as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_potion'] ?></td>
                    <td><?= $row['efek'] ?></td>
                    <td><?= number_format($row['harga']) ?> G</td>
                    <td>
                        <a href="potion_form.php?id=<?= $row['id'] ?>" style="color: #fab1a0;">Edit</a> |
                        <a href="potion_delete.php?id=<?= $row['id'] ?>" style="color: #ff7675;" onclick="return confirm('Hapus?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>