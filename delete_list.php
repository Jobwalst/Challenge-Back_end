<?php
include("functions.php");

$id = $_GET["id"];
$list_id = $_GET["list_id"];

$conn = getDatabaseConnection();

$query = $conn->prepare("DELETE FROM lists JOIN tasks ON lists.id=tasks.list_id WHERE id = :id AND list_id = :list_id");
$query->bindParam(":id", $id);
$query->bindParam(":list_id", $list_id);
$query->execute();

var_dump($id, $list_id);

//header("location: index.php");
?>