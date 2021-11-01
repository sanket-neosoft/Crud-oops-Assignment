<?php
include("../classes/delete.class.php");
// getting id
$id = $_POST["id"];

// deleting respective row
$delete = new Delete($id);