<?php

$conn = mysqli_connect('localhost', 'root', '', 'e_invoice');

    //checking the connection
    if(mysqli_connect_errno()){
        //failed conn
        echo "Cannot connect to Database".mysqli_connect_errno();
    }

    // UNCOMMENT THE FIRST CREATE TABLE SCRIPT THEN GO DOWN TO LINE 52-58 AND ALSO UNCOMENT IT SO AS TO CREATE THIS TABLES IN YOUR XAMP MYSQL DATABASE
    
//     // sql to create table
// $sql = "CREATE TABLE sales_record(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// customer_name VARCHAR(255) NOT NULL,
// customer_email VARCHAR(255) NOT NULL,
// customer_address VARCHAR(255) NOT NULL,
// customer_phone VARCHAR(50) NOT NULL,
// product_purchased VARCHAR(255) NOT NULL,
// product_category VARCHAR(255) NOT NULL,
// custom_category VARCHAR(255) NOT NULL,
// product_price INT(255) NOT NULL,
// product_UId VARCHAR(255) NOT NULL,
// purchased_at TIMESTAMP CURRENT_TIMESTAMP
// )";

// $sql = "CREATE TABLE archive(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// customer_name VARCHAR(255) NOT NULL,
// customer_email VARCHAR(255) NOT NULL,
// customer_address VARCHAR(255) NOT NULL,
// customer_phone VARCHAR(50) NOT NULL,
// product_purchased VARCHAR(255) NOT NULL,
// product_category VARCHAR(255) NOT NULL,
// custom_category VARCHAR(255) NOT NULL,
// product_price INT(255) NOT NULL,
// product_UId VARCHAR(255) NOT NULL,
// purchased_at TIMESTAMP NOT NULL CURRENT_TIMESTAMP
// )";

// $sql = "CREATE TABLE admin(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username  VARCHAR(255) NOT NULL,
//     password  VARCHAR(255) NOT NULL,
//     created_at datetime NOT  NULL CURRENT_TIMESTAMP

// )";




// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $conn->close();

    define('ROOT_URL', 'http://localhost/project/E-invoice/');

?>