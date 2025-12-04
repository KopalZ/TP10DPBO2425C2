<?php
require_once '../viewmodels/GrimoireViewModel.php';
$vm = new GrimoireViewModel();
if (isset($_GET['id'])) {
    $vm->delete($_GET['id']);
}
header("Location: grimoire_list.php");
?>