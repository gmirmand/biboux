<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 19:02
 */
$path = '../../';
include($path.'src/html_part/head.php'); ?>
<body class="admin">
<div class="container admin upload">
    <?php if (isset($_GET['add'])): ?>
        <div class="add-popup">Kappa ajoutée.</div>
    <?php endif; ?>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <label id="fname" for="name">
            <input type="text" name="name" required placeholder="Nom du bix">
            <span>Nom du bix</span>
        </label>

        <div class="file">
            <span id="filename">Selectionne ton bix</span>
            <label for="file-upload">Upload
                <input type="file" id="file-upload" name="myimage" required>
            </label>
        </div>

        <input type="submit" name="submit_image" value="Ajouter">
    </form>

    <div class="tools">
        <a href="../bixs/">Voir les bixs</a>
        <a href="../" class="return">Retour admin panel</a>
    </div>
</div>

<?php include($path.'src/html_part/adminbg.php')?>
</body>

<?php include($path.'src/html_part/footer.php') ?>