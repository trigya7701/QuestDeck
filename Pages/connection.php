<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="questdeck";
    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn){
        die("Error connecting in Database !!".mysqli_connect_error());
    }
?>