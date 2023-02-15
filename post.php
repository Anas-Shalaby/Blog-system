<?php

  require_once 'include/connection.php';
  require_once 'public/header.php';
?>
<!-- Start Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
      <div class="container">
        
        <a href="index.php" class="navbar-brand">تدوينات</a>

        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#menu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">عن المدونه</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">شروحات</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">منوعات</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">تواصل معنا</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- START CONTENT -->
    <div class="content1  ">
      <div class="container">
        <div class="">
          <div class="text-center m-auto w-75">
            <?php
            if(isset($_GET['id'])){
            if($_GET['id'] !=null || $_GET['id'] !=0 ){
              $query = 'SELECT * FROM posts WHERE id= "' . $_GET['id'] .'"';
              $res = mysqli_query($connection , $query);
              $row = mysqli_fetch_assoc($res);
                }
              } 
            ?>
            <div class="post">
              <div class="post-image">
                <a href='post.php?id=<?= $row['id'] ?>''><img
                  src="uploads/postImage/<?=$row['postImage']?>"
                  alt="The_Ka'ba"
                /></a>
              </div>
              <div class="post-title">
                <h4>
                 <?=$row['postTitle'] ?>
                </h4>
              </div>
              <div class="post-details">
                <p class="post-info">
                  <span><i class="fa-solid fa-user"></i><?= $row['writer'] ?></span>
                  <span
                    ><i class="fa-regular fa-calendar-days"></i><?= $row['postDate'] ?></span
                  >
                  <span><i class="fa-solid fa-tags"></i><?= $row['categorie'] ?></span>
                </p>
                <p>
                 <?php 
                  if($row['postContent'] > 1500){
                  
                  }
                  echo $row['postContent'];
                 ?>
                </p>
               <a href='index.php'><button class="btn btn-dark">العودة</button></a>
              </div>
            </div>
          
          </div>

<?php

  require_once 'public/footer.php' ;
?>

