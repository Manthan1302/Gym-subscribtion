<?php

session_start();

echo "buy pass query".$_SESSION['buypass'];

$host = "localhost";
$user = "root";
$pass = "rohit1979";
$dbname = "gym_database";

$connection = mysqli_connect($host,$user,$pass,$dbname);

$status = $_REQUEST['status'];

if($status == "true"){
    $insertquery = $_SESSION['buypass'];
    $success = mysqli_query($connection , $insertquery);

    header("Location:profile.php");
}else{
    echo "<h1>something went wrong in buying pass</h1>";
}



?>