<?php
  require_once 'include/connection.php';
  require_once 'include/header.php';

   if(isset($_GET['action'])&& $_GET['action']==='delete'){
    $query = 'SELECT * FROM posts WHERE id = "' . $_GET['id'] .'"'; // select image
    $res = mysqli_query($connection , $query); // generate query
    @$image = $res->fetch_row()[3]; // fetch the image name from database
    @unlink('uploads'.DIRECTORY_SEPARATOR .'postImage'.DIRECTORY_SEPARATOR.$image); // delete image from files
    $query = 'DELETE FROM posts WHERE id= "' . $_GET['id'] .'"'; // delete post
    $res1 = mysqli_query($connection , $query); // 
    if(isset($res1)){
      $deleteMessage = 'تم المسح بنجاح';
      
      $message =true;
    }else {
      $deleteMessage = 'حدث خطأ ما';
      $message = false;
    }
  }

?>
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
           
            ?>
              </form>
            </div>

            <!-- DISPLAY CATEGORIES -->
            <div class="display-cat mt-4">
              <div class="container">
                <table class="table table-borderd">
                <tr>
                  <td>رقم المقال</td>
                  <td>عنوان المقال</td>
                  <td>كاتب المقال</td>
                  <td>صورة المقال</td>
                  <td>تاريخ المقال</td>
                  <td>حذف المقال</td>
                </tr>
                <?php
                $query = 'SELECT * FROM posts order by id desc';
                $res = mysqli_query($connection , $query);
                $id =0;
                while($row = mysqli_fetch_assoc($res)){
                  $id++;
                ?>
                <tr>
                  <td><?= $id?> </td>
                  <td><?= $row['postTitle'] ?></td>
                  <td><?= $row['writer'] ?></td>
                  <td><img src="uploads/postImage/<?= $row['postImage']?>" width="50px" height="30px"/></td>
                  <td><?= $row['postDate'] ?></td>
                  <td><a href="posts.php?action=delete&id=<?= $row['id'] ?> " class="link-danger"><i class="fa-solid fa-trash"></i></a></td>
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
    </div>
<?php
 require_once 'include/footer.php';
?>