<?php
    $host = 'localhost'; //change with your desired hpst
    $username = 'soke' ; //change to ypur desired user
    $password = ''; //input your connection credentials
    $dbname = 'information';

    $conn = new mysqli($host,$username,$password,$dbname);
    
    if($conn->connect_error){
        die("COnnection failed ". $conn->connect_error);
    }
    
?>