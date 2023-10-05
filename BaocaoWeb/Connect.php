<?php 
    $conn = new mysqli("localhost", "root", "", "sanbongdatiteo");
    if($conn ->connect_error){
        die("connection failed: ".$conn->connect_error);
    }
?>