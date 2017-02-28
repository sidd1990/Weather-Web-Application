<?php
$username="root";$password="";$database="cheapbooks1";
mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query = 'SELECT * FROM Customer';
if (isset($_GET['username'])) {
    $query="SELECT * FROM Customer WHERE username = '".$_GET['username']."' AND password = '".$_GET['password']."'";
   
}
$result=mysql_query($query);
if($result == false)
{
    echo 'The query failed.';
    echo "<hr/>";
    echo $query;
    echo "<hr/>";
    echo mysql_error();
    exit();
}
else
{
    $num=mysql_numrows($result);
    if($num > 0)
    {
        if (isset($_GET['username'])) {
            echo "Success";
        }
        else{
            echo "Invalid login";
        }
    }
    else{
        echo "Invalid login";
    }
}
?>