<?php 
session_start();

if (isset($_SESSION['account_id']) && isset($_SESSION['username'])) {

     $account_id = $_SESSION['account_id']; 
     
     $sname = "localhost";
     $uname = "root";
     $password = "";
     $db_name = "pms_db";

     $conn = mysqli_connect($sname, $uname, $password, $db_name);
          if (!$conn) {
               echo "Connection failed!";
          }
          else{
               $sql = "SELECT * FROM `accounts` WHERE `account_id`=$account_id;";
               $result = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_array($result)){
                    $uname         = $row['username']; 
                    $pass          = $row['password'];
                    $first_name    = $row['first_name'];
                    $last_name     = $row['last_name'];
                    $role          = $row['role'];
                    $birthday      = $row['birthday'];
                    $age           = $row['age'];
                    $sex           = $row['sex'];
                    $address       = $row['address'];
                    $e_mail        = $row['e_mail'];
                    $mobile_number = $row['mobile_number'];
               }
          }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Gal's Cafe | Home </title>
    <link rel="icon" type="image/x-icon" href="Logo.ico">
	<link rel="stylesheet" type="text/css" href="Sidebar.css">
	<link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
    <link rel="stylesheet" type="text/css" href="Universal.css">
</head>
<body>
	<div class="header"> 
       <table>
            <tr>
                <td> <a href="Manager-Homepage.php"> <p> Home </p> </a> </td>
                <td> <a style="cursor: pointer;" onclick="sidebar()"> <p> Manager Tools </p> </a> </td>
                <td> 
                    <div class="Records-Dropdown">
                        <button class="Drop-Button"> Account </button>
                        <div class="Records">
                            <a href="Manager-Crew-Profile-Page.php"> Profile </a>
                            <a href="Logout-Function.php"> Log Out</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
	<div class="sidebar" id="sidebar">
		<h1> Manager Tools </h1>
		<div class="list"> 
			<a href="Manager-Rating-and-Review.php?category=all"> View Ratings & Reviews </a> <br>
			<a href="Manager-Suggestions.php"> View Suggestions </a> <br> 
			<a href="Manager-Reports.php"> View Reports </a> <br>
            <a href="Manager-Create-Account.php"> Create Manager/Crew Account </a> <br> 
			<a href="Manager-About.php"> Edit Business Information </a> <br>
		</div>
	</div>
	<div class="content"> 
		<div class="animation"> 
			<img class="logo-content" src="Logo.png">
			<h1> GAL'S CAFE </h1>
		</div>
	</div>
	<div class="footer">
        <table>
            <tr>
                <td> 
                    <h1 class="name"> Gal's Cafe </h1>
                    <p class="slogan"> Taste the Blend of Comfort and Flavor. </p> 
                </td>
                <td style="vertical-align: bottom;">  
                    <p class="copyright"> Copyright © 2024 Gal's Cafe. All Rights Reserved </p>
                </td>
            </tr>
        </table>
	</div>
</body>
<script type="text/javascript">
	function sidebar() {
		if (document.getElementById("sidebar").style.width === "0px") {
			document.getElementById("sidebar").style.width = "300px";
		} else {
			document.getElementById("sidebar").style.width = "0px";
		}
	}
	
</script>
</html>
<?php
}
else{
     header("Location: Log-In-Page.php");
     exit();
}?>