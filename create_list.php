<?php 
include("functions.php");

$name = $_POST["name"];

$conn = getDatabaseConnection();

$query = $conn->prepare("INSERT INTO lists (name) VALUES (:name)");
$query->bindParam(":name", $name);
$query->execute();

header("location: index.php");
?>
