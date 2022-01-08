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
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Price</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('dbconnection.php');
        $qry="SELECT * FROM menuitems_tbl";
        $recset=mysqli_query($con,$qry);
        while ($row=mysqli_fetch_array($recset)){
            echo '<tr>';
                echo '<td>'.$row['MenuItemID'].'</td>';
                echo '<td>'.$row['ItemName'].'</td>';
                echo '<td>'.$row['Price'].'</td>';
                echo '<td>
                        <a href="modify.php?key='.$row['MenuItemID'].'" class="btn btn-success">MODIFY</a>
                        <a href="delete.php?key='.$row['MenuItemID'].'" class="btn btn-success">DELETE</a>
                    </td>';
            echo '</tr>';
        }      
        ?>
    </tbody>
</table>
    
</body>
</html>