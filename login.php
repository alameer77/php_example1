<?php
 
 include('inc/connection.php');
// check if user coming from a request
  
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_GET['submit'] )){
  // $user = $_POST['user'];
  // $password = $_POST['password'];
  $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
  $password = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
  

  // creating array of errors

  $formerrors = array();

    if (strlen($user) <= 3) {

      $formerrors[] = 'Username Must be larger than <strong> 3 </strong> characters';
    }

    if (strlen($password) < 5) {

      $formerrors[] = 'Password Must be larger than <strong> 10 </strong> characters';
    }
  

    session_start();
  $sql = "SELECT id,username,pasword FROM users WHERE username = '$user'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  
  if($row['username'] === $user && $row['pasword'] === $password){
    
     $_SESSION['user'] = $row['username'];
     $_SESSION['id'] = $row['id'];

     header('location:index.php');
    exit();
  }else{
    echo "<div class='alert alert-danger text-center'>خطأ في كلمة المرور او اسم المستخدم</div>";
    //header('location:login.php');
  }

}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <title>login</title>
</head>

<body>
  <div class="container-fluid">

    <div class="card ">

      <div class="card-body">
        <h2 class="text-center">Login</h2>
        <form action="" method="GET" class="login-form">

          <?php if (!empty($formerrors)) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>

              </button>
              <?php

              foreach ($formerrors as $error) {

                echo $error . '<br>';
              }
              ?>

            </div>


          <?php } ?>
          <div class="form-group">

            <input type="text" name="user"  class="user form-control" placeholder="Your Username" aria-describedby="helpId" value="<?php if (isset($user)) {
                                                                                                                                          echo $user;
                                                                                                                                        } ?>">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="astrisc">*</span>
            <div class="alert alert-danger custom-alert">User Can't Be less than <strong> 4 </strong> characters
            </div>

          </div>
          <div class="form-group">

            <input type="password" name="password"  class="password form-control" placeholder="Your Password" aria-describedby="helpId" value="<?php if (isset($password)) {
                                                                                                                                              echo $password;
                                                                                                                                            } ?>">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <span class="astrisc">*</span>
            <div class="alert alert-danger custom-alert">Password Can't Be less than <strong> 10 </strong> characters
            </div>

          </div>
          <div class="form-group submit-custom">
            <input type="submit" name="submit"  class="btn btn-success btn-lg btn-block" value="Login"/>
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            <h6 class="text-center">Or</h6>
            <a href="register.php" class="btn btn-primary btn-lg btn-block">Ceate account</a>
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>

          </div>
        </form>
      </div>
    </div>

  </div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-1.12.4.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <script src="js/logincustom.js"></script>

</body>

</html>