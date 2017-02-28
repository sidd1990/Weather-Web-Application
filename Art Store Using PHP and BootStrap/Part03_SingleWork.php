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
    <div class="container">
        <?php include 'navigation.php'; ?>
        <?php
        $username="root";$password="";$database="art";
        mysql_connect("localhost",$username,$password);
        @mysql_select_db($database) or die( "Unable to select database");
        $query="SELECT * FROM artworks where ArtworkID = ".$_GET['id'];
        $result=mysql_query($query);
        $num=mysql_numrows($result);
        if ($num > 0) {
            // output data of each row
            $file_path = 'images/art/works/medium/';
            while ($row = mysql_fetch_assoc($result))
            {
                $src=$file_path.$row['ImageFileName'];

                echo "<div class='col-md-12'>";
                echo "<h2>{$row['Title']}</h2>";
                $query1="SELECT * FROM artists where ArtistID = ".$row['ArtistID'];
                $result1=mysql_query($query1);
                $num1=mysql_numrows($result1);
                if ($num1 > 0) {
                    while ($row1= mysql_fetch_assoc($result1))
                    {
                        echo "<div>By <a href=''>{$row1['FirstName']}</a> </div><hr/>";
                    }
                }
                echo "</div>";
                echo "<div class='col-md-6'>";
                echo "<img src='{$src}.jpg' alt='...'  data-toggle='modal' data-target='#myModal'>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<p>{$row['Description']}</p><br/>";
                $num = $row['MSRP'];
                $formattedNum = number_format($num,2);
                echo "<p class = 'red'>$ {$formattedNum} </p>";
                echo "<div class='btn-group'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-gift'></span> Add to wish list</button><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-shopping-cart'></span> Add to shopping cart</button></div>";
                echo "<br/>";
                echo "<br><div class='panel panel-default'> <div class='panel-heading'> <h3 class='panel-title'>Product Details</h3> </div>
                            <div class='panel-body'> <table class='table table-striped'> <tr><td><b>Date:</b></td><td>{$row['YearOfWork']}</td></tr><tr><td><b>Medium:</b></td><td>{$row['Medium']}</td></tr><tr><td><b>Dimensions:</b></td><td>{$row['Width']}cm x {$row['Height']}cm</td></tr><tr><td><b>Home:</b></td><td>{$row['OriginalHome']}</td></tr>
                            <td><b>Genres:</b></td><td>";
                            $query2="SELECT distinct g.GenreName FROM artworks art, artworkgenres ag, genres g where art.ArtistID = ".$row['ArtistID']." and art.ArtWorkID = ag.ArtWorkGenreID and ag.GenreID = g.GenreID";
                            $result2=mysql_query($query2);
                            $num2=mysql_numrows($result2);
                            if ($num2 > 0) {
                                while ($row2= mysql_fetch_assoc($result2))
                                {
                                 echo "<a>{$row2['GenreName']}</a><br/>";
                                }
                            }
                            echo "</td></tr>
                            <td><b>Subjects:</b></td><td>";
                            $query2="Select distinct s.SubjectName from artworks art, artworksubjects aSub, subjects s WHERE art.ArtWorkID = aSub.ArtWorkID and art.ArtistID = ".$row['ArtistID']." and aSub.SubjectID = s.SubjectId ";
                            $result2=mysql_query($query2);
                            $num2=mysql_numrows($result2);
                            if ($num2 > 0) {
                                while ($row2= mysql_fetch_assoc($result2))
                                {
                                    echo "<a>{$row2['SubjectName']}</a><br/>";
                                }
                            }
                            echo"</td></tr></table> </div> </div>";

                echo "</div>";
                echo "<div class='col-md-2'>";
                echo '<div class="panel panel-default"> <div class="panel-heading">Sales</div> <div class="panel-body">';
                $query3="select o.DateCompleted from orderdetails od, orders o, artworks a where o.OrderID = od.OrderID and a.ArtWorkID = od.ArtWorkID and a.ArtistID = ".$row['ArtistID'];
                $result3=mysql_query($query3);
                $num3=mysql_numrows($result3);
                if ($num3 > 0) {
                    while ($row3= mysql_fetch_assoc($result3))
                    {
                        $date = $row3['DateCompleted'];
                       $createDate = new DateTime($date);
                       $strip = $createDate->format('m/d/y');
                        echo "<a>{$strip}</a><br/>";
                    }
                }
                echo '</div> </div>';
                echo "</div";
            }
        }
        else {
            echo "0 results";
        }
        mysql_close();
        ?>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <?php
            $username="root";$password="";$database="art";
            mysql_connect("localhost",$username,$password);
            @mysql_select_db($database) or die( "Unable to select database");
            $query4="SELECT * FROM artworks where ArtworkID = ".$_GET['id'];
            $result4=mysql_query($query4);
            $num4=mysql_numrows($result4);
            if ($num4 > 0) {
                // output data of each row
                $file_path4 = 'images/art/works/medium/';
                while ($row4 = mysql_fetch_assoc($result4))
                {
                    $src4=$file_path4.$row4['ImageFileName'];
                    echo "<div class='modal-content'> <div class='modal-header'> <button type='button' class='close' data-dismiss='modal'>&times;</button> <h4 class='modal-title'>{$row4["Title"]}</h4> </div> <div class='modal-body'> <img src='{$src4}.jpg'>  </p> </div> <div class='modal-footer'> <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> </div> </div>";
                }
            }
            else {
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
</body>
</html>