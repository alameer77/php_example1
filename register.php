<?php

// session_start();
 include('inc/connection.php');
// check if user coming from a request
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST['save'])) {
    // include('inc/connection.php');
      $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
      $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
      $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    //   if(isset($_POST['gender'])){
    //     $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);

    //     if(!in_array($gender,['male','female'])){
    //       $gender_Error = 'Please choose gender not a text !';
    //       $err_s = 1;
    //     }
    //   }
      $date = filter_var($_POST['birthday'], FILTER_SANITIZE_NUMBER_INT | FILTER_SANITIZE_STRING);
    //   $user = $_POST['firstname'];
    //   echo $user ;
    // $firstname = $_POST['firstname'];
    // $username = $_POST['username'];
    // echo $firstname;
    $checkemail = "SELECT * FROM users WHERE username = '$username' AND pasword = '$password'";
    $result = mysqli_query($conn,$checkemail);
     $row =mysqli_num_rows($result);
   
    if ($row == 1) {
        echo "<div class='alert alert-danger text-center'>هذا لحساب مستخدم</div>";
    } else {
         if ($row == 0) {
            
            // header('location:register.php');
            $sql = "INSERT INTO users (firstname,lastname,username,email,pasword,birthday) VALUES ('$firstname','$lastname','$username','$email','$password','$date')";
            mysqli_query($conn,$sql);
            echo "<div class='alert alert-danger text-center'>تم اضافة سجل جديد بنجاح</div>";
            $firstname = '';
            $lastname = '';
            $username = '';
            $email = '';
            $password = '';
            $date = '';
            
        } else {
            echo "<div class='alert alert-danger text-center'>خطأ في اضافة سجل جديد</div>";
        }
    }


    //    mysqli_query($conn,$sql);
    //    echo "<div class='alert alert-danger text-center>تم اضافة سجل جديد بنجاح</div>";
    // if(mysqli_query($conn,$sql) === true){

    //   echo "<div class='alert alert-danger text-center>تم اضافة سجل جديد بنجاح</div>";
    // }else{
    //   echo "<div class='alert alert-danger text-center>خطأ في اضافة سجل جديد</div>";
    // }

       // creating array of errors

      $formerrors = array();

      if (strlen($username) <= 3) {

        $formerrors[] = 'Username Must be larger than <strong> 3 </strong> characters';
      }

      if (strlen($password) < 5) {

        $formerrors[] = 'Password Must be larger than <strong> 5 </strong> characters';
      }
   // } 
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
    <title>register</title>
</head>

<body>

    <div class="container-fluid">

        <div class="card ">

            <div class="card-body">
                <h2 class="text-center">Register</h2>
                <form action="" method="POST" class="login-form">


                    <div class="form-group row">

                        <div class="col-7">
                            <input type="text" class="firstname form-control" name="firstname" placeholder="Your Firstname" value="<?php if (isset($firstname)) {
                                                                                                                                        echo $firstname;
                                                                                                                                    } ?>">
                            <i class="fa fa-male" aria-hidden="true"></i>
                            <span class="astrisc">*</span>
                        </div>
                        <div class="col-5">

                            <input type="text" class="lastname form-control" name="lastname" placeholder="Lastname" value="<?php if (isset($lastname)) {
                                                                                                                                echo $lastname;
                                                                                                                            } ?>">
                            <span class="astrisc">*</span>

                        </div>
                    </div>

                    <div class="form-group">

                        <input type="text" name="username" class="username form-control" placeholder="Your Username" aria-describedby="helpId" value="<?php if (isset($username)) {
                                                                                                                                                            echo $username;
                                                                                                                                                        } ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="astrisc">*</span>

                    </div>
                    <div class="form-group">

                        <input type="email" name="email" class="email form-control" placeholder="Your Email" aria-describedby="helpId" value="<?php if (isset($email)) {
                                                                                                                                                    echo $email;
                                                                                                                                                } ?>">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span class="astrisc">*</span>
                    </div>

                    <div class="form-group">

                        <input type="password" name="password" class="password form-control" placeholder="Your Password" aria-describedby="helpId" autocomplete="new-password" value="<?php if (isset($password)) {
                                                                                                                                                                                            echo $password;
                                                                                                                                                                                        } ?>">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <span class="astrisc">*</span>

                    </div>
                    <!-- <div class="form-group">
                        <select class="form-control pl-4" name="gender" value="<?php if (isset($gender)) {
                                                                                    echo $gender;
                                                                                } ?>">
                            <option value="male">Male</option>
                            <option value="female">female</option>

                        </select>
                        <i class="fa fa-male" aria-hidden="true"></i>
                        <span class="astrisc">*</span>
                    </div> -->

                    <div class="form-group">
                        <label for="">Birthday :</label>
                        <input type="date" name="birthday" class="birthday form-control" placeholder="Birthday" aria-describedby="helpId" value="<?php if (isset($date)) {
                                                                                                                                                        echo $date;
                                                                                                                                                    } ?>">
                        <span class="astrisc">*</span>

                    </div>

                    <div class="form-group submit-custom">
                        <input type="submit" name="save" class="btn btn-success btn-lg btn-block" value="Save">
                        
                        <i class="fa fa-save " a-hidden="true"></i>
                        <h6 class="text-center">Or</h6>
                        <a href="login.php" class="btn btn-primary btn-lg btn-block">Login</a>
                        <i class="fa fa-sign-in " aria-hidden="true"></i>

                    </div>




                </form>
            </div>
        </div>

    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="js/registerCustom.js"></script>
</body>

</html>