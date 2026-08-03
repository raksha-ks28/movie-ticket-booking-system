<?php
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['add'])){
    $title=$_POST['title'];
    $genre=$_POST['genre'];
    $duration=$_POST['duration'];
    $price=$_POST['price'];

    mysqli_query($conn,"INSERT INTO movies(title,genre,duration,price)
                        VALUES('$title','$genre','$duration','$price')");
}

$res=mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Movie</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Movie</h2>

<form method="POST">
<input type="text" name="title" placeholder="Movie Title" required>
<input type="text" name="genre" placeholder="Genre" required>
<input type="number" name="duration" placeholder="Duration" required>
<input type="number" name="price" placeholder="Price" required>
<button name="add">Add Movie</button>
</form>

<h3>Movies List</h3>

<table>
<tr>
<th>ID</th><th>Title</th><th>Genre</th><th>Price</th><th>Delete</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?php echo $row['movie_id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['genre']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><a href="admin_delete_movie.php?id=<?php echo $row['movie_id']; ?>">Delete</a></td>
</tr>
<?php } ?>

</table>

<a href="admin_dashboard.php">Back</a>

</body>
</html>