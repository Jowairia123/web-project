<?php
    
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $databasename = "userAuthentication";
//
//    // Create connection
//    $conn = mysqli_connect($servername, $username, $password, $databasename);
//
//    // Check connection
//    if (!$conn)
//    {
//        die("Connection failed: " . mysqli_connect_error());
//    }
require 'config.php';

    $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $pswd = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $cpswd = md5(filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_STRING));

    $sql = "INSERT INTO customer (username, password, matchpassword) VALUES ('$name', '$pswd', '$cpswd')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "New record created successfully";
    } 
    
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);