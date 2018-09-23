<?php

include ('config/config.php');

$errMsg = $succMsg = $hashedPass = '';
function validateInput($data){
    $data = htmlentities($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if (isset($_POST['submit'])){
  //implemeting validation function
    $userName = validateInput($_POST['name']);
    $password = validateInput($_POST['pwd']);
    $repwd = validateInput($_POST['repwd']);
    if(!empty($userName) && !empty($password) && !empty($repwd)){
      //check if username exist in the // DB
      $sql = "SELECT * FROM admins WHERE username = '$userName'";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_num_rows($query);
       if ($result > 0) {
           echo "Username Taken";
       }else{
      //check if passsword is == $repwd and less than 6 chars
      if(strlen($password) < 6){
        echo 'Password must be at least 6 characters';
      }else{
        if($password !== $repwd){
          echo "Password does't match";
        }elseif($password === $repwd){
          $hashedPass = password_hash($repwd, PASSWORD_DEFAULT);
          $sql = "INSERT INTO admins(username, password) VALUES('$userName','$hashedPass')";
          $query = mysqli_query($conn, $sql);
          if ($query == false) {
                $errMsg = "Error occured please try again";
             }elseif($query == true){
                header('Location: adminLogin.php?value=Registration succesfull. Please Login');
                exit();
            }
         }
       }
    }
    }else{
      echo 'Please fill in all field';
    }
}else{
  echo 'Data is not set';
}
