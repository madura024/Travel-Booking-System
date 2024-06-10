<?php

$serverName = "localhost";
$dbUsername = "dbase2";
$dbPassword = "PXAOOZVOpWf!-LX";
$dbName = "customers";

$conn = new PDO("mysql:host=localhost;dbname=customers",$dbUsername, $dbPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <h1>Orders Table</h1>
    <a href="index.php" type="button" class="btn btn-outline-success">Customers</a>


    <?php
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT OrderID, FullName, Email, Telephone, Persons, Destinaion, Package FROM orders");
            $stmt->execute();  
    ?>
    <?php 
        echo "<table class='table table-striped'><thead ><th>ID</th><th>FulLName</th><th>Email</th><th>Telephone</th><th>No of Persons</th><th>Destnaion</th><th>Package</th></thead><tbody>";
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['OrderID'] . "</td><td>" . $row['FullName'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Telephone'] . "</td><td>" . $row['Persons'] . "</td><td>" . $row['Destinaion'] . "</td><td>" . $row['Package'] . "</td><td><a class='btn btn-danger' href='../Admin/delete.php?ID=$row[OrderID]'>Delete</a></td></tr>";
        }
        echo "</tbody></table>";
    ?>

</body>

</html>