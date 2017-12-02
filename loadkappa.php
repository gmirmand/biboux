<?php
/**
 * Created by PhpStorm.
 * User: Gmirmand
 * Date: 01-Dec-17-0001
 * Time: 22:27
 */
header('Content-type: application/json');

$images = glob('src/img/kappa/*.png');

$return = array();
foreach ($images as $i => $image) {
    $return[] = basename($image);
}

echo json_encode($return);