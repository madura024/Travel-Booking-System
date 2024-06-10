<?php
$serverName = "localhost";
$dbUsername = "dbase2";
$dbPassword = "PXAOOZVOpWf!-LX";
$dbName = "customers";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed : " .mysqli_connect_error());
} 