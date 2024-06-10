
<?php 

    if(isset($_GET["OrderID"]))
    {

        $ID = $_GET["OrderID"];

        $serverName = "localhost";
        $dbUsername = "dbase2";
        $dbPassword = "PXAOOZVOpWf!-LX";
        $dbName = "customers";

        $connection = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

        $sql = "DELETE FROM users WHERE OrderID=$OrderID";
        $connection->query($sql);
    }

    header("Location:index2.php");

    exit();

?>