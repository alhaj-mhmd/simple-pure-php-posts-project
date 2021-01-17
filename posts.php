<?php
$page_title = "Posts";
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    $user_id = $_SESSION["id"];
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Posts</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include('nav.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-10 offset-1 text-center">


                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                try {
                    $sql = "SELECT * FROM posts WHERE user_id = '$user_id' ";
                    $result = $pdo->query($sql);
                    if ($result->rowCount() > 0) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>type</th>";
                        echo "<th>status</th>";
                        echo "<th>location</th>";
                        echo "<th>skills</th>";
                    
                        echo "<th>Delete</th>";
                        echo "<th>Edit</th>";
                        echo "</tr>";
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['skills'] . "</td>";
                           
                            echo '<td>
                                    <form action="delete-post.php" method="post">
                                        <input type="hidden" name="id" value="' . $row["id"] . '">
                                        <input class=" alert alert-danger" type="submit" name="submit" value="Delete">
                                    </form>   
                                        </td>';
                                                            echo '<td >
                                            <form action="edit-post.php" method="post">
                                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                                <input class=" alert alert-info" type="submit" name="submit" value="Edit">
                                            </form>
                                        </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                        // Free result set
                        unset($result);
                    } else {
                        echo "<div class='alert alert-info' >No records matching your query were found.</div>";
                    }
                } catch (PDOException $e) {
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }

                // Close connection
                unset($pdo);

                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <div class="mt-5">
                    <a class="alert bg-primary text-body" href="create-post.php">Create Post</a>

                </div>
            </div>
        </div>



    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>