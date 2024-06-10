<?php
$serverName = "localhost";
$dbUsername = "dbase2";
$dbPassword = "PXAOOZVOpWf!-LX";
$dbName = "customers";

$connection = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

$ID="";
$usersName="";
$usersEmail="";
$usersUid= "";

$errorMessage = "";
$successMessage = "";

IF( $_SERVER['REQUEST_METHOD']=='GET')
{

    $ID = $_GET["ID"];

    $sql = "SELECT * FROM users WHERE ID=$ID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) 
    {
        header("Location:index.php");
        exit;
    }

    
    $usersName = $row["usersName"];
    $usersEmail = $row["usersEmail"];
    $usersUid = $row["usersUid"];
    
}
else {

    $ID = $_POST["ID"];
    $usersName = $_POST["usersName"];
    $usersEmail = $_POST["usersEmail"]; 
    $usersUid = $_POST["usersUid"];

    do{
        if ( empty($usersName) || empty($usersEmail) || empty($usersUid) )
        {
            $errorMessage = "All field are required";
            break;

        }
        $sql = "UPDATE users " .
                "SET usersName = '$usersName', usersEmail = '$usersEmail', usersUid = '$usersUid' " .
                "WHERE ID = $ID";

                $result = $connection->query($sql);
                if(!$result)
                {
                    $errorMessage = "Invaild querry".$connection->error;
                    break;
                }
                $successMessage = "Update Correctly";

                header("Location:index.php");
                exit;


    } while ( true);


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <h1>You can edit</h1>
    <form method="post">
        <input type="hidden" name="ID" value=" <?php echo $ID; ?>">
        <div class="row mb-3">
            <lable class="col-sm-3 col-form-lable">users Name</lable>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="usersName" value="<?php echo $usersName; ?>">
         </div>
        </div>

        <div class="row mb-3">
            <lable class="col-sm-3 col-form-lable">Email</lable>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="usersEmail" value="<?php echo $usersEmail ; ?>">
         </div>
        </div>

        <div class="row mb-3">
            <lable class="col-sm-3 col-form-lable">User ID</lable>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="usersUid" value="<?php echo $usersUid ; ?>">
         </div>
        </div>

        <?php 
            
            if ( !empty($successMessage) )
            {
                echo "<div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
                    </div>
                    </div>
                    </div>
                
                ";

            }
        
        ?>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index.php" role="button">cancel</a>
            </div>
        </div>


    </form>
</body>
</html>