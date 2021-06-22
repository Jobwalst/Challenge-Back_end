<?php 
include("functions.php");

deleteItem($_GET["id"]);

header("location: index.php");
?>