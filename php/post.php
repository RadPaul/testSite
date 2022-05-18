<?php
include "connect.php";

$result = $_POST['number'];
$name = $_POST["name"];

$tableName = "records";

// put record into DB (for registered users only)
if ($_SERVER["REQUEST_METHOD"] == "POST" && $name) {
    $conn = connect();
    $sql = "INSERT INTO $tableName (nickname, points) VALUES ('$name', '$result');";
    $data = $conn->query($sql);
    if ($data === TRUE) {
        echo($result);
    } else {
        echo("Error: $sql $conn->error");
    }
    $conn->close();
}
?>