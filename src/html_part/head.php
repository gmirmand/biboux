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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Biboux - twitch extension - <?= $title ?></title>
    <meta name="identifier-url" content="biboux.io" />
    <meta name="title" content="Biboux - twitch extension" />
    <meta name="description" content="Extension twitch simple et personnalisable pour ajouter du dynamisme à vos streams." />
    <meta name="abstract" content="Extension twitch simple et personnalisable pour ajouter du dynamisme à vos streams." />
    <meta name="keywords" content="biboux, extension, plugin, twitch, " />
    <meta name="author" content="Gaëtan Mirmand @Huroy" />
    <meta name="revisit-after" content="30" />
    <meta name="language" content="France" />
    <meta name="copyright" content="© 2018 gmirmand@Biboux" />
    <meta name="robots" content="All" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <link rel="stylesheet" href="<?= $css ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>