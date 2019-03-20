<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koni";

function runQuery($query,$conn){
$result=$conn->query($query);
	if($conn){
    	return $result;
	}
	else{
    	echo $conn;
	}
}
?>