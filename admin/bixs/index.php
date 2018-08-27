<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 19:02
 */
$path = '../../';
include '../../connection.php';
//List Kappa
$query = "SELECT * FROM bix";
$result = mysqli_query($con, $query);
$bixs = array();
while ($row = mysqli_fetch_array($result)) {
    $bixs[] = $row;
}
include($path.'src/html_part/head.php'); ?>

<body class="admin">
<div class="container admin bixs-list">
    <div class="list">
        <?php
        foreach ($bixs as $bix) {
            ?>
            <div class="bix-list">
                <a class="edit">
                    <?= $bix['name'] ?>
                </a>
                <a href="/admin/bixs/delete?id=<?= $bix['id'] ?>" class="delete">
                    <i class="material-icons">delete</i>
                </a>
                <img src="../../src/img/bix/<?= $bix['url'] ?>" alt="<?= $bix['name'] ?>">
            </div>
            <?php
        }
        ?>
    </div>

    <div class="tools">
        <a href="../upload">Upload une bix</a>
        <a href="../" class="return">Retour admin panel</a>
    </div>
</div>

<?php include($path.'src/html_part/adminbg.php')?>
</body>

<?php include($path.'src/html_part/footer.php') ?>
