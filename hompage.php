<?php
session_start();

$name = $_SESSION['name'] ;
$pass = $_SESSION['pass'];

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }

include 'config/config.php';

include 'includes/header.php';


?>


<section>
    <div class="container">
       <div class="cover">
        <div class="salesLink center home">
            <a href="admin.php" class="btn-large blue">SALES RECORD</a>
        </div>
         <div class=" center home">
            <a href="stock.php" class="btn-large green">PRODUCT IN STOCK</a>
        </div>
         <div class=" center home">
            <a href="" class="btn-large orange">INVENTORY</a>
        </div>
         <div class=" center home">
            <a href="" class="btn-large red">SUMMARY</a>
        </div>
       </div>
    </div>
</section>

<?php
    include ('includes/footer.php');
?>