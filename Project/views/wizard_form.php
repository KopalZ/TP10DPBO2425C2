<?php
require_once '../viewmodels/WizardViewModel.php';
$vm = new WizardViewModel();
$data = null;
$id = $_GET['id'] ?? null;

// Ambil data untuk mode edit
if ($id) {
    $vm->getById($id);
    $data = $vm->model; // Pastikan di ViewModel propertinya public $model
}

// Simpan Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($vm->save($_POST, $id)) {
        header("Location: wizard_list.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Wizard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1><?= $id ? 'Edit' : 'Rekrut' ?> Wizard</h1>
        
        <form method="POST">
            <label>Nama Wizard</label>
            <input type="text" name="nama_wizard" value="<?= $data->nama_wizard ?? '' ?>" required placeholder="Contoh: Harry Potter">
            
            <label>Elemen Sihir</label>
            <input type="text" name="elemen" value="<?= $data->elemen ?? '' ?>" required placeholder="Contoh: Api / Angin">
            
            <label>Level</label>
            <input type="number" name="level" value="<?= $data->level ?? '' ?>" required placeholder="1 - 100">
            
            <label>ID Guild (Lihat di menu Guilds)</label>
            <input type="number" name="id_guild" value="<?= $data->id_guild ?? '' ?>" required placeholder="Masukkan ID Guild (Angka)">
            <small style="color: #b2bec3;">*Masukkan ID Guild yang valid dari tabel Guilds.</small>
            <br><br>
            
            <button type="submit">Simpan Wizard</button>
            <br><br>
            <center><a href="wizard_list.php">Batal</a></center>
        </form>
    </div>
</body>
</html>