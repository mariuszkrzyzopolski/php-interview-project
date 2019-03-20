<?php
$servername = "localhost";
$username = "root";
$password = "";


function runQuery($query,$conn){
$result=$conn->query($query);
	if($conn){
    	echo "success";
    	return $result;
	}
	else{
		echo "error";
    	echo $conn;
	}
}
?>