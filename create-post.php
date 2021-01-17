<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name

    $type = $_POST["type"];

    $status = $_POST["status"];

    $location = trim($_POST["location"]);
    $skills = implode(',', $_POST["skills"]);

   
    $user_id = $_SESSION["id"];



    // Prepare an insert statement
    $sql = "INSERT INTO posts (type,status, location,  skills, user_id) VALUES (:type, :status, :location, :skills, :user_id )";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":type", $param_type, PDO::PARAM_STR);
        $stmt->bindParam(":status", $param_status, PDO::PARAM_STR);
        $stmt->bindParam(":location", $param_location, PDO::PARAM_STR);
        $stmt->bindParam(":skills", $param_skills, PDO::PARAM_STR);
 
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        // Set parameters
        $param_type = $type;
        $param_status = $status;
        $param_location = $location;
        $param_skills = $skills;
       
        $param_user_id = $user_id;


        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: posts.php");
        } else {
            echo "Something went wrong. Please try again.";
        }

        // Close statement
        unset($stmt);
    }


    // Close connection
    unset($pdo);
}
?>
<?php $page_title = "Create Post";  include_once 'header.php'; ?>

<?php include('nav.php');  ?>

<div class="container text-center mt-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Create Post</h2>
            <p>Please fill this form to create an post.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Task Type</label>
                    <select name="type" class="form-control" id="type">
                        <option value="type1">TYPE1</option>
                        <option value="type2">TYPE2</option>
                         <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="status1">STATUS1</option>
                        <option value="status2">STATUS2</option>

                    </select>
                    <!-- <div class="alert alert-danger">
                <?php echo $status_err; ?>
            </div> -->
                </div>
                <div class="form-group ">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group ">
                    <label>Skills Required</label>
                    <select name="skills[]" class="form-control selectpicker" id="skills" multiple data-live-search="true" required>
                        <option value="no skills">No Skills</option>
                        <option value="skill1">SKILL1</option>
                        <option value="skill2">SKILL2</option>
                        <option value="skill3">SKILL3</option>
                        <option value="other">Other</option>
                    </select>
                    
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5 mt-3">
        <dic class="col-12 text-center">
            <p>Go to <a href="posts.php">My posts</a></p>
        </dic>
    </div>
</div>

<?php include_once 'footer.php'; ?>