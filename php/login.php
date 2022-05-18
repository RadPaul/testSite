<?php
include "connect.php";

//login or making a new account process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connect();
    $tableName = "testSiteUsers";
    $log = testInput($_POST['login']);
    $pass = testInput($_POST['password']);
    $sql = "SELECT * FROM $tableName WHERE nickname = '$log'";
    $data = $conn->query($sql);
    if ($data->num_rows == 0) {
        $sql = "INSERT INTO $tableName (nickname, password) VALUES ('$log', '$pass');";
        $data = $conn->query($sql);
        if ($data === TRUE) {
            echo("OK");
            //session_start();
            //$_SESSION["login"] = $log;
        } else {
            echo("Error: $sql $conn->error");
        }  
    } else {
        $sql = "SELECT * FROM $tableName WHERE password = '$pass'";
        $data = $conn->query($sql);
        if($data->num_rows == 0) {
            echo("Wrong password");
        } else { 
            //session_start();
            //$_SESSION["login"] = $log;
            echo('OK'); }
    }
    $conn->close();
}

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>