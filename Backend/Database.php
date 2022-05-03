<?php

    // creating database
    $host = "localhost";
    $user = "root";
    $pass = "";

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
    
    $userTableQuery = "create table user( user_id int primary key , firstname varchar(50) , lastname varchar(50) , email varchar(50) , postcode varchar(10) ,password varchar(20) )";

    $userTableCreated = mysqli_query($connection , $userTableQuery);
    
    if($userTableCreated){
        echo "<br /> user table created";
    }else{
        echo "<br /> user table exist!";
    }

    //feedback
    $feedbackTableQuery = "create table feedback( feedback_id int primary key , feedbackMessage varchar(100) , user_id int FOREIGN KEY REFERENCES user(user_id) )";
    $feedbackTableCreated = mysqli_query($connection , $feedbackTableQuery);

    if($feedbackTableCreated){
        echo "<br /> feedback table created";
    }else{
        echo "<br /> feedback table exist!";
    }
?>