<?php 
    //session_start();
?>

<?php

    require 'config.php';

    $id = $_REQUEST["id"];
    $tooltip = $_REQUEST["tooltip"];
    
    if($tooltip == "Add to wish list")
    {
        $sql = "INSERT INTO wishlist (customerId, productId) VALUES (1, $id)";
        
        if(mysqli_query($conn, $sql))
        {
            $res = "true";
        }
        else
        {
            $res = "false";
            echo"<script>alert('false data')</script>";
        }
    }
    else
    {
        $sql = "DELETE FROM wishlist where productId =".$id;
    
        if(mysqli_query($conn, $sql))
        {
            $res = "true";
        }
        else
        {
            $res = "false";
        }
    }
    
    echo $res;