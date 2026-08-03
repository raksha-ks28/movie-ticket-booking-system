<?php
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM movies WHERE movie_id='$id'");

header("Location: admin_add_movie.php");
exit();
?>