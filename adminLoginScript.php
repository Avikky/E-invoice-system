<?php
session_start();
include 'config/config.php';

$errMsg = $succMsg = $dehashPwd = '';

function validateInput($data){
    $data = htmlentities($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 if(isset($_POST['submit'])){
      $userName = validateInput($_POST['name']);
      $pwd = validateInput($_POST['pwd']);
      //error handlers
      if(empty($userName) || empty($pwd)){
          $errMsg = "please fill in all field";
      }else{
          $sql = "SELECT * FROM admins  WHERE username = '$userName'";
          $query = mysqli_query($conn, $sql);
          $result = mysqli_num_rows($query);
          if($result < 1){
              echo "Username is incorrect";
          }else{
              if($fetchData = mysqli_fetch_assoc($query)){
                  //De_Hashing password from DB
                  $dehashPwd = password_verify($pwd, $fetchData['password']);
                  if ($dehashPwd === false ) {
                      echo "Incorrect password";
                  }elseif($dehashPwd === true) {
                      //login user
                      session_start();
                      $_SESSION['name'] = $fetchData['username'];
                      $_SESSION['pass'] = $fetchData['password'];
                      header("Location: hompage.php");
                      exit();
                }
              }
          }
      }
  }
