<?php
include("functions.php");

$list_id = $_GET["list_id"];

$conn = getDatabaseConnection();
$query = $conn->prepare("DELETE FROM tasks WHERE list_id = :list_id");
$query->bindParam(":list_id", $list_id);
$query->execute();

$query = $conn->prepare("DELETE FROM lists WHERE id = :list_id");
$query->bindParam(":list_id", $list_id);
$query->execute();



//var_dump($id, $list_id);

header("location: index.php");
?>