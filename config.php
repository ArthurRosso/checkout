<?php
/* Database credentials. */
$hostname = "localhost";
$user = "root";
$password = "";
$database = "checkout";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($hostname,$user,$password,$database);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>