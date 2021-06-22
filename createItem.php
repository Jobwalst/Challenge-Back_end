<?php
include("functions.php");

createItem($_POST["list_id"], $_POST["description"], $_POST["time"], $_POST["status"]);

header("location: index.php");
?>