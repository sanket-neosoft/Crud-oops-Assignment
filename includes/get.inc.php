<?php
include("../classes/common.class.php");

// getting id
$id = $_POST["id"];

// get respective row from db
$show = new Connection();
$result = $show->showOne($id);
echo json_encode($result[0]);