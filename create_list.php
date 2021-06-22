<?php 
include("functions.php");

createList($_POST["name"]);

header("location: index.php");
?>
