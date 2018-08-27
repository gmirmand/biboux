<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 19:02
 */
include '../../../connection.php';
//List Kappa
$query = "SELECT url FROM bix where id=" . $_GET['id'] . "";
$result = mysqli_query($con, $query);
$bixfile = mysqli_fetch_row($result);

unlink('../../../src/img/bix/' . $bixfile[0]);

$sql = "DELETE FROM bix WHERE bix.id = " . $_GET['id'] . "";
if ($con->query($sql) === TRUE) {
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>