<?php
$serverAddress = "localhost";
$username = "root";
$password = "";
$database = "forum";
$connection = mysqli_connect($serverAddress, $username, $password, $database);
$table_name = "category";

if (!$connection) {
die("Connection failed : " . mysqli_connect_error());
}
?>