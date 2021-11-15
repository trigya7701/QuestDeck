<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="questdeck";
    $conn=mysqli_connect($server,$username,$password,$database);
    if($conn)
    {
        // console.log("Success");
        // echo "Success";
    }
    else
    {
        die("error");
    }
?>