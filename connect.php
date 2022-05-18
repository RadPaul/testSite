<?php
function connect(){
    $servername = "localhost";
    $username = "paul";
    $password = "09876543";
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