<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#newCat").click(function(){
                $("#contents").load("AddCategory.php");
            });
            $("#newItem").click(function(){
                $("#contents").load("AddMenuItem.php");
            });
            $("#DelCat").click(function(){
                $("#contents").load("DeleteCat.php");
            });
            $("#ModifyItem").click(function(){
                $("#contents").load("ModifyItem.php");
            });
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body{
            background-image:url(mealordering.jpg);
            background-size:cover; 
            background-repeat:no-repeat;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" style="height: 5%; padding:40px;">
        <div class="col-12"></div>
     
    </div>
    <div class="row" style="height: 5%; color:#ffffff;">
        <div class="rows">
            <p style="position: absolute; right:0; padding: 15px;">
                <a href="Logout.php" class="btn btn-danger">Logout</a>
            </p>
        </div>
        <div class="col-10"><h3>Cheth Online Food Order</h3></div>
        <div class="col-2"><a href="logout.php">Log Out <?php session_start(); echo $_SESSION["adminname"];?></a></div>
    </div>
       
   
    <div class="row" style="margin-top:25px;height:90%;">
        <div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-left:450px;">
            <div class="col-4" style="padding:5px; border-color:#230237;  margin-"></div>
            <ul class="list-group">
            <div class="list-group-item list-group-item-info"><a id="newCat" href="addcategory.php"> Create a Food Category</a></div>
            <div class="list-group-item list-group-item-info"><a id="newItem" href="addmenuitem.php"> Add a Food Item</a></div>
            <div class="list-group-item list-group-item-info"><a id="DelCat" href="deletecategory.php"> Delete a Food Category</a></div>
            <div class="list-group-item list-group-item-info"><a id="ModifyItem" href="modifyitem.php"> Modify a Food Item</a></div>
        </div>
    </div>
</div>
</body>
</html>