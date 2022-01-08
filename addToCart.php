 
<?php
      $dd=$_GET['ItemID'];
      session_start();  
      $_SESSION['cart']= $_SESSION['cart'].','.$dd;
      echo "<script>alert('".$dd." was added to your cart');</script>";
      echo $_SESSION['cart'];
      header('refresh:0;url=dashboard.php');
?>