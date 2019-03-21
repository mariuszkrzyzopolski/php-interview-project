<?php
//import and start connection to the database
require "connect.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="
SELECT id
FROM employees
WHERE name='".$_POST["ename"]."' AND surname='".$_POST["esurname"]."'";
$idemployee = runQuery($query,$conn)->fetch(PDO::FETCH_ASSOC);

$query="
SELECT id
FROM Zadania
WHERE name='".$_POST["clientname"]."' AND surname='".$_POST["clientsurname"]."'";
	
$idtask = runQuery($query,$conn)->fetch(PDO::FETCH_ASSOC);

if ($_POST['setting']=="add") {
	$query = "
	INSERT INTO orders (idzadania,idemployee)
	VALUES('".$idtask["id"]."','".$idemployee["id"]."')";
	$notif = "Powiązano";
	runQuery($query,$conn,$notif);
	
}
elseif ($_POST['setting']=="edit") {
	$query="
	UPDATE Zadania
	SET status = '".$_POST["status"]."'
	WHERE id = '".$idtask['id']."';";
	$notif = "Edcyja statusu zakończona";
	runQuery($query,$conn,$notif);

}
echo '<br><a href="index.html">Powrót</a>';
$conn = null;
?>