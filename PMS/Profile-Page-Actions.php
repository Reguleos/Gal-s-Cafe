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

$old_uname         = $_SESSION['uname']; 
$old_first_name    = $_SESSION['first_name']; 
$old_last_name     = $_SESSION['last_name']; 
$old_birthday      = $_SESSION['birthday']; 
$old_age           = $_SESSION['age']; 
$old_sex           = $_SESSION['sex']; 
$old_address       = $_SESSION['address']; 
$old_e_mail        = $_SESSION['e_mail']; 
$old_mobile_number = $_SESSION['mobile_number'];

$uname         = validate($_POST['uname']);
$first_name    = validate($_POST['first_name']);
$last_name     = validate($_POST['last_name']);
$birthday      = validate($_POST['birthday']);
$age           = validate($_POST['age']);
$sex           = validate($_POST['sex']);
$address       = validate($_POST['address']);
$e_mail        = validate($_POST['e_mail']);
$mobile_number = validate($_POST['mobile_number']);

if($uname==null) 		 {$uname = $old_uname;}
if($first_name==null) 	 {$first_name = $old_first_name;}
if($last_name==null) 	 {$last_name = $old_last_name;}
if($birthday==null) 	 {$birthday = $old_birthday;}
if($age==null) 			 {$age = $old_age;}
if($sex==null) 		 {$sex = $old_sex;}
if($address==null) 		 {$address = $old_address;}
if($e_mail==null) 		 {$e_mail = $old_e_mail;}
if($mobile_number==null) {$mobile_number = $old_mobile_number;}

$link = "&uname=".$uname."&first_name=".$first_name."&last_name=".$last_name."&birthday=".$birthday."&age=".$age."&sex=".$sex."&address=".$address."&e_mail=".$e_mail."&mobile_number=".$mobile_number;

$username_sql = "SELECT * FROM `accounts` WHERE `account_id` = '$account_id';";
$username_result = mysqli_query($conn, $username_sql);

if ($uname == $old_uname) {
	if(empty($uname) || empty($first_name) || empty($last_name) || empty($birthday) || empty($age) || empty($sex) || empty($address) || empty($e_mail) || empty($mobile_number)) {
		header("Location: Profile-Page.php?profile_result=Please fill out all fields.$link");
	    exit();
	} else {
		$update_sql = "UPDATE `accounts` SET `username` = '$uname', `first_name` = '$first_name', `last_name` = '$last_name', `birthday` = '$birthday', `age` = '$age', `sex` = '$sex', `address` = '$address', `e_mail` = '$e_mail', `mobile_number` = '$mobile_number' WHERE `account_id` = '$account_id';";
		$update_result = mysqli_query($conn, $update_sql);

		if ($update_result) {
			header("Location: Profile-Page.php?profile_result=Your profile has been updated successfully!");
	    	exit();
		} else {
			header("Location: Profile-Page.php?profile_result=An unknown error has occured. Please try again.");
	    	exit();
		}
	}
} else if (mysqli_num_rows($username_result) > 0) {
	$link = "&uname=".$old_uname."&first_name=".$first_name."&last_name=".$last_name."&birthday=".$birthday."&age=".$age."&sex=".$sex."&address=".$address."&e_mail=".$e_mail."&mobile_number=".$mobile_number;
	header("Location: Profile-Page.php?profile_result=The username is already taken. Try another one. $link");
			exit(); 
} else {
	if(empty($uname) || empty($first_name) || empty($last_name) || empty($birthday) || empty($age) || empty($sex) || empty($address) || empty($e_mail) || empty($mobile_number)) {
		header("Location: Profile-Page.php?profile_result=Please fill out all fields.$link");
	    exit();
	} else {
		$update_sql = "UPDATE `user_profile` SET `username` = '$uname', `first_name` = '$first_name', `last_name` = '$last_name', `birthday` = '$birthday', `age` = '$age', `sex` = '$sex', `address` = '$address', `e_mail` = '$e_mail', `mobile_number` = '$mobile_number' WHERE `account_id` = '$account_id';";
		$update_result = mysqli_query($conn, $update_sql);

		if ($update_result) {
			header("Location: Profile-Page.php?profile_result=Your profile has been updated successfully!");
	    	exit();
		} else {
			header("Location: Profile-Page.php?profile_result=An unknown error has occured. Please try again.");
	    	exit();
		}
	}
}