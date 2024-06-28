<?php
    $server='localhost';
    $name="root";
    $pass="";
    $db="tdwina";
    $conn=mysqli_connect($server,$name,$pass,$db);
    if(!$conn){
        echo "not". mysqli_connect_error();
    }
?>