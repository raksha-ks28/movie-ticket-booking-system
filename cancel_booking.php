<?php
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id=$_SESSION['user_id'];
$booking_id=$_GET['id'];

mysqli_query($conn,"DELETE FROM bookings WHERE booking_id='$booking_id' AND user_id='$user_id'");

header("Location: my_bookings.php");
exit();
?>