<?php
include("functions.php");

$id = $_GET["id"];

$conn = getDatabaseConnection();

$query = $conn->prepare("DELETE FROM lists WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();

header("location: index.php");
?>