<?php
include('dbconnection.php');
$un=$_POST["username"];
$pwd=$_POST["password"];
$phno=$_POST["Phoneno"];
$eml=$_POST["Email"];
$dadd=$_POST['DelAdd'];
$cty=$_POST['city'];
$utype="user";
$qry="INSERT INTO users_tbl VALUES (2,'$un','$pwd','$utype','$phno','$eml','$dadd','$cty',5)";
if (mysqli_query($con,$qry)==TRUE)
{
      echo '<script> alert("Successful");</script>';
      header('refresh:0;url=HomePage.php');
}
else
      echo '<script> alert("Please try again");</script>';
?>