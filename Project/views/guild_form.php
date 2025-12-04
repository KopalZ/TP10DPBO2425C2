<?php
require_once '../viewmodels/GuildViewModel.php';
$vm = new GuildViewModel();
$data = null;
$id = $_GET['id'] ?? null;

// Jika ada ID, ambil data lama untuk diedit
if ($id) {
    $vm->getById($id);
    $data = $vm->model;
}

// Proses Simpan Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($vm->save($_POST, $id)) {
        header("Location: guild_list.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Guild</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1><?= $id ? 'Edit' : 'Tambah' ?> Guild</h1>
        
        <form method="POST">
            <label>Nama Guild</label>
            <input type="text" name="nama_guild" value="<?= $data->nama_guild ?? '' ?>" required placeholder="Contoh: Golden Dawn">
            
            <label>Base Region (Markas)</label>
            <input type="text" name="base_region" value="<?= $data->base_region ?? '' ?>" required placeholder="Contoh: Capital City">
            
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4" style="width:100%; background:#1a1a2e; color:white; border:none; padding:10px;" placeholder="Deskripsi singkat guild..."><?= $data->deskripsi ?? '' ?></textarea>
            <br><br>
            
            <button type="submit">Simpan Data</button>
            <br><br>
            <center><a href="guild_list.php">Batal</a></center>
        </form>
    </div>
</body>
</html>