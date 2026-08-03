<?php
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$total_movies = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM movies"))['total'];
$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users"))['total'];
$total_bookings = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM bookings"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Admin Dashboard</h2>

<p>Total Movies: <?php echo $total_movies; ?></p>
<p>Total Users: <?php echo $total_users; ?></p>
<p>Total Bookings: <?php echo $total_bookings; ?></p>

<a href="admin_add_movie.php">Add Movies</a>
<a href="admin_view_bookings.php">View Bookings</a>
<a href="admin_view_users.php">View Users</a>
<a href="admin_logout.php">Logout</a>

</body>
</html>