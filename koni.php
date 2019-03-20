<?php
//import and start connection to the database
require "connect.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//create adding query
$query = "INSERT INTO 
Zadania (name,surname,company,email,problem,status)
VALUES 
('".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["company"]."', '".$_POST["mail"]."','".$_POST["problem"]."','".$_POST["status"]."')";

$conn->exec($query);
if($conn){
    echo "success";
}
else{
    echo $query;
}


$conn = null;
?>