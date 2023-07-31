<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id= $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($con, "DELETE FROM pasien WHERE Antrian='$id'");
$result2 = mysqli_query($con, "DELETE FROM perawatan WHERE Antrian='$id'");
$result3 = mysqli_query($con, "DELETE FROM struk WHERE Antrian='$id'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pasien.php");
?>
	