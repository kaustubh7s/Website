<?php
include '../config.php';
if(!isset($_SESSION['admin'])) header("Location: login.php");

if(isset($_POST['add'])){
    mysqli_query($conn,"INSERT INTO products (name,price)
    VALUES ('{$_POST['name']}',{$_POST['price']})");
}

if(isset($_GET['del'])){
    mysqli_query($conn,"DELETE FROM products WHERE id={$_GET['del']}");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<style>
body{font-family:Arial;background:#fff0f5}
.box{width:500px;margin:auto;background:#fff;padding:20px;border-radius:10px}
</style>
</head>
<body>

<div class="box">
<h2>Manage Products</h2>

<form method="post">
<input name="name" placeholder="Product name" required><br><br>
<input name="price" placeholder="Price" required><br><br>
<button name="add">Add Product</button>
</form>

<hr>

<?php
$res=mysqli_query($conn,"SELECT * FROM products");
while($r=mysqli_fetch_assoc($res)){
echo "{$r['name']} - ₹{$r['price']}
<a href='?del={$r['id']}'>❌</a><br>";
}
?>

<p><a href="dashboard.php">← Back to Orders</a></p>
</div>

</body>
</html>
