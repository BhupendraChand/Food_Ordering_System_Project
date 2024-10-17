<?php
//start session
session_start();

//create constant to store non repeating values
define('SITEURL','http://localhost/food_order/');
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "food_order";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";