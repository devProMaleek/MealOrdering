<?php
// include('dbconnection.php');
// $key=$_GET["key"];
// $qry="DELETE FROM menuitems_tbl WHERE MenuItemID=$key";
// if (mysqli_query($con,$qry)==true)
// {
//       echo "<script> alert('Record Deleted');</script>";
//       echo "<script> window.location='adminpage.php';</script>";
// }
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD_Delete_page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
    body{
        background-image:url(mealordering.jpg); 
        background-size:cover; 
        background-repeat:no-repeat;
    }
    .rows:hover{
    background-color:rgb(202, 75, 75);

}
></style>
</head>
<body>
<div class="rows">
    <p style="position: absolute; right:0; padding: 15px;">
        <a href="Logout_page.php" class="btn btn-danger">Logout</a>
    </p>
</div>

<div class="container">
 
        <div class="row">
            <h3>Delete a Staff details</h3>
        </div>
 
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="key" value="<?php echo $key;?>"/>
            <p class="alert alert-danger">Are you sure you want to delete this?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn btn-default" href="modifyitem.php">No</a>
            </div>
        </form>
</div>
</body>
</html> -->











<?php
 
//include connection file
include('dbconnection.php');
 
$key = null;
 
if(!empty($_GET['key'])){
    $key = $_REQUEST['key'];
}
 
if ( null==$key ) {
    header("Location: modifyitem.php");
}
 
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $key = $_POST['key'];
 
    $sql = "DELETE FROM menuitems_tbl WHERE MenuItemID=".$key;
    $query = mysqli_query($con, $sql);
 
    if($query){
        header("Location: modifyitem.php");
    }
    if(!$query){
        die("DAMMIT");
    }else{ echo "Success";}
    if($query){
        header("Location: modifyitem.php");
        exit();
    }else{
        echo "Something went wrong. Please try again later.";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD_Delete_page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
    body{
        background-image:url(cheth.jpg); 
        background-size:cover; 
        background-repeat:no-repeat;
    }
    .rows:hover{
    background-color:rgb(202, 75, 75);

}
></style>
</head>
<body>
<div class="rows">
    <p style="position: absolute; right:0; padding: 15px;">
        <a href="Logout_page.php" class="btn btn-danger">Logout</a>
    </p>
</div>

<div class="container">
 
        <div class="row">
            <h3>Delete a Staff details</h3>
        </div>
 
        <form class="form-horizontal" action="" method="post">
            <input type="hidden" name="key" value="<?php echo $key;?>"/>
            <p class="alert alert-danger">Are you sure you want to delete this?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn btn-default" href="modifyitem.php">No</a>
            </div>
        </form>
</div>
</body>
</html>