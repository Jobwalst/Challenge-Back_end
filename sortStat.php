<?php

    include("functions.php");
   sortStat(); 


function sortStat(){
	$conn = getDatabaseConnection();
	$status = $_POST["sortStatus"];

    header("location: index.php?status=".$status);
}
?>