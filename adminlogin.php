<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] === true)){
    header("location: adminpage.php");
    exit;
}
 
// Include database file
require_once("dbconnection.php");
 
// Define variables and initialize with empty values
$adminname = $password = "";
$adminname_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if adminname is empty
    if(empty(trim($_POST["adminname"]))){
        $adminname_err = "Please enter your adminname.";
    } else{
        $adminname = trim($_POST["adminname"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($adminname_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, adminname, password FROM admins_tbl WHERE adminname = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_adminname);
            
            // Set parameters
            $param_adminname = $adminname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if adminname exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $adminname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["adminname"] = $adminname;                            
                            
                            // Redirect user to welcome page
                            header("location: adminpage.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if adminname doesn't exist
                    $adminname_err = "No account found with that adminname.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        const rmCheck = document.getElementById("rememberMe"),
        adminnameInput = document.getElementById("adminname");

        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmCheck.setAttribute("checked", "checked");
            adminnameInput.value = localStorage.adminname;
        }else{
            rmCheck.removeAttribute("checked");
            adminnameInput.value = "";
        }

        function lsRememberMe() {
            if (rmCheck.checked && adminnameInput.value !== "") {
                localStorage.adminname = adminnameInput.value;
                localStorage.checkbox = rmCheck.value;
            }else{
                localStorage.adminname = "";
                localStorage.checkbox = "";
            }
        }
    </script>
</head>
<style>
    body{
        background-image:url(mealordering.jpg);
        background-size:cover; 
        background-repeat:no-repeat;
    }
    .colcol-lg-2{
        background-color:#ffffff; 
        margin-top:50px; 
        padding:40px; 
        border-color:#230237; 
        border-style:solid;
        border-width:thin;
        border-radius:8px;
    }
</style>
<body>
<div class="container">
    <div class="row" style="height: 10%; padding:30px;">
        <div class="col-12"></div>
     
    </div>
    <div class="row" style="height: 10%; color:#ffffff;">
        <div class="col-8"><h3>Cheth Online Meal Order</h3></div>
        <div class="col-2"><a href="adminlogin.php">Log In to Adminpage</a></div>
    </div>
    <div class="row" style="height: 20%; ">
        <div class="col-12"></div>
     
    </div>
    <span class="align-middle" >
        <div class="row">
            <div class="col"></div>
       
            <div class="colcol-lg-2">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="exampleInputName">Admin Name</label>
                        <input type="string" class="form-control" id="adminname" aria-describedby="emailHelp" placeholder="Enter Your Name" name="adminname">
                        <small id="emailHelp" class="form-text text-muted">Enter a Admin Name that you will remember.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        <small id="passwordHelp" class="form-text text-muted">Keep it cryptic as possible.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="btn btn-primary" data-toggle="collapse" href="NewAdmin.php" role="button" aria-expanded="false" aria-controls="collapseExample">New Admin</a>
                </form>
            </div>
            <div class="col -md-auto"></div>
        </div>
    </span>
    <div class="row" style="height: 20%; ">
        <div class="col-12"></div>
     
    </div>
</div>
</body>
</html>