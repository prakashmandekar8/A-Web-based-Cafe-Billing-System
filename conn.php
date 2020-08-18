<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "mini_proj";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
$c_name = "<h1 align='center'><font color='White' face='Verdana'>Shree Cafe</font></h1>";

// Check connection
if (!$conn) {
    die("Connection failed:");
}

?>
