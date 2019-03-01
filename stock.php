<?php
session_start();

$name = $_SESSION['name'] ;
$pass = $_SESSION['pass'];

if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])) {
     header('Location: adminLogin.php?value=You must be logged in as admin');
 }

require 'includes/header.php';
include 'config/config.php';

$fetchData = $fetch = '';
$sql = "SELECT * FROM stock ORDER BY id DESC";
$query = mysqli_query($conn, $sql);

if($query){
    $fetchData = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>

<section class="stock">
    <h2 class="center blue-text">STOCK SECTION</h2>
    <div class="container">
        <div class="buttonLink">
            <a href="addstock.php" class="btn blue">Add New Stock</a>
        </div>
        <table class="responsive-table">
            <thead>
            <tr>
                <th>DATE OF ENTRY</th>
                <th>PRODUCT</th>
                <th>LABEL</th>
                <th>EXPENSES</th>
                <th>TOTAL STOCK</th>

            </tr>
            </thead>
            <?php foreach($fetchData as $fetch) : ?>
            <tbody>
                <tr>
                    <td><?php echo $fetch['date_of_entry']; ?></td>
                    <td><?php echo $fetch['product']; ?></td>
                    <td><?php echo $fetch['label']; ?></td>
                    <td><?php echo $fetch['category']; ?></td>
                    <td><?php echo $fetch['expenses']; ?></td>
                    <td><?php echo $fetch['total_stock']; ?></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        <div class="report-btn center">
            <a href="" class="btn pulse orange">click to view sales report</a>
        </div>
    </div>
</section>

<?php
    include ('includes/footer.php');
?>