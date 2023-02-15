<?php 
  session_start();
  require_once 'include/connection.php';
  if(isset($_POST['login'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
    $name = filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST , 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST , 'password' , FILTER_SANITIZE_STRING);
    $query = 'SELECT * FROM users';
    $res = mysqli_query($connection , $query);
    $row = mysqli_fetch_assoc($res);
    if($email != $row['email']){
      echo '<div class="alert alert-danger">الايميل او الباسوورد غير متطابق</div>';
    }elseif($email == $row['email'] && $password == $row['password']) {
      echo '<div class="alert alert-success">مرحبا سيتم تحويلك الي لوحة التحكم الان</div>';
      $_SESSION['id'] = $row['id'];
      header('REFRESH:2;URL=categorie.php');
    }
  }else {
          echo '<div class="alert alert-danger">برجاء ملئ الفورم</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول</title>

    <!-- MAIN CSS -->
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- BOOTSTRAP -->

    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/style.css" />

    <!-- FONTAWESOME  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="wrapper login">
      <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <h4>تسجيل الدخول</h4>
          <div class="form-group">
            <label for="email">البريد الالكترونى</label>
            <input type="email" class="form-control" id="email" name="email" />
          </div>
          <div class="form-group">
            <label for="password">كلمة السر</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
            />
          </div>
          <button class="btn btn-primary" name="login">تسجيل الدخول</button>
        </form>
      </div>
    </div>

    <!-- JQUERY -->
    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>
    <!-- BOOTSTRAP -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js"
      integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php session_write_close(); ?>