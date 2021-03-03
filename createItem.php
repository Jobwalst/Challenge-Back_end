<?php
include("functions.php");

$list_id = $_POST["list_id"];
$desc = $_POST["description"];
$time = $_POST["time"];
$status = $_POST["status"];


$conn = getDatabaseConnection();

$query = $conn->prepare("INSERT INTO tasks (list_id, description, time, status) VALUES (:list_id, :description, :time, :status)");
$query->bindParam(":list_id", $list_id);
$query->bindParam(":description", $desc);
$query->bindParam(":time", $time);
$query->bindParam(":status", $status);
$query->execute();

header("location: index.php");
?>