<?php
//import and start connection to the database
require "connect.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_POST['setting']=="add") {

	if ($_POST['problem']=="") {
	echo "Nie podano problemu przy dodawaniu ";
	}
	else{
	//create adding query
	$query = "INSERT INTO Zadania (name,surname,company,email,problem,status)
	VALUES ('".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["company"]."', '".$_POST["mail"]."','".$_POST["problem"]."','oczekujące')";
	$notif = "zakończono dodawanie";
	runQuery($query,$conn,$notif);
	}
}
elseif ($_POST['setting']=="view") {
	//create query to view a task status, for client
	$query="
	SELECT status 
	FROM Zadania 
	WHERE name='".$_POST["name"]."' AND surname='".$_POST["surname"]."' AND company='".$_POST["company"]."' AND email='".$_POST["mail"]."'";
	$notif = "Status Twojego zadania to: ";
	$result = runQuery($query,$conn,$notif)->fetch(PDO::FETCH_ASSOC);
	echo $result['status'];

}
echo '<br><a href="index.html">Powrót</a>';
$conn = null;
?>