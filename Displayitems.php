<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<form>
    <div class="card-columns">
        <?php
        include("dbconnection.php");
        if (isset($_POST['suggest'])) {
            $mc = $_POST['suggest'];
            $qry = "SELECT * FROM menuitems_tbl WHERE Category=" . $mc;
            $run = mysqli_query($con, $qry);
            while ($rows = mysqli_fetch_array($run)) {
                echo '<div class="card" >';
                echo '<img class="card-img-top" src="image\\' . $rows['MenuItemID'] . '.jpg" height="100px" width="100px" alt="' . $rows['ItemName'] . '">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $rows['ItemName'] . '</p>';
                echo '<p class="card-text">Rs.' . $rows['Price'] . '</p>';
                $key = $rows["MenuItemID"];
                echo "<a href='AddToCart.php?ItemID=$key'><button type='button' class='btn btn-primary'>Add to cart</button></a>";
                echo '</div></div>';
            }
        }
        ?>
    </div>
</form>
</body>
</html>