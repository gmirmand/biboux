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