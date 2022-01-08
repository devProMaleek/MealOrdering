<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="RemCat.php">
        <div class="form-group">
            <label for="exampleInputName">Catgory ID</label>
            <select name="abc" class="custom-select" id="inputGroupSelect03" >
            <option selected>Choose...</option>
            <?php
            include('dbconnection.php');
            $qry="SELECT * FROM menucategory_tbl";
            $run=mysqli_query($con,$qry);
            while ($rows=mysqli_fetch_array($run))
            {
                echo '<option value="'.$rows["Category"].'">'.$rows["CatDesc"].'</option>';
            }
            ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Delete Category</button>
    </form>
</body>
</html>