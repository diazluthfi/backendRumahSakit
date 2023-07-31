<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id= $_GET['id'];
 
// Delete user row from table based on given id
$result2 = mysqli_query($con, "DELETE FROM pegawai WHERE Kode_Bagian='$id'");
$result = mysqli_query($con, "DELETE FROM bagian WHERE Kode_Bagian='$id'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:bagian.php");
?>
	