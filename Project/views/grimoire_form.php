<?php
require_once '../viewmodels/GrimoireViewModel.php';
$vm = new GrimoireViewModel();
$data = null;
$id = $_GET['id'] ?? null;

if ($id) {
    $vm->getById($id); // Pastikan ada method ini di VM
    $data = $vm->model; // Ambil data dari model
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fungsi save() harus ada di ViewModel
    if ($vm->save($_POST, $id)) {
        header("Location: grimoire_list.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Grimoire</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1><?= $id ? 'Edit' : 'Tambah' ?> Grimoire</h1>
        
        <form method="POST">
            <label>Nama Buku Grimoire</label>
            <input type="text" name="nama_buku" value="<?= $data->nama_buku ?? '' ?>" required placeholder="Contoh: Four Leaf Clover">
            
            <label>Magic Power (Angka)</label>
            <input type="number" name="magic_power" value="<?= $data->magic_power ?? '' ?>" required placeholder="Contoh: 9000">
            
            <label>ID Wizard (Pemilik)</label>
            <input type="number" name="id_wizard" value="<?= $data->id_wizard ?? '' ?>" required placeholder="Masukkan ID Wizard (Angka)">
            
            <button type="submit">Simpan Data</button>
            <br><br>
            <center><a href="grimoire_list.php">Batal</a></center>
        </form>
    </div>
</body>
</html>