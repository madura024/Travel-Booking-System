
<?php 

    if(isset($_GET["ID"]))
    {

        $ID = $_GET["ID"];

        $serverName = "localhost";
        $dbUsername = "dbase2";
        $dbPassword = "PXAOOZVOpWf!-LX";
        $dbName = "customers";

        $connection = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

        $sql = "DELETE FROM users WHERE ID=$ID";
        $connection->query($sql);
    }

    header("Location:index.php");

    exit();

?>