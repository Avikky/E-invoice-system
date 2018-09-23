<?php
require 'includes/header.php';
include 'config/config.php';

$date = $_POST['date'];
$name = $_POST['name'];
$proName = $_POST['proName'];
$proCate = $_POST['proCategory'];
$proId = $_POST['proId'];
$proPrice = $_POST['proPrice'];

if(isset($date,$name,$proName,$proCate,$proId,$proPrice)){

    //querying the database
    $sql_query = "INSERT INTO archive(customer_name,product_purchased,product_category,product_price,product_UId,purchased_at)VALUES('$name','$proName','$proCate','$proPrice','$proId','$date')";
    $result_query = mysqli_query($conn,$sql_query);
    
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
                                                                                