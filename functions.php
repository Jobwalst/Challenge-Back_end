<?php 
function GetDatabaseConnection(){//Opens a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "mysql";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=todo_list", $username, $password);
        //Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected successfully";
        }
        catch(PDOException $e) 
        {
        echo "connection failed: " . $e->getMessage();
        }
        return $conn;
}
?>