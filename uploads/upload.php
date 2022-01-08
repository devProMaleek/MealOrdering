<?php
include('dbconnection.php');
if (isset($_POST['submit'])){

    // Getting the information from the form.
    $cat=$_POST["Category"];
    $ItemName=$_POST['ItemName'];
    $Price=$_POST['Price'];
    $Dis=$_POST['Discount'];

    // Get all the available information of the file

    $file = $_FILES['FileToUpload'];
    
    $fileName = $_FILES['FileToUpload']['name'];
    $fileTmpName = $_FILES['FileToUpload']['tmp_name'];
    $fileSize = $_FILES['FileToUpload']['size'];
    $fileError = $_FILES['FileToUpload']['error'];
    $fileType = $_FILES['FileToUpload']['type'];
    
    // Get the extension of the file.
    $fileExt = explode('.', $fileName);
    
    // Get the actual extension
    $fileActualExt = strtolower(end($fileExt));

    // Set the extension array you want to allow.
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // Compare the extensions
    if (in_array($fileActualExt, $allowed)){
        // Check for errors.
        if ($fileError === 0){
            // Check for the size of your file.
            if ($fileSize < 50000){
                // Set a unique id for each file.
                $fileNameNew = uniqid('', TRUE).".".$fileActualExt;
                // Set the file destination
                $fileDestination = 'uploads/'.$fileNameNew;
                // Move the file from the temporary location to the final destination.
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too large, not less than 50MB";
            }
        }else{
            echo "There was an error uploading your file";
        }
    }else{
        echo "You cannot upload files of this type";
    }
}
