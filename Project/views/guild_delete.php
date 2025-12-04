<?php
require_once '../viewmodels/GuildViewModel.php';
$vm = new GuildViewModel();

if (isset($_GET['id'])) {
    $vm->delete($_GET['id']);
}

header("Location: guild_list.php");
exit;
?>