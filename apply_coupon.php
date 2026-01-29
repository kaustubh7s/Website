<?php
include 'config.php';

$code = $_POST['code'];

$result = mysqli_query($conn, "SELECT * FROM coupons WHERE code='$code'");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['discount'] = $row['discount'];
}

header("Location: cart.php");
?>
