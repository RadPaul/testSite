<?php
include "data.php";

function connect(){
    global $servername, $username, $password;
    $dbName = "testSiteDB";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    return $conn;
}
?>