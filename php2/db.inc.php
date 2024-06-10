<?php
$serverName = "localhost";
$dbUsername = "dbase2";
$dbPassword = "PXAOOZVOpWf!-LX";
$dbName = "customers";

$connection = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed : " .mysqli_connect_error());
} 