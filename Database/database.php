<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "login/registration"; 

$conn = new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die("Failed to connect the database.".$conn->connect_error);
}
else{
    echo"Database connected";
}
?>