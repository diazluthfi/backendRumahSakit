<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
 
// Delete user row from table based on given id
$sql= "TRUNCATE TABLE pasien";
$result= mysqli_query($con, $sql);

 
// After delete redirect to Home, so that latest user list will be displayed.
if ($result){

	header("Location: pasien.php");
}
?>
	