<?php
require_once '../viewmodels/WizardViewModel.php';
$vm = new WizardViewModel();
$wizards = $vm->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wizards List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>🧙‍♂️ Daftar Wizard</h1>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="../index.php" class="btn" style="background:#636e72;">&laquo; Kembali</a>
            <a href="wizard_form.php" class="btn">Rekrut Wizard Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th> <th>Nama Wizard</th>
                    <th>Elemen</th>
                    <th>Level</th>
                    <th>Guild</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($wizards as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_wizard'] ?></td>
                    <td><?= $row['elemen'] ?></td>
                    <td><?= $row['level'] ?></td>
                    <td style="color: #81ecec;"><?= $row['nama_guild'] ?? 'Tanpa Guild' ?></td>
                    <td>
                        <a href="wizard_form.php?id=<?= $row['id'] ?>" style="color: #fab1a0;">Edit</a> |
                        <a href="wizard_delete.php?id=<?= $row['id'] ?>" style="color: #ff7675;" onclick="return confirm('Pecat wizard ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>