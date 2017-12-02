<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 15:18
 */

//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
$host = "localhost";
$user = "root";
$pass = "";

$databaseName = "biboux";
//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
$con = new mysqli($host, $user, $pass, $databaseName);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}