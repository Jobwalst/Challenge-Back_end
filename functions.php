<?php 
function getDatabaseConnection(){//Opens a connection to the database
    $servername = "localhost";
	$username = "root";
	$password = "";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=todo_list", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully";
	    }
	    catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	    return $conn;
}

function getAllLists(){
    $conn = getDatabaseConnection();
    $query = $conn->prepare("SELECT * FROM lists");
    $query->execute();

    $result = $query->fetchall();

    return $result;
}

function getAllItems(){
	$conn = getDatabaseConnection();

	$where = "";
	if(isset($_GET["status"])){
		$where = "WHERE status = '".$_GET["status"]."'";
	}

	if(isset($_GET["sort"]) && $_GET["sort"] == "time"){
		$type = $_GET["type"];
		$query = $conn->prepare("SELECT * FROM tasks ".$where." ORDER BY time " . $type);
	}
	else{
		$query = $conn->prepare("SELECT * FROM tasks ".$where." ORDER BY description");
	}
		
		$query->bindParam(1, $where, PDO::PARAM_STR, 12);
		$query->execute();

		$items = $query->fetchall();

		return $items;
}