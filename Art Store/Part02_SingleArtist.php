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
        

        <div>
            <div>
                <?php
                $username="root";$password="";$database="art";
                mysql_connect("localhost",$username,$password);
                @mysql_select_db($database) or die( "Unable to select database");
                $query="SELECT * FROM artists where ArtistID = ".$_GET['id'];
                $result=mysql_query($query);
                $num=mysql_numrows($result);
                $file_path = 'images/art/artists/medium/';
                if ($num > 0) {
                    // output data of each row
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $src=$file_path.$row['ArtistID'];
                        echo "<div class='col-md-12'>";
                        // echo "<button type='button' class='pull-right btn btn-default btn-lg'> <span class='glyphicon glyphicon-heart' aria-hidden='true'></span> Add to favourites list</button>";
                        echo "<h2>{$row['FirstName']} {$row['LastName']}</h2><hr/>";
                        //The Image on the left side
                        echo "<div class='col-md-6'>";
                        echo "<img src='{$src}.jpg' />";
                        echo "</div>";
                        //The information on the right side
                        echo "<div class='col-md-6'>";
                        echo "<p>{$row['Details']}</p>";
                       

                        echo "<button type='button' class='pull-left btn btn-default btn-lg'> <span class='glyphicon glyphicon-heart'></span> Add to favourites list</button><br/><br/>";
                        echo "<br><div class='panel panel-default'> <div class='panel-heading'> <h3 class='panel-title'>Artist Details</h3> </div> 
                            <div class='panel-body'> <table class='table table-striped'> <tr><td>Date:</td><td>{$row['YearOfBirth']}-{$row['YearOfDeath']} </td></tr><tr><td>Nationality:</td><td>{$row['Nationality']}</td></tr><tr><td>More Info</td><td><a href='{$row['ArtistLink']}'>{$row['ArtistLink']}</a></td></tr></table> </div> </div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-12'>";
                        echo "<h2>Art by {$row['FirstName']} {$row['LastName']}</h2><hr/>";
                    }
                } else {
                    //If the artist is not found
                    echo "<h1>Artist Not Found</h1><br/><a class='btn btn-default' href='Part01_ArtistsDataList.php'>Go back</a>";
                }

                mysql_close();
                ?>
                <?php
                $username="root";$password="";$database="art";
                mysql_connect("localhost",$username,$password);
                @mysql_select_db($database) or die( "Unable to select database");
                $query="SELECT * FROM artworks where ArtistID =".$_GET['id'];
                $result=mysql_query($query);
                $num=mysql_numrows($result);
                if ($num > 0) {
                    // output data of each row
                    $file_path = 'images/art/works/square-medium/';
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $src=$file_path.$row['ImageFileName'];
                        echo '<div class="col-md-4">';
                        echo "<div class='thumbnail'> <img src='{$src}.jpg' alt='...'> <div class='caption'> <h4>{$row['Title']}</h4> <p>({$row['YearOfWork']})</p> <a href='/sid/Part03_SingleWork.php?id={$row['ArtWorkID']}' type='button' class='btn btn-primary'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> View</a> <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-gift' aria-hidden='true'></span> Wish</button> <button type='button' class='btn btn-info'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Cart</button> </div> </div>";
                        echo "</div>";
                    }
                } else {
                    //If the artist is not found
                    echo "<h1>Artist Not Found</h1><br/><a class='btn btn-default' href='/sid/Part01_ArtistsDataList.php'>Go back</a>";
                }
                echo "</div>";
                mysql_close();
                ?>
            </div>
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