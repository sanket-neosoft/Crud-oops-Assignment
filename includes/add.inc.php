<?php
include("../classes/add.class.php");

// getting data 
$username = $_POST["username"];
$email = $_POST["email"];
$name = $_POST["name"];
$age = $_POST["age"];
$city = $_POST["city"];
$image = $_FILES["img"]["name"];
$image_tmp = $_FILES["img"]["tmp_name"];

// inserting data
$add = new Add($username, $email, $name, $age, $city, $image, $image_tmp);
echo json_encode($add->result);