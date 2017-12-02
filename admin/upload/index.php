<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 19:02
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Biboux KAPPA plugin</title>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
<div class="container admin upload">
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <label for="name">Nom de la kappa :</label>
        <input type="text" name="name"><br>
        <label for="myimage">Image :</label><br>
        <input type="file" name="myimage"><br>
        <input type="submit" name="submit_image" value="Upload"><br><br>
        <a href="../">Retour admin panel</a> | <a href="../../src/img/kappa/">Voir les kappas</a>
    </form>
</div>
</body>

<script src="../../js/min/vendors.min.js"></script>
<script src="../../js/min/app.min.js"></script>

</html>
