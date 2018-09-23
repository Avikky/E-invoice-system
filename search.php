<?php

include ('config/config.php');

function validateInput($data){
    $data = htmlentities($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if( isset($_POST['submit']) ){
	$search = validateInput($_POST['search']);
		$sql = "SELECT * FROM `sales_record` WHERE `product_UId` = '$search'";
		$query = mysqli_query($conn, $sql);

		if($fetchData = mysqli_fetch_assoc($query)){
			if($fetchData['product_UId'] == $search){
        $search = $fetchData["id"];
				echo $msg =  "Record identified Please click on the button bellow <br>";
        echo "<a href='invoice.php?id=$search' class='btn-large center orange white-text' id='data1'> Print Receipt</a>";
      }else{
				echo 'Record not found';
			}
		}else{
			echo 'Error in fetching data';
		}
}else{
	echo "Button is not set";
}
