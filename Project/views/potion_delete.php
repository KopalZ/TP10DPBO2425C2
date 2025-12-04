<?php
require_once '../viewmodels/PotionViewModel.php';
$vm = new PotionViewModel();
if (isset($_GET['id'])) {
    $vm->delete($_GET['id']);
}
header("Location: potion_list.php");
?>