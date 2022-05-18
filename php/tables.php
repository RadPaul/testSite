<?php
include "connect.php";

function topFifteen(){
  $tableName = "records";
  $conn = connect();
  $sql = "SELECT points, nickname FROM $tableName 
  ORDER BY points DESC LIMIT 15;";
  $data = $conn->query($sql);
    if ($data->num_rows > 0) {
      $rn = 1;
      // output data of each row
      echo "<table><tr><th>#</th><th>Points</th><th>Username</th></tr>";
      while($row = $data->fetch_assoc()) {
        echo "<tr><td>" . $rn . "</td><td>" . $row["points"] . "</td><td>" . $row["nickname"] . "</td>";
        $rn++;
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  $conn->close();
}

function bottomFifteen(){
  $tableName = "records";
  $conn = connect();
  $sql = "SELECT points, nickname FROM $tableName 
  ORDER BY points ASC LIMIT 15;";
  $data = $conn->query($sql);
    if ($data->num_rows > 0) {
      $rn = 1;
      // output data of each row
      echo "<table><tr><th>#</th><th>Points</th><th>Username</th></tr>";
      while($row = $data->fetch_assoc()) {
        echo "<tr><td>" . $rn . "</td><td>" . $row["points"] . "</td><td>" . $row["nickname"] . "</td>";
        $rn++;
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['name']) {
  $tableName = "records";
  $nickname = $_POST['name'];
  $conn = connect();

  //show player's statistics
  $sql = "SELECT COUNT(id) FROM $tableName
  WHERE nickname='$nickname';";
  $data = $conn->query($sql);
  while($row = $data->fetch_array()){
    echo "Games played: ". $row['COUNT(id)'];
    echo "<br />";
  }
  $sql = "SELECT AVG(points) FROM $tableName
  WHERE nickname='$nickname';";
  $data = $conn->query($sql);
  while($row = $data->fetch_array()){
    echo "Average points: ". round($row['AVG(points)']);
    echo "<br />";
  }

  //player's top-10 results
  $sql = "SELECT points, nickname FROM $tableName 
  WHERE nickname='$nickname'
  ORDER BY points DESC LIMIT 10;";
  $data = $conn->query($sql);
  if ($data->num_rows > 0) {
    $rn = 1;
    // output data of each row
    echo "<table><caption>Top-10 results</caption><tr><th>#</th><th>Points</th><th>Username</th></tr>";
    while($row = $data->fetch_assoc()) {
      echo "<tr><td>" . $rn . "</td><td>" . $row["points"] . "</td><td>" . $row["nickname"] . "</td>";
      $rn++;
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();
}

function mediocre(){
  $conn = connect();
  $tableName = "records";
  //show game's statistics
  $sql = "SELECT AVG(points) FROM $tableName;";
  $data = $conn->query($sql);
    while($row = $data->fetch_array()){
      echo "Average points :". round($row['AVG(points)']);
      echo "<br />";
    }
  $sql = "SELECT MAX(id) FROM $tableName;";
  $data = $conn->query($sql);
  while($row = $data->fetch_array()){
    echo "Games played:". $row['MAX(id)'];
    echo "<br />";
  }
  $conn->close();
}
?>