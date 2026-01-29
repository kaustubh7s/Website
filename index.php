<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Resin Keychains Store</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>ResinCraft Store</h1>
<a href="cart.php">🛒 View Cart</a>

<div class="products">
<?php
$result = mysqli_query($conn, "SELECT * FROM products");
while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card">
    <img src="<?php echo $row['image']; ?>">
    <h3><?php echo $row['name']; ?></h3>
    <p>₹<?php echo $row['price']; ?></p>
    <form method="post" action="add_to_cart.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button>Add to Cart</button>
    </form>
</div>
<?php } ?>
</div>

</body>
</html>
