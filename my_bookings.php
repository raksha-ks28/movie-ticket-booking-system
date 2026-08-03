<?php
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id=$_SESSION['user_id'];

$sql="SELECT bookings.booking_id, movies.title, bookings.seats,
      bookings.total_price, bookings.booking_date
      FROM bookings
      JOIN movies ON bookings.movie_id = movies.movie_id
      WHERE bookings.user_id='$user_id'
      ORDER BY bookings.booking_id DESC";

$res=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>📌 My Bookings</h2>

<table>
<tr>
<th>ID</th><th>Movie</th><th>Seats</th><th>Total</th><th>Date</th><th>Cancel</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?php echo $row['booking_id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['seats']; ?></td>
<td><?php echo $row['total_price']; ?></td>
<td><?php echo $row['booking_date']; ?></td>
<td>
<a href="cancel_booking.php?id=<?php echo $row['booking_id']; ?>"
onclick="return confirm('Cancel this booking?')">Cancel</a>
</td>
</tr>
<?php } ?>

</table>

<a href="index.php">Back</a>

</body>
</html>