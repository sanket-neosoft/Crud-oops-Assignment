<?php
include("../classes/update.class.php");

// getting data 
$id = $_POST["id"];
$name = $_POST["name"];
$age = $_POST["age"];
$city = $_POST["city"];
$image = $_POST["image"];
$image_tmp = $_FILES["img"]["tmp_name"];

// updating data 
$update = new Update($id, $name, $age, $city, $image, $image_tmp);
echo json_encode($update->result);