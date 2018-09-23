<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }

require 'includes/header.php';
include 'config/config.php';

$cusName =$cusEmail=$cusAddress=$cusPhone =$productName=$productCate=$productPrice=$product_UID= $errMsg= $succMsg=$ext=$realVal=$rand=$realProductPrice =  " ";

function validateInput($data){
   $data = htmlentities($data);
   $data = trim($data);
   $data = htmlspecialchars($data);
   //$data = mysqli_real_escape_string($data, $data);
   return $data;
}





if(isset($_POST['submit'])){
    $cusName = validateInput($_POST['cusName']);
    $cusEmail = validateInput($_POST['cusEmail']);
    $cusAddress = validateInput($_POST['cusAddress']);
    $cusPhone = validateInput($_POST['cusPhone']);
    $productName =validateInput($_POST['productName']);
    @$productCate = validateInput($_POST['category']);
    $customCat = validateInput($_POST['other-category']);
    $productPrice = validateInput($_POST['productPrice']);

    if (empty($cusName) || empty($cusEmail) || empty($cusAddress) || empty($cusPhone) || empty($productName) || empty($productPrice) ) {
        $errMsg = "Fill in all field";
    }else{
        //Validating Category
        if ($productCate === 'Electronics') {
            $ext = 'elect/';
            $rand = mt_rand(100,10000000);
            if ($rand === true) {
                $product_UID = $ext.$rand;
            }else{
                $errMsg = 'No category was selected';
            }
        }
        elseif($productCate === 'Phones'){
            $ext = 'phone/';
            $rand = mt_rand(100,10000000);
            if ($rand === true) {
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
            elseif (!empty($customCat) && empty($productCate)) {
                
                $productCate = str_replace(' ', '', ucwords($customCat));
             $ext = $productCate.'/';
            $rand = mt_rand(100,10000000);
            if ($rand == true) {
                $product_UID = $ext.$rand;
            }else{
                $errMsg = 'No category was selected';
            }
        }
        //adding a comma to the  product price
        
        $realProductPrice = $productPrice;
        

        //Capitalize custumer name and Product name
        $capCusName = ucwords($cusName);
        $capProductName = ucwords($productName);

        //Loading data into the database
        $query = "INSERT INTO sales_record(customer_name, customer_email, customer_address,  	customer_phone, product_purchased, product_category, custom_category, product_price, product_UId) VALUES('$capCusName', '$cusEmail', '$cusAddress', '$cusPhone', '$capProductName', '$productCate', '$customCat', '$realProductPrice', '$product_UID')";

        $result = mysqli_query($conn, $query);

        if ($result === true) {
            $succMsg = 'Sales added successfully';

        }else{
            $errMsg =  'Error! cannot load to database';
        }
    }
}


?>



<section class="section-form">
    <div class="container">
    
    <?php if($errMsg != '') : ?>
        <div class="card red center-align">
            <p class="flow-text white-text" id="msgout"><?php echo $errMsg; ?></p>
        </div>
    <?php endif; ?>
    <?php if($succMsg != '') : ?>
        <div class="card green center-align" id="msgout">
            <p class="flow-text white-text"><?php echo $succMsg; ?></p>
        </div>
    <?php endif; ?>
    
        <h3 class="center-align">Add Sales</h3>
        
    <!--form to Add sales-->
        <div class="add-task">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="input-field" method="Post">
            <a href="admin.php" class="right btn blue">Back to admin page</a>
                <div class="input-field">
                <span><b>Customer Name</b></span>
                <input placeholder="Full Name" id="cusName" name="cusName" type="text" class="validate">
                </div>
                <div class="input-field">
                    <span><b>Customer Email</b></span>
                    <input placeholder="Customer Email" id="cusEmail" name="cusEmail" type="email" class="validate">
                </div>
                  <div class="input-field">
                    <span><b>Customer Address</b></span>
                    <input placeholder="Customer Address" id="cusAddress" name="cusAddress" type="text" class="validate">
                </div>
                <div class="input-field">
                    <span><b>Customer phone NO.</b></span>
                    <input placeholder="Customer Phone Number" id="cusphone" name="cusPhone" type="tel" class="validate">
                </div>
                <div class="input-field">
                <span><b>Product Purchased</b></span>
                <input placeholder="Product Name" id="productName" name="productName" type="text" class="validate">
                </div>
                 <div class="input-field">
                <span><b>Product Category</b></span>
                <select name="category">
                  <option value="" disabled selected>Select Product Category</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Phones">Phones</option>
                  <option value="Phone Accessories">Phone Accessories</option>
                </select>
                </div>
                <button id="create-newCat" class="btn btn-large blue">Create custom category</button>
                <div class="input-field" style="display: none;" id="other-Cat" >
                <span><b>Custome Product Category</b></span>
                     <input name="other-category" type="text" placeholder="Type your custom category here">
                </div>
                <div class="input-field">
                    <span><b>Product Price</b></span>
                    <input placeholder="000.00&#8358" id="productPrice" name="productPrice" type="number" class="validate">
                </div>
                <input type="submit" class="btn blue lighten-1" id="submit" name="submit" value="Add Sales">

             <a href="admin.php" class="right btn blue">Back to admin page</a>
            </form>
        </div>
       
    </div>
</section>

<?php
    include ('includes/footer.php');
?>
