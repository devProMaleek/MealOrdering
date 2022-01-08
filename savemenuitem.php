<?php
include('dbconnection.php');
if (isset($_POST['submit'])){

    // Getting the information from the form.
    $cat = $_POST["Category"];
    $ItemName = $_POST['ItemName'];
    $Price = $_POST['Price'];
    $Dis = $_POST['Discount'];
    $itemimg = $_FILES['FileToUpload']['tmp_name'];
    $file = fopen($itemimg, 'r');
    $file_contents = fread($file, filesize($itemimg));
    fclose($file);
    $file_content = addslashes($file_contents);
    $query="SELECT max(MenuItemID) AS maxid FROM MenuItems_tbl";
    $jd=0;
    $run=mysqli_query($con,$query);
    while ($rows=mysqli_fetch_array($run)){
            $jd=$rows[0];
            $jd += 1;
        }
        
    $qry="INSERT INTO `menuitems_tbl`(`Category`, `MenuItemID`, `ItemName`, `Price`, `Discount`, `ItemImg`) VALUES ($cat, $jd, '$ItemName', '$Price', '$Dis', '$file_content')";

    if (mysqli_query($con,$qry)==TRUE){
          echo '<script> alert("Menu Item Added Successful");</script>';
          header('refresh:0;url=adminpage.php');
    }else{
          echo '<script> alert("Please try again");</script>';
          header('refresh:0;url=adminpage.php');
    }
}
 
?>