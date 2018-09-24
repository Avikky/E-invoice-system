<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }


require 'includes/header.php';
include 'config/config.php';



$succmsg=$errmsg='';

$query = 'SELECT * FROM archive ORDER BY id DESC';

$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);



if (isset($_POST['wipe-btn'])){
    $sql =  "DELETE FROM archive";
    $query = mysqli_query($conn, $sql);

    if($query){
        //$succmsg = "All data has been deleted from the archive";
        header('Location: trashRecord.php?value=All data has been deleted from the archive');
    }else{
        //$errmsg = "Cannot not delete records!";
          header('Location: trashRecord.php?key=Cannot not delete records!');
    }
  
}

?>

<div class="container">
    <h2 class="center-align red-text">DELETED RECORDS</h2>
       <?php if(isset($_GET['value'])) : ?>
                    <div class="card green center-align" id="msgout">
                    <p class="flow-text white-text"><?php echo $_GET['value']; ?></p>
                    </div>
                <?php endif; ?>
            <?php if(isset($_GET['key'])) : ?>
                <div class="card orange center-align" id="msgout">
                <p class="flow-text white-text"><?php echo $_GET['key']; ?></p>
                </div>
        <?php endif; ?>
    
<div class="card">
    <a href="admin.php" class="right btn blue">Back to admin page</a>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <button class="btn red" name="wipe-btn">Clear all Deleted records</button>
        </form>
           <table class="responsive-table">

            <thead>
            <tr>
                <th>Date & Time</th>
                <th>Customer Name</th>
                <th>Product Purchased</th>
                <th>Product Category</th>
                <th>Product ID</th>
                <th>Price</th>
            </tr>
            </thead>
            <?php foreach($products as $pro) : ?>
                <tbody>
                <tr>

                    <td><?php echo $pro['purchased_at']; ?></td>
                    <td><?php echo $pro['customer_name']; ?></td>
                    <td><?php echo $pro['product_purchased']; ?></td>
                    <td><?php echo $pro['product_category']; ?></td>
                    <td><?php echo $pro['product_UId']; ?></td>
                    <td><?php echo $pro['product_price']; ?></td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="admin.php" class="right btn blue">Back to admin page</a>

</div>

<?php
include 'includes/footer.php';
?>
