<?php

$conn = mysqli_connect('localhost', 'root', '', 'e_invoice');

    //checking the connection
    if(mysqli_connect_errno()){
        //failed conn
        echo "Cannot connect to Database".mysqli_connect_errno();
    }

    define('ROOT_URL', 'http://localhost/project/E-invoice/');

?>