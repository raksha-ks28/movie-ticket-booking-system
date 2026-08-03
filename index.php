<?php
include "db.php";

$total_movies = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM movies"))['total'];
$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users"))['total'];
$total_bookings = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM bookings"))['total'];
$total_revenue = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) AS rev FROM bookings"))['rev'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🎬 Movie Ticket Booking System</h1>

<h3>DBMS Statistics</h3>
<p>Total Movies: <?php echo $total_movies; ?></p>
<p>Total Users: <?php echo $total_users; ?></p>
<p>Total Bookings: <?php echo $total_bookings; ?></p>
<p>Total Revenue: <?php echo $total_revenue ?? 0; ?></p>

<hr>

<?php if(isset($_SESSION['user_id'])) { ?>
    <h2>Welcome <?php echo $_SESSION['name']; ?></h2>
    <a href="movies.php">View Movies</a>
    <a href="my_bookings.php">My Bookings</a>
    <a href="logout.php">Logout</a>
<?php } else { ?>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
<?php } ?>

<hr>
<a href="admin_login.php">Admin Panel</a>

</body>
</html>