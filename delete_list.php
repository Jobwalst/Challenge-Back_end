<?php
include("functions.php");

deleteList($_GET["list_id"]);
//var_dump($id, $list_id);

header("location: index.php");
?>