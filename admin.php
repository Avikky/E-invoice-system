<?php
session_start();

$name = $_SESSION['name'] ;
$pass = $_SESSION['pass'];

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }


include 'includes/header.php';
include 'config/config.php';

$errMsg=$succMsg='';

$query = 'SELECT * FROM sales_record ORDER BY id DESC';

$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>

    <section class="task-table">
        <div class="task-table-box">
            <h2 class="green-text head center-align">E-INVOICING SYSTEM</h2>
            <?php if(isset($_GET['value'])) : ?>
                    <div class="card green center-align" id="msgout">
                    <p class="flow-text white-text"><?php echo $_GET['value']; ?></p>
                    </div>
                <?php endif; ?>
            <?php if(isset($_GET['key'])) : ?>
                <div class="card red center-align" id="msgout">
                <p class="flow-text white-text"><?php echo $_GET['key']; ?></p>
                </div>
            <?php endif; ?>

            <br><br>
            <div class="green center">
                <h3 class="white-text"><marquee>Welcome <?php echo $name ?></marquee></h3>
            </div>
            <div class="fab">
                <a href="sales.php" class="btn">Add Sales</a>
                <a href="trashRecord.php" class="btn delrec right">View Deleted Record</a>
            </div>
            
            <form action="logout.php" method="post" id="logoutBtn">
            <button class="btn red white-text center logoutBtn" name="logout">Logout</button>
            </form>

                <br><br>
           <div class="card">
           <table class="responsive-table">

            <thead>
            <tr>
                <th>Date & Time</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Customer Phone No.</th>
                <th>Product Purchased</th>
                <th>Product Category</th>
                <th>Product ID</th>
                <th>Price</th>
                <th>Decision</th>
            </tr>
            </thead>
            <?php foreach($products as $pro) : ?>
                <tbody>
                <tr>

                    <td><?php echo $pro['purchased_at']; ?></td>
                    <td><?php echo $pro['customer_name']; ?></td>
                    <td><?php echo $pro['customer_email']; ?></td>
                    <td><?php echo $pro['customer_address']; ?></td>
                    <td><?php echo $pro['customer_phone']; ?></td>
                    <td><?php echo $pro['product_purchased']; ?></td>
                    <td><?php echo $pro['product_category']; ?></td>
                    <td><?php echo $pro['product_UId']; ?></td>
                    <td><?php echo number_format($pro['product_price'], 2,'.', ','); ?></td>
                    <td>
                         <a href="invoice.php?id=<?php echo $pro['id']; ?>" class=" btn green">Print receipt</a>
                         <form method="POST" action="deleteRecord.php" class="deleteForm">
                            <input name="val" type="hidden" value="<?php echo $pro['id']; ?>" class="btn-id">
                            <input name="date" type="hidden" value="<?php echo $pro['purchased_at'] ?>" class="btnDate">
                            <input name="cusName" type="hidden" value="<?php echo $pro['customer_name']; ?>" class="btn-cusName">
                              <input name="cusEmail" type="hidden" value="<?php echo $pro['customer_email']; ?>" class="btn-cusEmail">
                                <input name="cusAddress" type="hidden" value="<?php echo $pro['customer_address']; ?>" class="btn-cusAddress">
                                  <input name="cusPhone" type="hidden" value="<?php echo $pro['customer_phone']; ?>" class="btn-cusName">
                            <input name="productName" type="hidden" value="<?php echo $pro['product_purchased']; ?>" class="btn-proName">
                            <input name="category" type="hidden" value="<?php echo $pro['product_category']; ?>" class="btn-proCate">
                            <input name="other-category" type="hidden" value="<?php echo $pro['custom_category']; ?>" class="btn-proCate">
                            <input name="proId" type="hidden" value="<?php echo $pro['product_UId']; ?>" class="btn-proId">
                            <input name="productPrice" type="hidden" value="<?php echo $pro['product_price']; ?>" class="btn-price">
                            <button type="submit" class="waves-effect waves-red btn red submit-btn">Delete Record</button>
                        </form>
                    </td>

                </tr>
                </tbody>
            <?php endforeach; ?>
            </table>
        </div>
        <a href="http://"></a>
        </div>
    </section>

<?php
include 'includes/footer.php';
?>


