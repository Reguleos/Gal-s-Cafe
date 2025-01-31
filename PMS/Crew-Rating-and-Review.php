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

            $all_review_sql = "SELECT `rating_and_reviews`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `rating_and_reviews`.`category`, 
            						  `rating_and_reviews`.`rating`, 
            						  `rating_and_reviews`.`review`,
            						  `rating_and_reviews`.`date_time`
            					FROM `rating_and_reviews` LEFT JOIN `accounts` 
            					ON `rating_and_reviews`.`account_id` = `accounts`.`account_id` 
            					ORDER BY `rating_and_reviews`.`date_time`; ";
            $all_review_result = mysqli_query($conn, $all_review_sql);
            while($row = mysqli_fetch_array($all_review_result)){
                $a_rnr_account_id[]	= $row['account_id']; 
                $a_username[] 		= $row['username'];
                $a_first_name[] 	= $row['first_name'];
                $a_last_name[] 		= $row['last_name'];
                $a_category[]     	= $row['category'];
                $a_rating[]       	= $row['rating'];
                $a_review[]       	= $row['review'];
                $a_date_time[] 		= $row['date_time'];
            }

            $all_average = round(array_sum($a_rating)/count($a_rating), 2);
            $all_count = count($a_rating);

            $food_review_sql = "SELECT `rating_and_reviews`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `rating_and_reviews`.`category`, 
            						  `rating_and_reviews`.`rating`, 
            						  `rating_and_reviews`.`review`,
            						  `rating_and_reviews`.`date_time`
            					FROM `rating_and_reviews` LEFT JOIN `accounts` 
            					ON `rating_and_reviews`.`account_id` = `accounts`.`account_id` 
            					WHERE `rating_and_reviews`.`category`='food'
            					ORDER BY `rating_and_reviews`.`date_time`;";
            $food_review_result = mysqli_query($conn, $food_review_sql);
            while($row = mysqli_fetch_array($food_review_result)){
                $f_rnr_account_id[]	= $row['account_id']; 
                $f_username[] 		= $row['username'];
                $f_first_name[] 	= $row['first_name'];
                $f_last_name[] 		= $row['last_name'];
                $f_category[]     	= $row['category'];
                $f_rating[]       	= $row['rating'];
                $f_review[]       	= $row['review'];
                $f_date_time[] 		= $row['date_time'];
            }

            $food_average = round(array_sum($f_rating)/count($f_rating), 2);
            $food_count = count($f_rating);

            $beverage_review_sql = "SELECT `rating_and_reviews`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `rating_and_reviews`.`category`, 
            						  `rating_and_reviews`.`rating`, 
            						  `rating_and_reviews`.`review`, 
            						  `rating_and_reviews`.`date_time`
            					FROM `rating_and_reviews` LEFT JOIN `accounts` 
            					ON `rating_and_reviews`.`account_id` = `accounts`.`account_id` 
            					WHERE `rating_and_reviews`.`category`='beverage'
            					ORDER BY `rating_and_reviews`.`date_time`;";
            $beverage_review_result = mysqli_query($conn, $beverage_review_sql);
            while($row = mysqli_fetch_array($beverage_review_result)){
                $b_rnr_account_id[]	= $row['account_id']; 
                $b_username[] 		= $row['username'];
                $b_first_name[] 	= $row['first_name'];
                $b_last_name[] 		= $row['last_name'];
                $b_category[]     	= $row['category'];
                $b_rating[]       	= $row['rating'];
                $b_review[]       	= $row['review'];
                $b_date_time[] 		= $row['date_time'];
            }

            $beverage_average = round(array_sum($b_rating)/count($b_rating), 2);
            $beverage_count = count($b_rating);

            $service_review_sql = "SELECT `rating_and_reviews`.`account_id`, 
            						  `accounts`.`username`, 
            						  `accounts`.`first_name`, 
            						  `accounts`.`last_name`, 
            						  `rating_and_reviews`.`category`, 
            						  `rating_and_reviews`.`rating`, 
            						  `rating_and_reviews`.`review`,
            						  `rating_and_reviews`.`date_time`
            					FROM `rating_and_reviews` LEFT JOIN `accounts` 
            					ON `rating_and_reviews`.`account_id` = `accounts`.`account_id` 
            					WHERE `rating_and_reviews`.`category`='service'
            					ORDER BY `rating_and_reviews`.`date_time`;";
            $service_review_result = mysqli_query($conn, $service_review_sql);
            while($row = mysqli_fetch_array($service_review_result)){
                $s_rnr_account_id[]	= $row['account_id']; 
                $s_username[] 		= $row['username'];
                $s_first_name[] 	= $row['first_name'];
                $s_last_name[] 		= $row['last_name'];
                $s_category[]     	= $row['category'];
                $s_rating[]       	= $row['rating'];
                $s_review[]       	= $row['review'];
                $s_date_time[] 		= $row['date_time'];
            }

            $service_average = round(array_sum($s_rating)/count($s_rating), 2);
            $service_count = count($s_rating);
        }


?>
<!DOCTYPE html>
<html>
<head>
	<title> Gal's Cafe | Ratings and Reviews </title>
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
        div.reviews_container div.reviews {
        	border: 1px solid #6C4E31;
        	border-radius: 8px;
        	width: 50%;
        	margin: 0px auto 30px auto;
        }
        div.reviews_container div.reviews h3 {
        	width: 100%;
        	border-top-left-radius: 7px;
        	border-top-right-radius: 7px;
        	background-color: #6C4E31;
        	margin: 0px;
        	line-height: 35px;
        	text-align: right;
        	color: white;
        }
        div.reviews_container div.reviews p {
        	padding: 0px 10px;
        }
        div.reviews_container div.reviews p.review {
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
    <h1> Gal's Cafe | Rate and Review </h1>
	<div class="content"> 
		<div class="subcontent"> 
			<h2> Food </h2> <br>
			<canvas id="foodchart"> </canvas>
			<div class="description"> 
				<b> <?php echo $food_average ?> </b>
				<p> Total reviews: <?php echo $food_count ?> </p>
			</div>
			<hr>
		</div>
		<div class="subcontent">
			<h2> Beverage </h2> <br>
			<canvas id="beveragechart"> </canvas>
			<div class="description"> 
				<b> <?php echo $beverage_average ?> </b>
				<p> Total reviews: <?php echo $beverage_count ?> </p>
			</div>
			<hr>
		</div>
		<div class="subcontent">
		<h2> Service </h2> <br>
			<canvas id="servicechart"> </canvas>
			<div class="description"> 
				<b> <?php echo $service_average ?> </b>
				<p> Total reviews:  <?php echo $service_count ?> </p>
			</div>
			<hr>
		</div>
	</div>
	<div class="buttons">
        <a href="Crew-Rating-and-Review.php?category=all"> <button class="body"> All Categories </button> </a>
        <a href="Crew-Rating-and-Review.php?category=food"> <button class="body"> Food </button> </a>
        <a href="Crew-Rating-and-Review.php?category=beverage"> <button class="body"> Beverage </button> </a>
        <a href="Crew-Rating-and-Review.php?category=service"> <button class="body"> Service </button> </a>
    </div>
    <div class="reviews_container"> 
    	<?php 
    	if (isset($_GET['category'])) {
	    	$i = 0;
	    	$category = $_GET['category']; 
	    	if ($category === "food") {
		    	while($i < $food_count) { ?>
		    	<div class="reviews"> 
		    		<h3> <?php echo "@", $f_username[$i], " | ", strstr($f_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($f_category[$i]) ?> </p>
		    		<p> <b> Rating: </b> <?php echo $f_rating[$i] ?> </p>
		    		<p class="review"> <?php echo $f_review[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else if ($category === "beverage") {
		    	while($i < $beverage_count) { ?>
		    	<div class="reviews"> 
		    		<h3> <?php echo "@", $b_username[$i], " | ", strstr($b_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($b_category[$i]) ?> </p>
		    		<p> <b> Rating: </b> <?php echo $b_rating[$i] ?> </p>
		    		<p class="review"> <?php echo $b_review[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else if ($category === "service") {
		    	while($i < $service_count) { ?>
		    	<div class="reviews"> 
		    		<h3> <?php echo "@", $s_username[$i], " | ", strstr($s_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($s_category[$i]) ?> </p>
		    		<p> <b> Rating: </b> <?php echo $s_rating[$i] ?> </p>
		    		<p class="review"> <?php echo $s_review[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } else {
		    	while($i < $all_count) { ?>
		    	<div class="reviews"> 
		    		<h3> <?php echo "@", $a_username[$i], " | ", strstr($a_date_time[$i], ' ', true) ?> &nbsp </h3>
		    		<p> <b> Category: </b> <?php echo ucwords($a_category[$i]) ?> </p>
		    		<p> <b> Rating: </b> <?php echo $a_rating[$i] ?> </p>
		    		<p class="review"> <?php echo $a_review[$i] ?> </p>
		    	</div>
		    	<?php 
		    	$i++;
		    	} 
		    } 
    	} else {
    		$i = 0;
	    	while($i < $all_count) { ?>
	    	<div class="reviews"> 
		    		<h3> <?php echo "@", $a_username[$i], " | ", strstr($a_date_time[$i], ' ', true) ?> &nbsp </h3>
	    		<p> <b> Category: </b> <?php echo ucwords($a_category[$i]) ?> </p>
	    		<p> <b> Rating: </b> <?php echo $a_rating[$i] ?> </p>
	    		<p class="review"> <?php echo $a_review[$i] ?> </p>
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
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
<script type="text/javascript">

	function sidebar() {
		if (document.getElementById("sidebar").style.width === "0px") {
			document.getElementById("sidebar").style.width = "300px";
		} else {
			document.getElementById("sidebar").style.width = "0px";
		}
	}

	var chrt = document.getElementById("foodchart").getContext("2d");
  	var foodchart = new Chart(chrt, {
     	type: 'doughnut',
     	data: {
            datasets: [{
	            label: "online tutorial subjects",
	            data: [<?php echo $food_average ?>, 5-<?php echo $food_average ?>],
	            backgroundColor: ['#6C4E31', 'rgba(0, 0, 0, 0)'],
	            borderWidth: 1,
	            borderColor: "#6C4E31",
            }],
     	},
     	options: {
        	responsive: false,
        	plugins: {
        		tooltip: {
        			enabled: false
        		}
        	}
     	},
  	});

    var chrt = document.getElementById("beveragechart").getContext("2d");
  	var beveragechart = new Chart(chrt, {
     	type: 'doughnut',
     	data: {
            datasets: [{
	            label: "online tutorial subjects",
	            data: [<?php echo $beverage_average ?>, 5-<?php echo $beverage_average ?>],
	            backgroundColor: ['#6C4E31', 'rgba(0, 0, 0, 0)'],
	            borderWidth: 1,
	            borderColor: "#6C4E31",
            }],
     	},
     	options: {
        	responsive: false,
        	plugins: {
        		tooltip: {
        			enabled: false
        		}
        	}
     	},
  	});

  	var chrt = document.getElementById("servicechart").getContext("2d");
  	var servicechart = new Chart(chrt, {
     	type: 'doughnut',
     	data: {
            datasets: [{
	            label: "online tutorial subjects",
	            data: [<?php echo $service_average ?>, 5-<?php echo $service_average ?>],
	            backgroundColor: ['#6C4E31', 'rgba(0, 0, 0, 0)'],
	            borderWidth: 1,
	            borderColor: "#6C4E31",
            }],
     	},
     	options: {
        	responsive: false,
        	plugins: {
        		tooltip: {
        			enabled: false
        		}
        	}
     	},
  	});

</script>
</html>
<?php
}
else{
     header("Location: Log-In-Page.php");
     exit();
}?>