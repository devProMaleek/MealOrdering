<?php
include('dbconnection.php');
$cd=$_POST["CatDesc"];
$qry="SELECT max(Category) AS maxid FROM MenuCategory_tbl";
$jid=0;
$run=mysqli_query($con,$qry);
while ($rows=mysqli_fetch_array($run))
      {
        $jid=$rows[0];
      }
$qry="INSERT INTO MenuCategory_tbl VALUES ($jid+1,'$cd')";
if (mysqli_query($con,$qry)==TRUE)
{
    echo '<script> alert("Category Added Successful");</script>';
    header('refresh:0;url=adminpage.php');
}
else
{
    echo '<script> alert("Please try again");</script>';
    header('refresh:0;url=adminpage.php');
}
?>

