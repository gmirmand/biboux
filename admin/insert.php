<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 16:01
 */
include '../connection.php';

//Random Kappa
$query = "select COUNT(*) FROM kappa";
$result = mysqli_query($con, $query);
$nbKappa = mysqli_fetch_row($result);
$rand = rand(0, intval($nbKappa[0]) - 1);

$query = "SELECT id FROM kappa LIMIT 1 OFFSET " . $rand;
$result = mysqli_query($con, $query);
$id = mysqli_fetch_row($result);


$sql = "INSERT INTO active (kappa_id) VALUES ('" . $id[0] . "')";
if ($con->query($sql) === TRUE) {
    header('Location: /admin');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();