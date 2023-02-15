<?php 
  session_start();
  require_once './include/connection.php';
  require_once './include/header.php'; 

  if(isset($_POST['submit'])){
    $categorie = filter_input(INPUT_POST ,'categorie' , FILTER_SANITIZE_STRING);
    if(!empty($categorie)){
      $query = 'INSERT INTO categories SET categorieName = "'. $categorie . '"';
      mysqli_query($connection , $query);
      $message =true;
    }else {
      $message = false;
    }
  }

  if(isset($_GET['action'])&& $_GET['action']==='delete'){
    $query = 'DELETE FROM categories WHERE id= "' . $_GET['id'] .'"';
    $res = mysqli_query($connection , $query);
    if(isset($res)){
      $deleteMessage = 'تم المسح بنجاح';
       $message =true;
    }else {
      $deleteMessage = 'حدث خطأ ما';
      $message = false;
    }
  }

  if(!isset($_SESSION['id'])){
    echo '<div class="alert alert-danger">غير مسموح لك بدخول لوحة التحكم</div>';
    header('REFRESH:1;URL=login.php');
  }else {

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
                  <a href="./newPost.php">
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
              <form action="categorie.php" method="post">
                 <?php
            if(isset($_POST['submit'])){      
            ?>
            <p class="<?= $message ? "bg-success text-light p-2 text-center":"bg-danger text-light p-2 text-center" ?>"> <?= $message ? "تمت الاضافه بنجاح":"برجاء ملئ الحقل" ?> </p>
            <?php
            }else if(isset($_GET['action'])){
            ?>
            <p class="<?= $message ? "bg-success text-light p-2 text-center":"bg-danger text-light p-2 text-center" ?>"> <?= $deleteMessage ?> </p>

            <?php }?>
                <div class="form-group">
                  <label for="categorie">تصنيف جديد</label>
                  <input
                    type="text"
                    name="categorie"
                    class="form-control"
                    id="categorie"
                  />
                </div>
                <button class="btn btn-custom" name='submit'>اضافة</button>
              </form>
            </div>

            <!-- DISPLAY CATEGORIES -->
            <div class="display-cat mt-4">
              <table class="table table-borderd">
                <tr>
                  <td>رقم الفئة</td>
                  <td>اسم الفئة</td>
                  <td>تاريخ الاضافة</td>
                  <td>حذف التصنيف</td>
                </tr>
                <?php 
                  $query = 'SELECT * FROM categories order by id desc';
                  $res = mysqli_query($connection , $query);
                  $id = 0;
                  while($row = mysqli_fetch_assoc($res)){
                    
                    $id++;
                    ?>
                    <tr>
                      <td><?= $id ?></td>
                      <td><?= $row['categorieName'] ?></td>
                      <td><?= $row['categorieDate'] ?></td>
                      <td><a href="categorie.php?action=delete&id=<?= $row['id'] ?>" class="link-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                   
                  <?php 
                  }
                    
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT -->
    <?php  }  ?>
    <?php require_once './include/footer.php'; ?>
