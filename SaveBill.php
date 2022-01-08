<?php
include('dbconnection.php');
session_start();
$tt=explode(",", substr($_SESSION['cart'],1));
$qty=$_POST['Quantity'];
$prc=$_POST['Price'];
$nam= $_SESSION['username'];
$billAmt=0;
$qry="SELECT max(OrderID) AS maxid FROM Orders_tbl";
$oid=0;
$run=mysqli_query($con,$qry);
while ($rows=mysqli_fetch_array($run)){
    $oid=$rows[0]+1;

}
$cnt =0;
       
for($cnt=0; $cnt < count($qty); $cnt++){
    $qry="INSERT INTO orderdetails_tbl VALUES ($oid,".$tt[$cnt].",".$qty[$cnt].",".$qty[$cnt]*$prc[$cnt].",0)";
    $billAmt=$billAmt+$qty[$cnt]*$prc[$cnt];
//    print_r($billAmt);
//    return;
    mysqli_query($con,$qry);
}
$qry="INSERT INTO Orders_tbl VALUES ($oid,'".date("Y/m/d")."','".$nam."',$billAmt,0)";
if (mysqli_query($con,$qry)==TRUE)
{
      echo '<script> alert("Order Placed Successful");</script>';
      header('refresh:0;url=dashboard.php');
}
else {
    echo '<script> alert("Please try again");</script>';
     header('refresh:0;url=dashboard.php');
}
?>