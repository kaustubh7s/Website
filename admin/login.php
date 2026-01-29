<?php
include '../config.php';

if(isset($_POST['login'])){
    $u=$_POST['user'];
    $p=sha1($_POST['pass']);

    $q=mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)){
        $_SESSION['admin']=$u;
        header("Location: dashboard.php");
    } else {
        $error="Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{background:#fff0f5;font-family:Arial}
.box{width:320px;margin:120px auto;background:#fff;padding:25px;border-radius:12px}
button{background:#ff69b4;border:none;color:#fff;padding:10px;width:100%}
</style>
</head>
<body>

<div class="box">
<h2>Admin Login</h2>
<?php if(isset($error)) echo $error; ?>
<form method="post">
<input name="user" placeholder="Username" required><br><br>
<input type="password" name="pass" placeholder="Password" required><br><br>
<button name="login">Login</button>
</form>
</div>

</body>
</html>
