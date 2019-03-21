<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koni";

function runQuery($query,$conn,$notif=""){

$result = $conn->query($query);
//conn is 0 or 1
	if($conn){
		//notif is variable to give user notification about success connect to database and run query
		echo $notif;
    	return $result;
	}
	else{
    	echo $conn;
	}
}
?>