<?php
  require('config/config.php');
  //get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);
  //create query
	$query = 'SELECT * FROM posts WHERE id ='.$id;
  // Get result
  $result = mysqli_query($conn , $query);
  // Fetch data
  $post = mysqli_fetch_assoc($result);
?>
<?php 
	include('includes/header.php');
?>

<div class="container text-center my-5" style="overflow-wrap: break-word;">
  <h1><?php echo $post['title']; ?></h1>
  <small>Created on <?php echo $post['created_at'] ;?> by <?php echo $post['author'] ;?> </small>
  <h4 class="my-5"><?php echo $post['body'] ?></h4>
  <hr>
  <a href="editpost.php?id=<?php echo $post['id'];?>" class="btn btn-info">Edit</a>  <a href="deletepost.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
</div>
<?php
  include 'includes/footer.php';
?>