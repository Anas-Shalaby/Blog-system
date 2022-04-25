<?php
  require('config/config.php');

  if(isset($_POST['submit'])){

		// get form data
    $id = mysqli_real_escape_string($conn, $_GET['id']);
		$title     = mysqli_real_escape_string($conn, $_POST['title']);
		$author    = mysqli_real_escape_string($conn, $_POST['author']);
		$body      = mysqli_real_escape_string($conn, $_POST['body']);

		$query = "UPDATE posts SET
						 title  = '$title',
						 author = '$author',
						 body   = '$body'
				  WHERE  id     = {$id}";
		
		if(mysqli_query($conn, $query)){
			header('Location: index.php');
		} else{
			echo "Error" . mysqli_error($conn);
		}
	}
  $id = mysqli_real_escape_string($conn, $_GET['id']);
	//create query
	$query = "SELECT * FROM posts WHERE id =$id";

	//get result
	$result = mysqli_query($conn, $query);

	//fetch data
	$post = mysqli_fetch_assoc($result);
?>

<?php 
	include'includes/header.php';
?>

<div class="container text-center">
  <h2 >Add New Post</h2>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
      </div>

      <div class="form-group">
        <label>author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
      </div>

      <div class="form-group">
        <label>body</label>
        <textarea  type="text" name="body" class="form-control" value="<?php echo $post['body']; ?>"></textarea>
      </div>

      <input type="hidden" name="updated_id" value ="<?php echo $post['id']; ?>">
      <input type="submit" name="submit" value="Submit" class="btn btn-success">
</form>
</div>

<?php
  include 'includes/footer.php';
?>