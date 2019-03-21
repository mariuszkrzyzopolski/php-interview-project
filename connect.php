<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koni";

function runQuery($query,$conn,$notif=""){
//$result=$conn->prepare($query);
$result = $conn->query($query);
	if($conn){
		echo $notif;
    	return $result;
	}
	else{
    	echo $conn;
	}
}
?>