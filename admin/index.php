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
<body class="admin" id="insert">
<div class="container admin">
    <div class="button-wrap">
        <div class="bix">Ajouter un bix</div>
    </div>
    <span class="nbbix">Il y a <b><span><?= $nbKappa[0] ?></span> bix<?php if ($nbKappa[0] > 1) { ?>s<?php } ?></b></span>
    <div class="tools">
        <a class="reset">Reset</a>
        <a href="upload/" class="upload-btn">Upload</a>
        <a href="bixs/" class="upload-btn">Edit bixs</a>
    </div>
</div>
<?php include($path . 'src/html_part/adminbg.php') ?>
</body>

<?php include($path . 'src/html_part/footer.php') ?>
