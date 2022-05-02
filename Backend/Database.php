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
        echo " database already exist";
    }


    // // creating tables
    // $dbname = "gyms";

    // $connect = mysqli_connect($host,)




?>