<?php
//import and start connection to the database
require "connect.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query="
	SELECT idemployee
	FROM employees
	WHERE name='".$_POST["name"]."' AND surname='".$_POST["surname"]."'";

	$idemployee = runQuery($query,$conn)->fetch(PDO::FETCH_ASSOC);
	
	$query="
	SELECT id
	FROM Zadania
	WHERE name='".$_POST["clientname"]."' AND surname='".$_POST["clientsurname"]."'";
	
	$idtask = runQuery($query,$conn)->fetch(PDO::FETCH_ASSOC);
if ($_POST['setting']=="add") {
	$query = "
	INSERT INTO orders (idzadania,idemployee)
	VALUES('".$idtask["id"]."','".$idemployee["idemployee"]."')";
	runQuery($query,$conn);
}
elseif ($_POST['setting']=="edit") {
	$query="
	UPDATE Zadania
	SET status = '".$_POST["status"]."'
	WHERE id = '".$idtask['id']."';";
	runQuery($query,$conn);
}
$conn = null;
?>