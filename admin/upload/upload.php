<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 02-Dec-17-0002
 * Time: 16:01
 */
include '../../connection.php';

//Random Kappa
$name = $_POST['name'];
$upload_image = $_FILES["myimage"]["name"];

$folder = "../../src/img/kappa/";

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder" . $_FILES["myimage"]["name"]);

$sql = "INSERT INTO kappa (name, url) VALUES('$name','$upload_image')";
if ($con->query($sql) === TRUE) {
    header('Location: /admin/upload?add');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>