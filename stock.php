<?php
require 'includes/header.php';
include 'config/config.php';

?>

<section class="stock">
    <h2 class="center blue-text">STOCK SECTION</h2>
    <div class="container">
        <div class="buttonLink">
            <a href="" class="btn blue">Add Stock</a>
        </div>
           <thead>
        <tr>
            <th>PRODUCT</th>
            <th>LABEL</th>
            <th>DATE OF ENTRY</th>
            <th>SOLD OUT</th>
            <th>REMAINING STOCK</th>
            <th>EXPENSES</th>
            <th>TOTAL STOCK</th>

        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php //echo $pro['purchased_at']; ?></td>
            <td><?php //echo $pro['customer_name']; ?></td>
            <td><?php //echo $pro['customer_email']; ?></td>
            <td><?php //echo $pro['customer_address']; ?></td>
            <td><?php //echo $pro['customer_phone']; ?></td>
            <td><?php //echo $pro['customer_phone']; ?></td>
            <td><?php //echo $pro['product_purchased']; ?></td>
        </tr>
    </tbody>
    </div>
</section>

<?php
    include ('includes/footer.php');
?>