<?php 

require_once "config.php";


     // Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    $id = $_POST["id"];
    
    $type = $_POST["type"];

    $status = $_POST["status"];
    $location = trim($_POST["location"]);
    $skills = implode(',', $_POST["skills"]);
 
    // Prepare an insert statement
    $sql_update = "UPDATE  posts SET type = '".$type."' , status = '".$status."', location = '".$location."',  skills = '".$skills."' WHERE id = '".$id."' ";

    if ($stmt_update = $pdo->prepare($sql_update)) {
        

        // Attempt to execute the prepared statement
        if ($stmt_update->execute()) {
            // Redirect to login page
            // header("location: posts.php");
            echo "done";
             
        } else {
            echo "Something went wrong. Please try again.";
        }

        // Close statement
        unset($stmt_update);
    }


   
 
}
