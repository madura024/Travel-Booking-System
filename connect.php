<?php
session_start();

$FullName = $_POST['FullName'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Persons = $_POST['Persons'];
$Destination = $_POST['Destination'];
$Package = $_POST['Package'];

if(! empty($FullName) || empty($Email) || empty($Telephone)|| empty($Persons) || empty($Destination) || empty($Package)){

    $serverName = "localhost";
    $dbUsername = "dbase2";
    $dbPassword = "PXAOOZVOpWf!-LX";
    $dbName = "customers";
    
    $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_errno()) {
    
      die('Connection failed:('. mysqli_connect_error().'	'. mysqli_connect_error());
    }
    else
    {
       $sql = "INSERT INTO orders (FullName, Email, Telephone, Persons, Destinaion, Package) 
       values ('$FullName','$Email','$Telephone','$Persons','$Destination','$Package')";

       if($conn->query($sql)){

        $_SESSION['status'] = "Order Inserted Successfully";
        header('Location: Booking.php');

    }
    else
    {
        echo "Error";
    }
    $conn->close();
    }

} else
{
    echo "Fill the form";
}


    




?>