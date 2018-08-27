<?php
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
    $css = '/css/admin.css';
    $title = 'Panel admin';
} else {
    $css = '/css/front.css';
    $title = 'Includer';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biboux - twitch extension - <?= $title ?></title>
    <link rel="stylesheet" href="<?= $css ?>">
</head>