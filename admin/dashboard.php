<?php
include '../config.php';
if(!isset($_SESSION['admin'])) header("Location: login.php");

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE orders SET status='{$_POST['status']}' WHERE id={$_POST['id']}");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Orders</title>
<style>
body{font-family:Arial;background:#fff0f5}
table{width:95%;margin:auto;background:#fff;border-collapse:collapse}
th,td{padding:10px;border:1px solid #ddd}
th{background:#ff69b4;color:#fff}
</style>
</head>
<body>

<h2 style="text-align:center">Orders Dashboard</h2>
<p style="text-align:center">
<a href="products.php">Manage Products</a> |
<a href="logout.php">Logout</a>
</p>

<table>
<tr>
<th>ID</th><th>Name</th><th>Total</th><th>Status</th><th>Action</th>
</tr>

<?php
$res=mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");
while($r=mysqli_fetch_assoc($res)){
?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['name'] ?></td>
<td>₹<?= $r['total'] ?></td>
<td><?= $r['status'] ?></td>
<td>
<form method="post">
<input type="hidden" name="id" value="<?= $r['id'] ?>">
<select name="status">
<option>Pending</option>
<option>Processing</option>
<option>Completed</option>
</select>
<button name="update">Update</button>
</form>
</td>
</tr>
<?php } ?>

</table>
</body>
</html>
