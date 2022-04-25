<?php
  require('config/config.php');
?>

<?php
  include 'includes/header.php';
  if (isset($_POST['username'])) {
    $username = stripcslashes($_POST['username']);// remove backslashes
    $username = mysqli_real_escape_string($conn,$username);
    $email = stripcslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "Insert into `users`(username,email,password) VALUES('$username','$email','".md5($password)."')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      header("Location:login.php");
      echo "<div class='alert alert-success'>You have a successful sign up</div>";
    }
}else{
?>

 <div  style="margin-top:40px;">
 <div class="offset-md-3 col-md-6">
<div class="card bg-dark text-white">
   <div class="card-header">
     <h4 class="card-title text-center">Registration Here</h4>
   </div>
   <div class="card-body">
     <form action="" method="post">
       <div class="form-group">
         <label for="username">Username</label>
         <input type="text" class="form-control" name="username">
       </div>
       <div class="form-group">
         <label for="email">Email</label>
         <input type="text" class="form-control"  name="email">
       </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" name="password">
       </div>
       </div>
       <div class="card-footer">
         <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">sign Up</button>
       </div>
     </form> <!-- form end -->
   </div>  <!-- card end -->
 </div>
  </div> 

  <?php } ?>

<?php
    include 'includes/footer.php';
?>
