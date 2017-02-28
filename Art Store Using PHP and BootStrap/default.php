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
  <head>
    <title>About.php</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>


    <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom styles for this template -->
 <link href="carousel.css" rel="stylesheet">
 <link href="jumbotron.css" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Basic CSS  -->
<style>
body{
  background-color: white;
}

</style>
</head>
<body>

<div class="navbar-wrapper">
      

        <?php include 'navigation.php'; ?>
         
     
</div>
<div class="container"> 
<div class="jumbotron">
        <h1>Welcome to Assignment #3</h1>
        <p>This is the Assignment by <b>Siddhant Attri</b> for <b>CSE5335</b> </p>
      </div>
      <div class="row">
  <div class="col-sm-12">
      <div class="col-sm-1"></div>
      <div class="col-sm-2"><p span class="glyphicon glyphicon-info-sign"></span></p> About Us<p>What this is all about and other stuff</p><button class="btn btn-default" type="button" ><p span class="glyphicon glyphicon-link"></span></p><a href="aboutus.php"> Visit Page</button></a></div>
      <div class="col-sm-2"><p span class="glyphicon glyphicon-th-list"></span></p> Artist List <p>Displays a list of artist names as links</p><button class="btn btn-default" type="button" ><p span class="glyphicon glyphicon-link"></span></p> <a href="Part01_ArtistsDataList.php"> Visit Page</button></a></div>
      <div class="col-sm-2"><p span class="glyphicon glyphicon-user"></span></p> Single Artist <p>Displays information of Single Artist</p><button class="btn btn-default" type="button" ><p span class="glyphicon glyphicon-link"></span></p><a href="Part02_SingleArtist.php"> Visit Page</button></a></div>
      <div class="col-sm-2"><p span class="glyphicon glyphicon-picture"></span></p> Single Work <p>Displays information of a Single Work</p><button class="btn btn-default" type="button" ><p span class="glyphicon glyphicon-link"></span></p><a href="Part03_SingleWork.php"> Visit Page</button></a></div>
      <div class="col-sm-2"><p span class="glyphicon glyphicon-search"></span></p> Search <p>Perform works on Anti works Tables</p><button class="btn btn-default" type="button" ><p span class="glyphicon glyphicon-link"></span></p><a href="Part04_Search.php"> Visit Page</button></a></div>
      <div class="col-sm-1"></div>
  </div>
 </div>

</div>
<script type="text/javascript">
            function barSearch(){
            var searchPageBaseURL = '/sid/Part04_Search.php';
            var searchCriteria = '';
            if ($("#barSearchData").val() != "") {
                searchCriteria = "?title=" + $("#barSearchData").val();
            }
            window.location = "http://" + window.location.hostname + ':' + window.location.port + searchPageBaseURL + searchCriteria;
        }
    </script>
</body>
</html>