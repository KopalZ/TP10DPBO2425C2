<?php
require_once '../viewmodels/GuildViewModel.php';
$vm = new GuildViewModel();
$guilds = $vm->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guilds List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>🏰 Daftar Guild</h1>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="../index.php" class="btn" style="background:#636e72;">&laquo; Kembali</a>
            <a href="guild_form.php" class="btn">Tambah Guild Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th> <th>ID</th> <th>Nama Guild</th>
                    <th>Base Region</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($guilds as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_guild'] ?></td>
                    <td><?= $row['base_region'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td>
                        <a href="guild_form.php?id=<?= $row['id'] ?>" style="color: #fab1a0;">Edit</a> |
                        <a href="guild_delete.php?id=<?= $row['id'] ?>" style="color: #ff7675;" onclick="return confirm('Hapus Guild ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>