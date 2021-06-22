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

function getOneItem($id){
	$conn = getDatabaseConnection();

	$query = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
	$query->bindParam(":id", $id);
	$query->execute();

	$item = $query->fetch();

	return $item;
}

function createList($name){ //Creates a new list, named as specified in create_list_form
	$conn = getDatabaseConnection();

	$query = $conn->prepare("INSERT INTO lists (name) VALUES (:name)");
	$query->bindParam(":name", $name);
	$query->execute();
}

function deleteList($list_id){ //Deletes a list, depending on it's id
	$conn = getDatabaseConnection();

	$query = $conn->prepare("DELETE FROM tasks WHERE list_id = :list_id");
	$query->bindParam(":list_id", $list_id);
	$query->execute();

	$query = $conn->prepare("DELETE FROM lists WHERE id = :list_id");
	$query->bindParam(":list_id", $list_id);
	$query->execute();
}

function createItem($list_id, $desc, $time, $status){
	$conn = getDatabaseConnection();

	$query = $conn->prepare("INSERT INTO tasks (list_id, description, time, status) VALUES (:list_id, :description, :time, :status)");
	$query->bindParam(":list_id", $list_id);
	$query->bindParam(":description", $desc);
	$query->bindParam(":time", $time);
	$query->bindParam(":status", $status);
	$query->execute();
}

function updateItem(){

}