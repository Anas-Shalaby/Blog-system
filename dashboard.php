<?php
  require( 'config/config.php');
  require('auth.php');
  $result = mysqli_query($conn,"SELECT * FROM `users` order by id asc");
?>

<?php
  include 'includes/header.php';
?>
<div class="container mt-5">
  <table id="example" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th class="text-center text-primary">Username</th>
        <th class="text-center text-danger">email</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        while ($show = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td class="text-center ">
          <?php echo $show['username']; ?>
        </td>
        <td class="text-center"><?php echo $show['email'] ;?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
<?php
  include 'includes/footer.php';
?>