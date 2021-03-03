<?php
include("functions.php");

$name = $_POST["name"];
$id = $_POST["id"];

$conn = getDatabaseConnection();

$query = $conn->prepare("UPDATE lists SET name = :name WHERE id = :id");
$query->bindParam(":name", $name);
$query->bindParam(":id", $id);
$query->execute();

header("location: index.php");
?>