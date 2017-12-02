<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 16:01
 */
include '../../connection.php';

//Random Kappa
$imagename = $_FILES["myimage"]["name"];

//Get the content of the image and then add slashes to it
$imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image = "INSERT INTO image_table VALUES('$imagetmp','$imagename')";

mysqli_query($con, $insert_image);