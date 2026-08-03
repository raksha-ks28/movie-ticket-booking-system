<?php
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$sql="SELECT bookings.booking_id, users.name, movies.title,
      bookings.seats, bookings.total_price, bookings.booking_date
      FROM bookings
      JOIN users ON bookings.user_id = users.user_id
      JOIN movies ON bookings.movie_id = movies.movie_id
      ORDER BY bookings.booking_id DESC";

$res=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>All Bookings</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>All Bookings</h2>

<table>
<tr>
<th>ID</th><th>User</th><th>Movie</th><th>Seats</th><th>Total</th><th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?php echo $row['booking_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['seats']; ?></td>
<td><?php echo $row['total_price']; ?></td>
<td><?php echo $row['booking_date']; ?></td>
</tr>
<?php } ?>

</table>

<a href="admin_dashboard.php">Back</a>

</body>
</html>