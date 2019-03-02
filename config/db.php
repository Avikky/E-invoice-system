<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

$sql = $sql1 = $sql2 = $sql3 = $sql4 = $conn = '';
    //CREATE DATABASE

    $sql = "CREATE DATABASE hey";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: ". mysqli_error($conn);
    }

    //UNCOMMENT THE FIRST CREATE TABLE SCRIPT THEN GO DOWN TO LINE 52-58 AND ALSO UNCOMENT IT SO AS TO CREATE THIS TABLES IN YOUR XAMP MYSQL DATABASE

   $conn = new mysqli($server, $username, $password, $db);

    //checking the connection
    if(mysqli_connect_errno()){
        //failed conn
        echo "Cannot connect to Database".mysqli_connect_errno();
    }
    
//     // sql to create table
 $sql1 = "CREATE TABLE sales_record(
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
 customer_name VARCHAR(255) NOT NULL,
 customer_email VARCHAR(255) NOT NULL,
 customer_address VARCHAR(255) NOT NULL,
 customer_phone VARCHAR(50) NOT NULL,
 product_purchased VARCHAR(255) NOT NULL,
 label VARCHAR(255) NOT NULL,
 product_category VARCHAR(255) NOT NULL,
 custom_category VARCHAR(255) NOT NULL,
 product_price INT(255) NOT NULL,
 product_UId VARCHAR(255) NOT NULL,
 purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 )";

 if(mysqli_query($conn, $sql1)){
     echo 'sales_record tabel created'.'<br>';
 }else{
     echo 'sales_record table was unable to create'.'<br>';
 }

 $sql2 = "CREATE TABLE archive(
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
 customer_name VARCHAR(255) NOT NULL,
 customer_email VARCHAR(255) NOT NULL,
 customer_address VARCHAR(255) NOT NULL,
 customer_phone VARCHAR(50) NOT NULL,
 product_purchased VARCHAR(255) NOT NULL,
  label VARCHAR(255) NOT NULL,
 product_category VARCHAR(255) NOT NULL,
 custom_category VARCHAR(255) NOT NULL,
 product_price INT(255) NOT NULL,
 product_UId VARCHAR(255) NOT NULL,
 purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 )";

  if(mysqli_query($conn, $sql2)){
     echo 'archive tabel created'.'<br>';
 }else{
     echo 'archive was unable to create'.'<br>';
 }

  $sql3 = "CREATE TABLE stock(
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
 product VARCHAR(255) NOT NULL,
label VARCHAR(255) NOT NULL,
category VARCHAR(255) NOT NULL,
 expenses INT(50) NOT NULL,
 total_stock VARCHAR(255) NOT NULL,
 date_of_entry datetime DEFAULT CURRENT_TIMESTAMP
 )";

    if(mysqli_query($conn, $sql3)){
     echo 'stock tabel created'.'<br>';
 }else{
     echo 'stock was unable to create'.'<br>';
 }

  $sql4 = "CREATE TABLE admin(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username  VARCHAR(255) NOT NULL,
      password  VARCHAR(255) NOT NULL,
      created_at datetime DEFAULT CURRENT_TIMESTAMP

  )";

    
 if(mysqli_query($conn, $sql4)){
      echo 'admin tabel created'.'<br>';
  }else{
      echo 'admin was unable to create'.'<br>';
  }
