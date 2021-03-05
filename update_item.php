<?php 
include("functions.php");

$id = $_POST["id"];
$desc = $_POST["desc"];
$time = $_POST["time"];
$status = $_POST["status"];

$conn = getDatabaseConnection();

$query = $conn->prepare("UPDATE tasks SET description = :description, time = :time, status = :status WHERE id = :id");
$query->bindParam(":id", $id);
$query->bindParam(":description", $desc);
$query->bindParam(":time", $time);
$query->bindParam(":status", $status);
$query->execute();

header("location: index.php");
?>