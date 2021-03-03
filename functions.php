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
    $query = $conn->prepare("SELECT * FROM tasks ORDER BY description");
    $query->execute();

    $items = $query->fetchall();

    return $items;
}

function joinListItems(){
	$conn = getDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM lists INNER JOIN tasks ON lists.id=tasks.list_id");
	$query->execute();

	$joined = $query->fetch();

	return $joined;
}
?>