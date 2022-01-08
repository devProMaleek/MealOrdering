<?php
include('dbconnection.php');
$id=$_POST["abc"];
$qry="DELETE FROM menucategory_tbl WHERE Category=$id";
if (mysqli_query($con,$qry)==true)
{
      echo "<script> alert('Record Deleted');</script>";
      echo "<script> window.location='adminpage.php';</script>";
}
?>