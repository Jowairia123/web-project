<?php

session_start();

    require 'config.php';
    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $uName = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $passcode = md5(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));

    $sql = "SELECT userName,password from customer where username = '$uName' && password ='$passcode'";
    
    $result = mysqli_query($conn,$sql);
//    $row = mysqli_fetch_array($result);
//    $active = $row['active'];
      
    $count = mysqli_num_rows($result);
    
    if ($count == 1) 
    {
        $_SESSION["AUser"] = $uName;
        echo "successfully Login";
        header("location: index.php");
    } 
    
    else 
    {
//        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("location: LoginForm.php?invalid=1");
    }

    mysqli_close($conn);
