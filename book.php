<?php
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    die("Movie ID Missing!");
}

$movie_id=$_GET['id'];

$movie_res=mysqli_query($conn,"SELECT * FROM movies WHERE movie_id='$movie_id'");
$movie=mysqli_fetch_assoc($movie_res);

if(isset($_POST['book'])){
    $seats=$_POST['seats'];
    $total=$seats * $movie['price'];
    $user_id=$_SESSION['user_id'];

    $sql="INSERT INTO bookings(user_id,movie_id,seats,total_price)
          VALUES('$user_id','$movie_id','$seats','$total')";

    if(mysqli_query($conn,$sql)){
        header("Location: my_bookings.php");
        exit();
    } else {
        echo "Booking Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Ticket</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>🎟 Book Ticket</h2>

<h3>Movie: <?php echo $movie['title']; ?></h3>
<p>Price per seat: ₹<?php echo $movie['price']; ?></p>

<form method="POST">
<input type="number" name="seats" placeholder="Enter seats" required>
<button name="book">Confirm Booking</button>
</form>

<a href="movies.php">Back</a>

</body>
</html>