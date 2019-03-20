<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koni";
echo $_POST['status']."<br>";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO Zadania (name,surname,company,email,problem,status)
VALUES ('".$_POST["name"]."', '".$_POST["surname"]."','".$_POST["company"]."', '".$_POST["mail"]."','".$_POST["problem"]."','".$_POST["status"]."')";
echo $query;
$conn->exec($query);
if($conn){
    echo "New record created successfully";
}
else{
    echo $query;
}


$conn = null;
?>