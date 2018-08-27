<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 15:17
 */
$path = '../';
include '../connection.php';
$query = "select COUNT(*) FROM active";
$result = mysqli_query($con, $query);
$nbKappa = mysqli_fetch_row($result);

include($path . 'src/html_part/head.php'); ?>
<body class="admin">
<div class="container admin">
    <div class="button-wrap">
        <a href="insert.php" class="bix">Ajouter un bix</a>
    </div>
    <span class="nbbix">Il y a <b><?= $nbKappa[0] ?> bix<?php if ($nbKappa[0] > 1) { ?>s<?php } ?></b></span>
    <div class="tools">
        <a href="reset.php" class="reset">Reset</a>
        <a href="upload/" class="upload-btn">Upload</a>
        <a href="bixs/" class="upload-btn">Edit bixs</a>
    </div>
</div>
<?php include($path . 'src/html_part/adminbg.php') ?>
</body>

<?php include($path . 'src/html_part/footer.php') ?>
