<?php
  require_once './include/connection.php'; 
  require_once './public/header.php'; 
  

?>
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
        <div class="row">
          <div class="col-md-8">
            <?php
              if(isset($_GET['category']))
              {
                $cat = $_GET['category'];
                $query = "SELECT * FROM posts WHERE categorie = '$cat' ORDER BY id DESC";
                $res = mysqli_query($connection , $query);
                while($row = mysqli_fetch_assoc($res)){
                ?>
             <div class="post">
              <div class="post-image">
                <a href="post.php?id=<?= $row['id'] ?>'"><img
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
                    $row['postContent'] = substr($row['postContent'],0 , 300);
                  }
                
                  echo $row['postContent'] . '...';
                 ?>
                </p>
                <a href='post.php?id=<?= $row['id'] ?>'><button class="btn btn-dark">اكمل القراءة</button></a>
              </div>
            </div>
           <?php }}
           else {
            echo "<h4>
                 لا توجد صفحه بهذا الاسم
                </h4>";
          }
           
           ?>
          </div>
          <div class="col-md-4 d-none d-sm-block">
            <!-- START CATEGORIES -->
            <div class="categories">
              <h4>التصنيفات</h4>
              <ul>
                <?php 
                $query = 'SELECT * FROM categories ORDER BY id DESC';
                $res = mysqli_query($connection , $query);
                while($row = mysqli_fetch_assoc($res)){
                ?>
                <li>
                  <a href="categories.php?category=<?= $row['categorieName'] ?>">
                    <span><i class="fa-solid fa-tags"></i></span>
                    <span><?= $row['categorieName'] ?></span>
                  </a>
                </li>
                <?php }?>                
              </ul>
            </div>
            <!-- START LATEST POSTS -->
            <div class="last-posts">
              <h4>احدث المنشورات</h4>
              <ul>
                <?php
                  $query = 'SELECT * FROM posts ORDER BY id DESC LIMIT 4';
                $res = mysqli_query($connection , $query);
                while($row = mysqli_fetch_assoc($res)){
                ?>
                <li>  
                  <a href="post.php?id=<?= $row['id']?>">
                    <span class="span-image"
                      ><img
                        src="uploads/postImage/<?= $row['postImage'] ?>"
                        alt="images1"
                        style="width: 80px; height: 80px"
                    /></span>
                    <span><?= $row['postTitle']?></span>
                  </a>
                </li>

                <?php }?>
                
              </ul>
            </div>
            <!-- END LATEST POSTS -->
          </div>
        </div>
      </div>
    </div>
          <?php require_once './public/footer.php'; ?>