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
    
    <h1>Customer Table</h1>
    <a href="index2.php" type="button" class="btn btn-outline-success">Order</a>


    <?php
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT ID, usersName, usersUid, usersEmail FROM users");
            $stmt->execute();  

          
    ?>
    <?php 
        echo "<table class='table table-striped'><thead ><th>ID</th><th>User Name</th><th>User Id</th><th>Email</th><th></th><th></th></thead><tbody>";
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['usersName'] . "</td><td>" . $row['usersUid'] . "</td><td>" . $row['usersEmail'] . "</td><td><a class='btn btn-primary' href='../Admin/edit.php?ID=$row[ID]'>Edit</a></td><td><a class='btn btn-danger' href='../Admin/delete.php?ID=$row[ID]'>Delete</a></td></tr>";
        }
        echo "</tbody></table>";
    ?>

</body>

</html>