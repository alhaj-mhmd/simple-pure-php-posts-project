
<?php
// Include config file
require_once "config.php";
$id = $_POST['id'];

 $sql="DELETE FROM posts WHERE id='$id' LIMIT 1";
 $q = $pdo->prepare($sql);

    $response = $q->execute(array($id));  
    
    ?>
  <?php $page_title = "Delete Post"; include_once 'header.php'; ?>

       <div class="container">
          <div class="row">
             <div class="col-12 text-center">
                <div class="alert alert-danger mt-5">
                   The post has been deleted!
                </div>
                <a href="posts.php" class="btn badge-info">My Posts</a>
                <a href="posts.php" class="btn btn-primary">Create Posts</a>
             </div>
          </div>
       </div>
   <?php include_once 'footer.php'; ?>