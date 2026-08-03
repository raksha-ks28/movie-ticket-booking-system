<?php
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$res=mysqli_query($conn,"SELECT * FROM users ORDER BY user_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Registered Users</h2>

<table>
<tr><th>ID</th><th>Name</th><th>Email</th></tr>

<?php while($row=mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
</tr>
<?php } ?>

</table>

<a href="admin_dashboard.php">Back</a>

</body>
</html>