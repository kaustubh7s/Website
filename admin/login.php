<?php include '../config.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{background:#fff0f5;font-family:Arial}
.login{width:300px;margin:100px auto;background:#fff;padding:20px;border-radius:10px}
button{background:#ff69b4;border:none;color:#fff;padding:10px;width:100%}
</style>
</head>
<body>

<div class="login">
<h2>Admin Login</h2>

<form method="post">
<input type="text" name="user" placeholder="Username" required><br><br>
<input type="password" name="pass" placeholder="Password" required><br><br>
<button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];

    $q=mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)){
        $_SESSION['admin']=$u;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>
</div>

</body>
</html>
