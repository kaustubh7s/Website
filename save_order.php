<?php
include 'config.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$items = $_POST['items'];
$total = $_POST['total'];

mysqli_query($conn, "INSERT INTO orders (name, phone, address, items, total)
VALUES ('$name','$phone','$address','$items','$total')");

echo "success";
?>
