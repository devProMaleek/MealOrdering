<?php
include('dbconnection.php');
$id = $_POST["ItemID"];
$in = $_POST["ItemName"];
$ip = $_POST["Price"];
$qry = "UPDATE menuitems_tbl SET ItemName = '$in', Price = '$ip' WHERE MenuItemID = $id";
if (mysqli_query($con, $qry) == TRUE)
{
    echo "<script> alert('Record updated');</script>";
    echo "<script> window.location='adminpage.php';</script>";
}
?>