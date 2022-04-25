<?php
  require('config/config.php');

  if(isset($_POST['submit']))
  {
    $title = mysqli_real_escape_string($conn , $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
		$body   = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "INSERT INTO posts (title , body , author) VALUES ('$title' , '$body' , '$author') ";

    if(mysqli_query($conn , $query)){
      header("location: index.php");
    }else{
      echo "<div class='alert alert-danger'>Please Login First</div>";
    }
  }
?>
<?php 
	include'includes/header.php';
?>

<div class="container text-center">
  <h2>Add new Post</h2>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
			<input type="submit" name="submit" value="Submit" class="btn btn-success">
		</form>
	</div>

  </form>
</div>
<?php 
	include('includes/footer.php');
 ?>