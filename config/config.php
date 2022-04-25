<?php

  $dbserver = "localhost";
  $dbuser = "root";
  $dbpass ="";
  $dbname ="simple blog";


  $conn = mysqli_connect($dbserver , $dbuser ,$dbpass,$dbname);

  if(mysqli_connect_errno())
  {
    echo "Failed To connect to database".mysqli_connect_errno();
  }


?>