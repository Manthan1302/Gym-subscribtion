<?php

    // creating database
    $host = "localhost";
    $user = "root";
    $pass = "rohit1979";

    $server = mysqli_connect($host , $user , $pass);
    

    $dbquery ="create database gyms";
    $mydb = mysqli_query($server , $dbquery );

    if($mydb){
        echo " new database created ";
    }else{
        echo " gym database already exist!";
    }

    // creating tables
    $dbname = "gyms";
    $connection = mysqli_connect($host,$user,$pass,$dbname);

    // User table
    
    $userTableQuery = "create table user( id int primary key , firstname varchar(50) , lastname varchar(50) , email varchar(50) , postcode varchar(10) ,password varchar(20) )";

    $userTableCreated = mysqli_query($connection , $userTableQuery);
    
    if($userTableCreated){
        echo "<br /> user table created";
    }else{
        echo "<br /> user table exist!";
    }



?>