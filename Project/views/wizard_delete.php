<?php
require_once '../viewmodels/WizardViewModel.php';
$vm = new WizardViewModel();

if (isset($_GET['id'])) {
    $vm->delete($_GET['id']);
}

header("Location: wizard_list.php");
exit;
?>