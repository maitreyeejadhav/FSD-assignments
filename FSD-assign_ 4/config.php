<?php
    $servername = "localhost";
    $username = "root";  //default username for localhost
    $password = "";
    $dbname = "student";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Failed" . $conn->connect_error);
    }

?>