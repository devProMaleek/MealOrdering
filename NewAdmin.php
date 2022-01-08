<?php
// Include config file
require_once("dbconnection.php");
 
// Define variables and initialize with empty values
$adminname = $password = $confirm_password = $usertype = $contactNo = $email = $address = $city = "";
$adminname_err = $password_err = $confirm_password_err = $usertype_err = $contactNo_err = $email_err = $address_err = $city_err = "";

// Specify the Usertype to be user
$usertype="admin";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate adminname
    if(empty(trim($_POST["adminname"]))){
        $adminname_err = "Please enter a adminname.";
    } else{
        // Create a prepared statement
        $adminnamename = trim($_POST["adminname"]);

        //Initializing the statement
        $stmt = mysqli_stmt_init($con);

        //Select Statement
        $sql = "SELECT id FROM admins_tbl WHERE AdminName = ?";
            
        if(mysqli_stmt_prepare($stmt, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_adminname);
            
            // Set parameters
            $param_adminname = trim($_POST["adminname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $adminname_err = "This adminname is already taken.";
                } else{
                    $adminname = trim($_POST["adminname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate Phone Contact
    if(empty($_POST['phoneno'])){
        $contactNo_err = "Please enter your phone contact.";
    }else{
        $contactNo = trim($_POST['phoneno']);
    }

    // Validate address
    if(empty($_POST['DelAdd'])){
        $address_err = "Please enter your Delivery address";
    }else{
        $address = trim($_POST['DelAdd']);
    }

     // Validate city
     if(empty($_POST['city'])){
        $city_err = "Please enter your city";
    }else{
        $city = trim($_POST['city']);
    }
   
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Create a prepared statement
        $email = trim($_POST["email"]);

        //Initializing the statement
        $stmt = mysqli_stmt_init($con);

        //Select Statement
        $sql = "SELECT id FROM admins_tbl WHERE Email = ?";
            
        if(mysqli_stmt_prepare($stmt, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email has already been used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Check input errors before inserting in database
    if(empty($adminname_err) && empty($password_err) && empty($confirm_password_err) && empty($contactNo_err) && empty($email_err) && empty($address_err) && empty($city_err) ){
       
        // Prepare an insert statement
        $sql = "INSERT INTO admins_tbl (`AdminName`, `Password`, `UserType`, `ContactNo`, `Email`, `Address`, `City`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_adminname, $param_password, $param_usertype, $param_contactNo, $param_email, $param_address, $param_city );
            
            // Set parameters
            $param_adminname = $adminname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_usertype = $usertype;
            $param_contactNo = $contactNo;
            $param_email = $email;
            $param_address = $address;
            $param_city = $city;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: adminlogin.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
      <div class="row" style="height: 5%;  padding:40px;">
            <div class="col-12"></div>
      </div>
    <div class="row" style="height: 5%; color:#ffffff;">
        <div class="col-8"><h3>Cheth Online Food Order</h3></div>
        <div class="col-2"><a href="HomePage.php">Log In to Order</a></div>
        <div class="col-2"><a href="NewUser.php">Register as New User</a></div>
    </div>
    <div class="row" style="height: 10%; ">
        <div class="col-12"></div>
    </div>
    <span class="align-middle" >
        <div class="row">
            <div class="col"></div>
            <div class="colcol-lg-2">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="exampleInputName">Admin Name</label>
                        <input type="string" class="form-control" id="adminname" name="adminname" aria-describedby="emailHelp" placeholder="Enter Your Name">
                        <small id="emailHelp" class="form-text text-muted">Enter a Admin Name that your will remember.</small>
                        <span><?php echo $adminname_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        <small id="passwordHelp" class="form-text text-muted">Keep it cryptic as possible.</small>
                        <span><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="cpassword">
                        <span><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">Contact Number</label>
                        <input type="String" class="form-control" id="PhoneNo" placeholder=" Contact Number" name="phoneno">
                        <span><?php echo $contactNo_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">EmailID</label>
                        <input type="String" class="form-control" id="Email" placeholder=" Email ID" name="email">
                        <span><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">Address</label>
                        <input type="String" class="form-control" id="DelAdd" placeholder=" Address" name="DelAdd">
                        <span><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">City</label>
                        <input type="String" class="form-control" id="city" placeholder=" City" name="city">
                        <span><?php echo $city_err; ?></span>
                    </div>
                    <button type="submit"  class="btn btn-primary">Submit</button>
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