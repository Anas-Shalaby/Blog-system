<nav class="navbar navbar-expand lg navbar-dark bg-dark">
  <a href="../blog system/" class="navbar-brand">Blog System</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../blog system/login.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../blog system/addpost.php">Add Post</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../blog system/register.php">Sign Up</a>
      </li>
       <li class="nav-item">
        <!-- <a class="nav-link" href="../blog system/">Home</a> -->
      </li>

      <li class="nav-item">
           <?php if (isset($_SESSION['username']) == true): ?> 
            <a class="nav-link" href="../blog system/logout.php">Logout</a>
           <?php endif; ?>
      </li>

    </ul>
    </nav>
  </nav>