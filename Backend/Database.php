<?php

    // creating database
    $host = "localhost";
    $user = "root";
    $pass = "rohit1979";

    $server = mysqli_connect($host , $user , $pass);
    

    $dbquery ="create database gym_database";
    $mydb = mysqli_query($server , $dbquery );

    if($mydb){
        echo " new database created ";
    }else{
        echo " gym database already exist!";
    }

    // creating tables
    $dbname = "gym_database";
    $connection = mysqli_connect($host,$user,$pass,$dbname);

    // User table
    $userTableQuery = "create table user( id int primary key , firstname varchar(50) , lastname varchar(50) , email varchar(50) , postcode varchar(10) ,password varchar(20) )";

    $userTable = mysqli_query($connection , $userTableQuery);
    
    if($userTable){
        echo "<br /> user table created";
    }else{
        echo "<br /> user table exist!";
    }

    //  gym table
    $gymTableQuery = "create table gym( gymId int primary key , gymName varchar(50) , gymAddress varchar(50) , gymLocation varchar(50) , gymImages JSON , gymPass JSON , gymEquipment JSON , gymAmenities JSON , aboutGym varchar(400))";

    $gymTable = mysqli_query($connection , $gymTableQuery);

    if($gymTable){
        echo "<br> gym table created";
    }else{
        echo "<br> gym table exist";
    }

?>