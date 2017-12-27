<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 19:02
 */
include '../../../connection.php';
//List Kappa
$query = "SELECT url FROM kappa where id=" . $_GET['id'] . "";
$result = mysqli_query($con, $query);
$kappafile = mysqli_fetch_row($result);

unlink('../../../src/img/kappa/' . $kappafile[0]);

$sql = "DELETE FROM kappa WHERE kappa.id = " . $_GET['id'] . "";
if ($con->query($sql) === TRUE) {
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>