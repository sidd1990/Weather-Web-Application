<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

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
            <h1>Artists Data List (Part 1)</h1><hr />
            <?php
            
            $username="root";$password="";$database="art";
            mysql_connect("localhost",$username,$password);
            @mysql_select_db($database) or die( "Unable to select database");
            $query="SELECT * FROM artists"; // Need to write the ORDER_BY criteria
            $result=mysql_query($query);
            $num=mysql_numrows($result);
            if ($num > 0) {
                // output data of each row
                while ($row = mysql_fetch_assoc($result))
                {
                    echo "<a href=\"Part02_SingleArtist.php?id={$row['ArtistID']}\">{$row['FirstName']} {$row['LastName']} ({$row['YearOfBirth']}-{$row['YearOfDeath']})</a></br>";
                }
            } else {
                echo "0 results";
            }
            mysql_close();
            ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
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