<?php
// Include config file
require_once "config.php";
if (isset($_POST['id']) && $_POST['id'] != null) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM posts WHERE id = '$id'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}



unset($pdo);

?>
<?php $page_title = "Edit Post";
include_once 'header.php'; ?>
<?php
session_start();
include('nav.php');  ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">


            <h2>Create Post</h2>
            <p class="alert alert-info">Please fill this form to create an post.</p>
            <form action="update-post.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label>Task Type</label>
                    <select name="type" class="form-control" id="type">
                        <option value="plumbing" <?php echo $row['type'] ==  'type1' ?  "selected" : '' ?>>TYPE1</option>
                        <option value="accounting" <?php echo $row['type'] ==  'type2' ?  "selected" : '' ?>>TYPE1</option>
                         <option value="other" <?php echo $row['type'] ==  'other' ?  "selected" : '' ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="open" <?php echo $row['status'] ==  'status1' ?  "selected" : '' ?>>STATUS1</option>
                        <option value="completed" <?php echo $row['status'] ==  'status2' ?  "selected" : '' ?>>STATUS2</option>
                    </select>

                </div>

                <div class="form-group ">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $row['location'] ?>">
                </div>

                <div class="form-group ">
                    <label>Skills Required</label>
                    <?php $skills = explode(",", $row["skills"]) ?>
                    <select name="skills[]" class="form-control selectpicker" id="skills" multiple data-live-search="true" required>
                    <option value="no skills">No Skills</option>
                        <option value="skill1">SKILL1</option>
                        <option value="skill2">SKILL2</option>
                        <option value="skill3">SKILL3</option>
                        <option value="other">Other</option>
                    </select>
                  
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Go to my posts <a href="posts.php">My posts</a></p>
            </form>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>