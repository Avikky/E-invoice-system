<?php
include 'includes/header.php';
include 'config/config.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM `sales_record` WHERE id= '$id'";

$result = mysqli_query($conn, $query);

$product = mysqli_fetch_assoc($result);

mysqli_free_result($result);
?>

<div class="container" id="invoive-page">
<br><br>
<button class="btn btn-larg" onclick="print()">Print Receipt</button>
    <div class="card">
        <div class="recipt">
            <h3 class="center-align title blue-text">FINE BROTHERS NIGERIA LIMITED</h3>
            <div class="address right">
                <h5 class="blue-text">Contact Address</h5>
            <i class="blue-text">
                    <p><b>Address:</b> 26 Okpara Ave Enugu</p>
                    <p><b>State:</b> Enugu State</p>
                    <p><b>Receipt-ID:</b><?php echo $product['product_UId']; ?></p>
                    <b>Date & Time:</b> <?php echo $product['purchased_at']; ?>
                </i>
            </div>
            <div class="P-id">
                <h6 class="center-align red-text"><b>Product ID: <?php echo $product['product_UId']; ?></b></h6>
            </div>
            <div class="info">
                <b class="blue-text">Customer Name:</b> <strong><?php echo $product['customer_name']; ?></strong><br><br>
                 <b class="blue-text">Customer Adress:</b> <strong><?php echo $product['customer_address']; ?></strong><br><br>
                  <b class="blue-text">Customer Contact</b> <strong><?php echo $product['customer_phone']; ?></strong><br><br>
                <b class="blue-text">Prouduct Purchased:</b> <?php echo $product['product_purchased']; ?><br><br>
                <span class="amt blue-text"><b>Amount: &#8358</b><?php echo number_format($product['product_price'], 2, '.', ','); ?></span>
                <br>

            </div>
        </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
