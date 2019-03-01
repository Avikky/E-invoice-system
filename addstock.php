<?php 
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }
require 'includes/header.php';
include 'config/config.php';

function validateInput($data){
   $data = htmlentities($data);
   $data = trim($data);
   $data = htmlspecialchars($data);
   //$data = mysqli_real_escape_string($data, $data);
   return $data;
}

$product = $label = $category = $totalStock = $expenses = $dateOfEntry = $msg = $errmsg = '';

if(isset($_POST['submit'])){
    $product = validateInput($_POST['product']);
    $label = validateInput($_POST['label']);
    $category = validateInput($_POST['category']);
    $totalStock = validateInput($_POST['total-stock']);
    $expenses = validateInput($_POST['stock-expenses']);

    if(!empty($product && $label && $totalStock && $expenses)){
        $sql = "INSERT INTO stock(product, label, category, total_stock, expenses) VALUE('$product', '$label', '$category', '$totalStock', '$expenses')";
        $query = mysqli_query($conn, $sql);
        if($query){
           $redirect =  header('Location: addstock.php?value=Stock updated successfully');
           if($redirect){
               $msg = 'Stock updated successfully';
           }
        }else{
            $errmsg = 'Stock failed to update';
        }
    }else{
       $errmsg = 'please fill in all field';
    }
        

}


?>

<section class="addstock">
    <h3 class="center">Enter The Details Of Incoming Stock</h3>
    <div class="container">
        <?php if(isset($_GET['value'])) : ?>
            <div class="card green center-align" id="msgout">
            <p class="flow-text white-text"><?php echo $_GET['value']; ?></p>
            </div>
        <?php endif; ?>
                <?php if($errmsg != '') : ?>
                <div class="callback red center white-text">
                    <h4><?php echo $errmsg; ?></h4>
                </div>
            <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-field">
                <span><b>Product</b></span>
                <input placeholder="Product Name"  name="product" type="text" class="validate">
            </div>
            <div class="input-field">
                <span><b>Product Label</b></span>
                <input placeholder="Describe product model"  name="label" type="text" class="validate">
            </div>
            <div class="input-field">
                <span><b>Product Category</b></span>
                <input placeholder="e.g electronics or phone"  name="category" type="text" class="validate">
            </div>
            <div class="input-field">
                <span><b>Total Piece in Stock(No. of product)</b></span>
                <input placeholder="Total pieces of the product in stock" name="total-stock" type="number" class="validate">
            </div>
            <div class="input-field">
                <span><b>Price Of Purchase</b></span>
                <input placeholder="Total pieces of the product in stock" name="stock-expenses" type="number" class="validate">
            </div>
            <button class="blue btn" name="submit">Submit</button>
        </form>
        <a href="stock.php" class="btn blue right">Back to Stock section</a>
    </div>
</section>















<?php 
include 'includes/footer.php';

?>