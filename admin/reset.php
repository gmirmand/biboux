<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 16:01
 */
include '../connection.php';
$sql = "TRUNCATE TABLE active";
if ($con->query($sql) === TRUE) {
    echo "Kappa table empty";
    header('Location: ../admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();