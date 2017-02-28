<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=art", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    //echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title> 
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="custom.css" rel="stylesheet" />
</head>

<body> 
    <?php include 'navigation.php'; ?>
    <div class="container">
    <div class="jumbotron">
        <h1>Welcome to Assignment 3</h1>
        <p>This is the Assignment by <b>Siddhant Attri</b> for <b>CSE5335</b> </p>
        <p> <b>Student ID: 1001382754</b></p>
        <?php
        echo "<p>The date is " . date("l jS \of F Y") . "</p>";
        ?>
    </div>
    </div>  
    <!-- jQuery --> 
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript --> 
    <script src="bootstrap/js/bootstrap.min.js"></script> 
</body> 
</html>