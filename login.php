<?php 

require 'config/config.php';

?>

<?php
  include 'includes/header.php';
  session_start();
  if (isset($_POST['username']))
  {
    $username = stripcslashes($_POST['username']);
    $password = stripcslashes($_POST['password']);

    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";  
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if ($rows == 1)
    {
      $_SESSION['username'] = $username;
      header('Location: index.php');
    }else{
      echo "<div class='alert alert-danger'>Username/password is incorrect.</div>";
    }
  } else{
?>

  <div class="row" style="padding-top: 40px; margin:auto;">
  <div class="offset-md-3 col-md-6">
 <div class="card bg-light text-dark">
	  <div class="card-header">
	  	<h4 class="card-title text-center">Sign In</h4>
	  </div>
	  <div class="card-body">
		  <form action="" method="post">
			  <div class="form-group">
				  <label for="username">UserName</label>
				  <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control" name="password">
			  </div>
			  </div>
			  <div class="card-footer">
			  	<input href="" type="submit" class="btn btn-success" name="submit"value="Sign in " style="width: 100%;"></input>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 
   <?php }?>

  <?php 
	include('includes/footer.php');
 ?>