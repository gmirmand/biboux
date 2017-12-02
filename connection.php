<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 15:18
 */

$domain = $_SERVER['SERVER_NAME'];

//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
if ($domain == 'biboux.tp.crea.pro') {
    $host = "localhost";
    $user = "gmirmand_biboux";
    $pass = "Houna43150";
    $databaseName = "gmirmand_biboux";
} else {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $databaseName = "biboux";
}

//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
$con = new mysqli($host, $user, $pass, $databaseName);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}