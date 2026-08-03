<?php
include "db.php";

$msg="";

if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')";

    if(mysqli_query($conn,$sql)){
        header("Location: login.php");
        exit();
    } else {
        $msg="Registration Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>User Register</h2>
<p><?php echo $msg; ?></p>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form>

<a href="index.php">Back</a>

</body>
</html>