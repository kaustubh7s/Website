<?php
include '../config.php';
if(!isset($_SESSION['admin'])) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body{font-family:Arial;background:#fff0f5}
table{width:95%;margin:auto;background:#fff;border-collapse:collapse}
th,td{padding:10px;border:1px solid #ddd}
th{background:#ff69b4;color:#fff}
a{color:#ff1493}
</style>
</head>
<body>

<h2 style="text-align:center">Orders Dashboard</h2>
<p style="text-align:center"><a href="logout.php">Logout</a></p>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Address</th>
<th>Items</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php
$res=mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");
while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['phone']}</td>
<td>{$row['address']}</td>
<td>{$row['items']}</td>
<td>₹{$row['total']}</td>
<td>{$row['created_at']}</td>
</tr>";
}
?>

</table>

</body>
</html>
