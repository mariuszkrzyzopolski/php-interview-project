<?php
//import and start connection to the database
require "connect.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_POST['setting']=="add") {
	//create adding query
	$query = "INSERT INTO Zadania (name,surname,company,email,problem,status)
	VALUES ('".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["company"]."', '".$_POST["mail"]."','".$_POST["problem"]."','oczekujące')";
	runQuery($query,$conn);
}
elseif ($_POST['setting']=="view") {
	//create query to view a task status, for client
	$query="
	SELECT status 
	FROM Zadania 
	WHERE name='".$_POST["name"]."' AND surname='".$_POST["surname"]."' AND company='".$_POST["company"]."' AND email='".$_POST["mail"]."'";
	$result = runQuery($query,$conn)->fetch(PDO::FETCH_ASSOC);
	echo $result['status'];

}
$conn = null;
?>