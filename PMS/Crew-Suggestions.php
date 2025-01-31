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

            $all_suggestion_sql = "SELECT `suggestions`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `suggestions`.`category`, 
            						  `suggestions`.`suggestion`,
            						  `suggestions`.`date_time`
            					FROM `suggestions` LEFT JOIN `accounts` 
            					ON `suggestions`.`account_id` = `accounts`.`account_id` 
            					ORDER BY `suggestions`.`date_time`; ";
            $all_suggestion_result = mysqli_query($conn, $all_suggestion_sql);
            while($row = mysqli_fetch_array($all_suggestion_result)){
                $a_account_id[]		= $row['account_id']; 
                $a_username[] 		= $row['username'];
                $a_first_name[] 	= $row['first_name'];
                $a_last_name[] 		= $row['last_name'];
                $a_category[]     	= $row['category'];
                $a_suggestion[]     = $row['suggestion'];
                $a_date_time[]		= $row['date_time']; 

            }

            $all_count = count($a_suggestion);

            $food_suggestion_sql = "SELECT `suggestions`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `suggestions`.`category`, 
            						  `suggestions`.`suggestion`, 
            						  `suggestions`.`date_time`
            					FROM `suggestions` LEFT JOIN `accounts` 
            					ON `suggestions`.`account_id` = `accounts`.`account_id` 
            					WHERE `suggestions`.`category`='food'
            					ORDER BY `suggestions`.`date_time`;";
            $food_suggestion_result = mysqli_query($conn, $food_suggestion_sql);
            while($row = mysqli_fetch_array($food_suggestion_result)){
                $f_account_id[]		= $row['account_id']; 
                $f_username[] 		= $row['username'];
                $f_first_name[] 	= $row['first_name'];
                $f_last_name[] 		= $row['last_name'];
                $f_category[]     	= $row['category'];
                $f_suggestion[]     = $row['suggestion'];
                $f_date_time[]		= $row['date_time']; 
            }

            $food_count = count($f_suggestion);

            $beverage_suggestion_sql = "SELECT `suggestions`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `suggestions`.`category`, 
            						  `suggestions`.`suggestion`,
            						  `suggestions`.`date_time`
            					FROM `suggestions` LEFT JOIN `accounts` 
            					ON `suggestions`.`account_id` = `accounts`.`account_id` 
            					WHERE `suggestions`.`category`='beverage'
            					ORDER BY `suggestions`.`date_time`;";
            $beverage_suggestion_result = mysqli_query($conn, $beverage_suggestion_sql);
            while($row = mysqli_fetch_array($beverage_suggestion_result)){
                $b_account_id[]		= $row['account_id']; 
                $b_username[] 		= $row['username'];
                $b_first_name[] 	= $row['first_name'];
                $b_last_name[] 		= $row['last_name'];
                $b_category[]     	= $row['category'];
                $b_suggestion[]     = $row['suggestion'];
                $b_date_time[]		= $row['date_time']; 
            }

            $beverage_count = count($b_suggestion);

            $service_suggestion_sql = "SELECT `suggestions`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `suggestions`.`category`, 
            						  `suggestions`.`suggestion`,
            						  `suggestions`.`date_time`
            					FROM `suggestions` LEFT JOIN `accounts` 
            					ON `suggestions`.`account_id` = `accounts`.`account_id` 
            					WHERE `suggestions`.`category`='service'
            					ORDER BY `suggestions`.`date_time`;";
            $service_suggestion_result = mysqli_query($conn, $service_suggestion_sql);
            while($row = mysqli_fetch_array($service_suggestion_result)){
                $s_account_id[]		= $row['account_id']; 
                $s_username[] 		= $row['username'];
                $s_first_name[] 	= $row['first_name'];
                $s_last_name[] 		= $row['last_name'];
                $s_category[]     	= $row['category'];
                $s_suggestion[]     = $row['suggestion'];
                $s_date_time[]		= $row['date_time']; 
            }

            $service_count = count($s_suggestion);
        }


?>
<!DOCTYPE html>
<html>
<head>
	<title> Gal's Café | Suggestions </title>
	<link rel="icon" type="image/x-icon" href="Logo.ico">
	<link rel="stylesheet" type="text/css" href="Sidebar.css">
	<link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
    <link rel="stylesheet" type="text/css" href="Universal.css">
	<style type="text/css">
		body {
			height: auto;
		}
		h1 {
			margin-top: 100px;
			margin-bottom: 0px;
			font-size: 30px;
			text-align: center;
		}
		h2 {
			font-size: 23px;
			margin: 0px;
			text-align: center;
			line-height: 23px;
			display: inline;
		}
		div.content {
			margin-top: 20px;
        	grid-template-columns: 32% 32% 32%;
        	display: grid;
        	column-gap: 2%;
        	padding: 0px 50px;
		}
		div.content div.subcontent {
			border: 1px solid #6C4E31;
			border-radius: 8px;
			height: 235px;
			padding: 10px;
		}
		div.content div.subcontent div.chart {
			width: 180px;
			height: 180px;
			background: rgba(0, 0, 0, 0);
			display: block;
		}
		div.content div.subcontent canvas {
			margin-top: 10px;
			float: left;
			width: 50%;
			height: auto;
		}
		div.content div.subcontent div.description {
			float: right;
			text-align: left;
			width: 45%;
			padding: 5px;
			margin-top: 40px;
		}
		div.content div.subcontent div.description b {
			font-size: 70px;
		}
		div.content div.subcontent div.description p {
			font-size: 18px;
			margin: 0px;
		}
		div.content div.subcontent hr {
			width: 100%;
			height: 2px;
			margin-top: 205px;
			border: 0px;
			background: #6C4E31;
		}
		div.buttons {
            border: 0px;
            width: 80%;
            margin: 20px auto 20px auto;
            padding: 15px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, auto));
        }
        div.buttons div.button-cell {
            position: relative;
        }
       div.buttons a button.body {
            width: 90%;
        }
        div.buttons a button.body:hover {
            width: 90%;
        }
        div.suggestions_container div.suggestions {
        	border: 1px solid #6C4E31;
        	border-radius: 8px;
        	width: 50%;
        	margin: 0px auto 30px auto;
        }
        div.suggestions_container div.suggestions h3 {
        	width: 100%;
        	border-top-left-radius: 7px;
        	border-top-right-radius: 7px;
        	background-color: #6C4E31;
        	margin: 0px;
        	line-height: 35px;
        	text-align: right;
        	color: white;
        }
        div.suggestions_container div.suggestions p {
        	padding: 0px 10px;
        }
        div.suggestions_container div.suggestions p.suggestion {
        	padding: 0px 10px;
        	text-indent: 50px; 
        }
        div.footer {
        	position: static;
        }
	</style>
</head>
<body>
	<div class="header"> 
       <table>
            <tr>
                <td> <a href="Crew-Homepage.php"> <p> Home </p> </a> </td>
                <td> <a style="cursor: pointer;" onclick="sidebar()"> <p> Crew Tools </p> </a> </td>
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
		<h1> Crew Tools </h1>
		<div class="list"> 
			<a href="Crew-Rating-and-Review.php?category=all"> View Ratings & Reviews </a> <br>
			<a href="Crew-Suggestions.php"> View Suggestions </a> <br> 
			<a href="Crew-Reports.php"> View Reports </a> <br>
		</div>
	</div>
    <h1> Gal's Cafe | Suggestions </h1>
	<div class="buttons">
        <a href="Crew-Suggestions.php?category=all"> <button class="body"> All Categories </button> </a>
        <a href="Crew-Suggestions.php?category=food"> <button class="body"> Food </button> </a>
        <a href="Crew-Suggestions.php?category=beverage"> <button class="body"> Beverage </button> </a>
        <a href="Crew-Suggestions.php?category=service"> <button class="body"> Service </button> </a>
    </div>
    <div class="suggestions_container"> 
    	<?php 
    	if (isset($_GET['category'])) {
	    	$i = 0;
	    	$category = $_GET['category']; 
	    	if ($category === "food") { ?>
    			<p style="width: 50%; margin: 0px auto 20px auto;"> <b> Total suggestions: </b> <?php echo $food_count ?> </p>
		    	<?php while($i < $food_count) { ?>
		    	<div class="suggestions"> 
		    		<h3> <?php echo "@", $f_username[$i], " | ", strstr($f_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($f_category[$i]) ?> </p>
		    		<p class="suggestion"> <?php echo $f_suggestion[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else if ($category === "beverage") {?>
    			<p style="width: 50%; margin: 0px auto 20px auto;"> <b> Total suggestions: </b> <?php echo $beverage_count ?> </p>
		    	<?php while($i < $beverage_count) { ?>
		    	<div class="suggestions"> 
		    		<h3> <?php echo "@", $b_username[$i], " | ", strstr($b_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($b_category[$i]) ?> </p>
		    		<p class="suggestion"> <?php echo $b_suggestion[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else if ($category === "service") {?>
    			<p style="width: 50%; margin: 0px auto 20px auto;"> <b> Total suggestions: </b> <?php echo $service_count ?> </p>
		    	<?php while($i < $service_count) { ?>
		    	<div class="suggestions"> 
		    		<h3> <?php echo "@", $s_username[$i], " | ", strstr($s_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($s_category[$i]) ?> </p>
		    		<p class="suggestion"> <?php echo $s_suggestion[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else {?>
    			<p style="width: 50%; margin: 0px auto 20px auto;"> <b> Total suggestions: </b> <?php echo $all_count ?> </p>
		    	<?php while($i < $all_count) { ?>
		    	<div class="suggestions"> 
		    		<h3> <?php echo "@", $a_username[$i], " | ", strstr($a_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($a_category[$i]) ?> </p>
		    		<p class="suggestion"> <?php echo $a_suggestion[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } 
    	} else { ?>
    			<p style="width: 50%; margin: 0px auto 20px auto;"> <b> Total suggestions: </b> <?php echo $all_count ?> </p>
		    <?php 
    		$i = 0;
	    	while($i < $all_count) { ?>
	    	<div class="suggestions"> 
		    	<h3> <?php echo "@", $a_username[$i], " | ", strstr($a_date_time[$i], ' ', true) ?> &nbsp </h3>
	    		<p> <b> Category: </b> <?php echo ucwords($a_category[$i]) ?> </p>
	    		<p class="suggestion"> <?php echo $a_suggestion[$i] ?> </p>
	    	</div>
	    	<?php 
	    	$i++;
	    	} 
    	} ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
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