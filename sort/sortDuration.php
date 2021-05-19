<?php 
include("../functions.php");

$timeDesc = $_GET["timeDesc"];

$conn = getDatabaseConnection();

$sql = mysqli_query($conn, "SELECT * FROM tasks ORDER BY ABS(time) DESC");
?>