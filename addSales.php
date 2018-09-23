<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }

require 'header.php';
include 'config/config.php';

$cusName=$productName=$productCate=$productPrice=$product_UID= $errMsg= $succMsg=$ext=$realVal=$rand= " ";

function validateInput($data){
   $data = htmlentities($data);
   $data = trim($data);
   $data = htmlspecialchars($data);
   //$data = mysqli_real_escape_string($data, $data);
   return $data;
}

$cusName = validateInput($_POST['cusName']);
$productName =validateInput($_POST['productName']);
@$productCate = validateInput($_POST['category']);
$productPrice = validateInput($_POST['productPrice']);

if(isset($cusName,$productName,$productCate,$productPrice)){


    if (empty($cusName) || empty($productName) || empty($productCate) || empty($productPrice)) {
        $errMsg = "Fill in all field";
    }else{
        //Capitalize custumer name and Product name
        $capCusName = ucwords($cusName);
        $capProductName = ucwords($productName);

        //Validating Category
        if ($productCate === 'Electronics') {
            $ext = 'elect/';
            $rand = mt_rand(100,10000000);
            if ($rand == true) {
                $product_UID = $ext.$rand;
            }else{
                $errMsg = 'No category was selected';
            }
        }
        elseif($productCate === 'Phones'){
            $ext = 'phone/';
            $rand = mt_rand(100,10000000);
            if ($rand == true) {
               $product_UID = $ext.$rand;
            }else{
                $errMsg = 'No category was selected';
            }
        }
        elseif ($productCate === 'Phone Accessories') {
             $ext = 'phoneAcces/';
            $rand = mt_rand(100,10000000);
            if ($rand == true) {
                $product_UID = $ext.$rand;
            }else{
                $errMsg = 'No category was selected';
            }
        }
        //adding naira sign to product price

        $realProductPrice = $productPrice;

        //Loading data into the database
        $query = "INSERT INTO sales_record(customer_name, product_purchased, product_category, product_price, product_UId)
        VALUES('$capCusName', '$capProductName', '$productCate', '$realProductPrice', '$product_UID')";
        $result = mysqli_query($conn, $query);

        if ($result == true) {
            $succMsg = 'Sales added successfully';
        }else{
            $errMsg =  'Error! cannot load to database';
        }
    }
}
