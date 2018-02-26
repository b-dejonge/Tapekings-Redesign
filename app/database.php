<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tapekings_redesign";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
  echo "Database connection failed with following errors: ". mysqli_connect_error();
  die();
}
?>
