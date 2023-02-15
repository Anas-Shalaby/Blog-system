<?php
  session_start();  
  require_once  './include/connection.php' ;
  require_once './include/header.php'; 
  $message = false;
  if(isset($_POST['save'])){
      $imageName = $_FILES["postImage"]["name"];
      $imageTMP = $_FILES["postImage"]["tmp_name"];
      $title = filter_input(INPUT_POST , 'post-title' , FILTER_SANITIZE_STRING);
      $pContent = filter_var($_POST['postContent'] , FILTER_SANITIZE_STRING);
      $categorie =filter_var($_POST['category'] , FILTER_SANITIZE_STRING);
      $pWriter = "انس شلبي يوسف";
     if(empty($title) || empty($pContent)){
      $_SESSION['message'] = 'برجاء ملئ الفورم';
     }elseif(strlen($pContent) > 1000){
       $_SESSION['message'] = 'لقد تعديت الحد الاقصي';
     }else {
      $postImage = rand(0,1000) ."_" .$imageName;
      move_uploaded_file($imageTMP , "uploads". DIRECTORY_SEPARATOR .'postImage'.DIRECTORY_SEPARATOR.$postImage);
        $query = "INSERT INTO posts (postTitle , categorie,postImage,postContent , writer) VALUES ('$title' , '$categorie' ,'$postImage' ,'$pContent' , '$pWriter')";
        $res = mysqli_query($connection , $query);
        if(isset($res)){
           $_SESSION['message'] = 'تمت الاضافه بجاح';
           $message = true;
        }else {
           $_SESSION['message'] = "حدث خطا ما";
        }
     }
     
  }


?>

    <!-- START CONTENT -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 nav-light bg-dark" id="side-area">
            <h4>لوحة التحكم</h4>
            <div class='text-center Admin'>
             <img class="rounded-circle" src="./images/twiter.jpg" width='80px' height="80px"></img>
            <h5 > مدير تطبيق </h5>
            </div>
            <ul>
              <li>
                <a href="./categorie.php">
                  <span><i class="fas fa-tags"></i></span>
                  <span>التصنيفات</span>
                </a>
              </li>
              <!-- ARTICLES -->
              <li data-toggle="collapse" data-target="#menu">
                <a href="#">
                  <span><i class="fa-solid fa-newspaper"></i></span>
                  <span>المقالات</span>
                </a>
              </li>
              <ul class="collapse" id="menu">
                <li>
                  <a href="#">
                    <span><i class="fa-solid fa-plus"></i></span>
                    <span> مقال جديد</span>
                  </a>
                </li>
                <li>
                  <a href="posts.php">
                    <span><i class="fa-solid fa-pager"></i></span>
                    <span> كل المقالات</span>
                  </a>
                </li>
              </ul>
              <li>
                <a href="index.php" target="_blank">
                  <span><i class="fa-solid fa-house"></i></span>
                  <span>عرض الموقع</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span
                    ><i class="fa-solid fa-arrow-right-from-bracket"></i
                  ></span>
                  <span>تسجيل الخروج</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-10" id="main-area">
            <div class="add-categorie">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method='post' enctype="multipart/form-data">
                   <?php
            if(isset($_POST['save'])){      
            ?>
            <p class="<?= $message ? "bg-success text-light p-2 text-center":"bg-danger text-light p-2 text-center" ?>"> <?= $_SESSION['message'] ?> </p>
            <?php
            }
            ?>
                <div class="form-group">
                  <label for="categorie">عنوان المقال</label>
                  <input
                    type="text"
                    name="post-title"
                    class="form-control"
                    id="categorie"
                  />
                </div>
                <div class="form-group">
                  <label for="cat">التصنيف</label>
                  <select  name="category" id="cat" class="form-select">
                   <?php
                    $query1 = "SELECT * FROM categories";
                    $res1 =mysqli_query($connection , $query1);
                    while($row = mysqli_fetch_assoc($res1)){
                      ?>
                      <option><?= $row['categorieName'] ?></option>
                      <?php 
                    }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image"> صورة المقال </label>
                  <input type="file" id="image" name='postImage' />
                </div>
                <div class="form-group">
                  <label for="content"> محتوى المقال </label>
                  <textarea
                    name="postContent"
                    id=""
                    cols="30"
                    rows="10"
                    class="form-control"
                  ></textarea>
                </div>
                <button class="btn btn-custom" name="save">نشر</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT -->
    <?php require_once './include/footer.php';
      session_write_close();
      session_destroy();
    ?>
