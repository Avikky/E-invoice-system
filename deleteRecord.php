<?php
require 'includes/header.php';
include 'config/config.php';



  $cusName = $_POST['cusName'];
    $cusEmail = $_POST['cusEmail'];
    $cusAddress = $_POST['cusAddress'];
    $cusPhone = $_POST['cusPhone'];
    $productName =$_POST['productName'];
    $productCate = $_POST['category'];
    $customCat = $_POST['other-category'];
    $productPrice = $_POST['productPrice'];
    $product_UID = $_POST['proId'];
    $val = $_POST['val'];
    $date = $_POST['date'];

if(isset($date,$val,$cusName,$cusEmail,$cusAddress,$cusPhone, $productName, $productCate, $customCat, $productPrice, $product_UID)){

    //querying the database
    $sql_query = "INSERT INTO archive (customer_name, customer_email, customer_address,  	customer_phone, product_purchased, product_category, custom_category, product_price, product_UId) VALUES('$cusName', '$cusEmail', '$cusAddress', '$cusPhone', '$productName', '$productCate', '$customCat', '$productPrice', '$product_UID')";

    $result_query = mysqli_query($conn, $sql_query);
    
    if($result_query == true){
        if($val = $_POST['val']){
            $sql = "DELETE FROM sales_record WHERE id = $val";
            $query = mysqli_query($conn, $sql);
            $errMsg=$succMsg="";
            if($query == true){
              //$succMsg = 'Record deleted successfully';
              header('Location: admin.php?value=Record deleted successfully');
            }else{
                //$errMsg = 'Error! cannot delete record';
                header('Location: admin.php?key=Error! cannot delete record');
            }
        }
    }else{
       //$errMsg = 'Error! cannot cannot backup record';
        header('Location: admin.php?key=Error! cannot cannot backup record'); 
    }

}else{
    //$errMsg = 'Error! submit button is not set';
    header('Location: admin.php?key=Error! submit button is not set');
}
                                                                                