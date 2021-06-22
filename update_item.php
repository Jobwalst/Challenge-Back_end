<?php 
include("functions.php");

updateItem($_POST["id"], $_POST["desc"], $_POST["time"], $_POST["status"]);

header("location: index.php");
?>