<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Your Cart</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Your Cart</h2>

<?php
$total = 0;
if (!empty($_SESSION['cart'])) {
foreach ($_SESSION['cart'] as $id => $qty) {
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
$subtotal = $row['price'] * $qty;
$total += $subtotal;
?>
<p>
<?php echo $row['name']; ?>  
Qty: <?php echo $qty; ?>  
₹<?php echo $subtotal; ?>
</p>
<?php }} ?>

<hr>
<h3>Total: ₹<?php echo $total; ?></h3>

<form method="post" action="apply_coupon.php">
    <input type="text" name="code" placeholder="Enter Coupon">
    <button>Apply Coupon</button>
</form>

<?php
if (isset($_SESSION['discount'])) {
    $discount = $_SESSION['discount'];
    $discountAmount = ($total * $discount) / 100;
    echo "<h3>Discount: -₹$discountAmount ($discount%)</h3>";
    echo "<h2>Payable: ₹" . ($total - $discountAmount) . "</h2>";
}
?>

<a href="checkout.php">Checkout</a>

</body>
</html>
