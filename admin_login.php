<?php
include "db.php";

$msg="";

if(isset($_POST['login'])){
    $u=$_POST['username'];
    $p=$_POST['password'];

    $res=mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");

    if(mysqli_num_rows($res)==1){
        $_SESSION['admin']=$u;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $msg="Invalid Admin Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Admin Login</h2>
<p><?php echo $msg; ?></p>

<form method="POST">
<input type="text" name="username" placeholder="Admin Username" required>
<input type="password" name="password" placeholder="Admin Password" required>
<button name="login">Login</button>
</form>

<a href="index.php">Back</a>

</body>
</html>