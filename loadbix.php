<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 01-Dec-17-0001
 * Time: 22:27
 */
include 'connection.php';
$query = "select bix.* FROM  active, bix WHERE bix.id = active.bix_id ORDER BY active.id";
$result = mysqli_query($con, $query);
$array = [];
while ($row = mysqli_fetch_row($result)) {
    $array[] = $row;
}
// echo result as json
echo json_encode($array); ?>