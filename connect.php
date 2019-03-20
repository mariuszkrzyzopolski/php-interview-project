<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koni";

function runQuery($query,$conn){
//$result=$conn->prepare($query);
$conn->query($query);
	if($conn){
    	return $conn->query($query);
	}
	else{
    	echo $conn;
	}
}
?>