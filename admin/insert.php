<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 16:01
 */
include '../connection.php';

//Random Kappa
$query = "select COUNT(*) FROM bix";
$result = mysqli_query($con, $query);
$nbKappa = mysqli_fetch_row($result);
$rand = rand(0, intval($nbKappa[0]) - 1);

$query = "SELECT id FROM bix LIMIT 1 OFFSET " . $rand;
$result = mysqli_query($con, $query);
$id = mysqli_fetch_row($result);


$sql = "INSERT INTO active (bix_id) VALUES ('" . $id[0] . "')";
if ($con->query($sql) === TRUE) {
//    header('Location: /admin');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

//Change Bix value
$query = "select bix.* FROM  active, bix WHERE bix.id = active.bix_id ORDER BY active.id";
$result = mysqli_query($con, $query);
$array = [];
while ($row = mysqli_fetch_row($result)) {
    $array[] = $row;
}
// echo result as json
$nbKappa = count($array);
echo $nbKappa . ' bix';
if ($nbKappa > 1) {
    echo 's';
};

$con->close(); ?>