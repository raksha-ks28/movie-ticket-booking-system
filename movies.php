<?php
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$res=mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Movies</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>🎥 Movies List</h2>

<table>
<tr>
<th>ID</th><th>Title</th><th>Genre</th><th>Duration</th><th>Price</th><th>Book</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?php echo $row['movie_id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['genre']; ?></td>
<td><?php echo $row['duration']; ?> min</td>
<td>₹<?php echo $row['price']; ?></td>
<td><a href="book.php?id=<?php echo $row['movie_id']; ?>">Book</a></td>
</tr>
<?php } ?>

</table>

<a href="index.php">Back</a>

</body>
</html>