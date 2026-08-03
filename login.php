<?php
include "db.php";

$msg="";

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)==1){
        $row=mysqli_fetch_assoc($res);
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['name']=$row['name'];
        header("Location: index.php");
        exit();
    } else {
        $msg="Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>User Login</h2>
<p><?php echo $msg; ?></p>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>

<a href="index.php">Back</a>

</body>
</html>