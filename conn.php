<?php
session_start();
 include('inc/connection.php');
// check if user coming from a request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//if(isset($_POST['user'] ) && isset($_POST['password'])){
  // $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
  // $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $user = $_POST['user'];
  $password = $_POST['password'];

  // creating array of errors

  $formerrors = array();

    if (strlen($user) <= 3) {

      $formerrors[] = 'Username Must be larger than <strong> 3 </strong> characters';
    }

    if (strlen($password) < 10) {

      $formerrors[] = 'Password Must be larger than <strong> 10 </strong> characters';
    }
  }


  $sql = "SELECT id,username FROM users";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  if($row['user'] === $user && $row['pasword'] === $password){
    // $_SESSION['user'] = $row['user'];
    // $_SESSION['id'] = $row['id'];

     header('location:index.php');
    exit();
  }
?>