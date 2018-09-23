<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }


require 'header.php';
include 'config/config.php';

$errMsg=$succMsg='';

$query = 'SELECT * FROM archive ORDER BY id DESC';

$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>

<div class="container">
    <h2 class="center-align red-text">DELETED RECORDS</h2>
<div class="card">
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
</div>

<?php
include 'footer.php';
?>
