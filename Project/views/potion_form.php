<?php
require_once '../viewmodels/PotionViewModel.php';
$vm = new PotionViewModel();
$data = null;
$id = $_GET['id'] ?? null;

if ($id) {
    $vm->getById($id);
    $data = $vm->model;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($vm->save($_POST, $id)) {
        header("Location: potion_list.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Potion</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1><?= $id ? 'Edit' : 'Racik' ?> Potion</h1>
        
        <form method="POST">
            <label>Nama Potion</label>
            <input type="text" name="nama_potion" value="<?= $data->nama_potion ?? '' ?>" required placeholder="Contoh: Elixir of Life">
            
            <label>Efek</label>
            <input type="text" name="efek" value="<?= $data->efek ?? '' ?>" required placeholder="Contoh: Full Heal HP">
            
            <label>Harga (Gold)</label>
            <input type="number" name="harga" value="<?= $data->harga ?? '' ?>" required>
            
            <button type="submit">Simpan Resep</button>
            <br><br>
            <center><a href="potion_list.php">Batal</a></center>
        </form>
    </div>
</body>
</html>