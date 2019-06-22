<?php

    require 'config.php';

    $q = $_REQUEST["q"];
    
    $sql = "INSERT INTO wishlist (customerId, productId) VALUES (1, $q)";
    
    if(mysqli_query($conn, $sql))
    {
        $res = "true";
    }
    
    else
    {
        $res = "false";
    }
    
    echo $res;