<?php 
session_start(); 
include "Database-Connector.php";

$account_id = $_SESSION['account_id'];

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


$about	= validate($_POST['about']);

if($about == null) {
	header("Location: Manager-About.php?message=Business description cannot be empty.");
	exit();
} else {
	$update_sql = "UPDATE `about` SET `description` = '$about';";
	$update_result = mysqli_query($conn, $update_sql);

	if($update_result) {
		header("Location: Manager-About.php?message=Business description has been updated succcessfully!");
		exit();
	} else {
		header("Location: Manager-About.php?message=An error has occured. Please try again.");
		exit();
	}
}
?>