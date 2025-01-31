<!DOCTYPE html>
<html>
<head>
	<title> Gal's Cafe | Log In </title>
	<link rel="icon" type="image/x-icon" href="Logo.ico">
	<link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
	<link rel="stylesheet" type="text/css" href="Universal.css">
	<style type="text/css">
		html {
			height: 100%;
			width: 100%;
			scrollbar-width: none;
		}
		body {
			background-color: #EEEEEE;
			background-size: contain;
			animation: 4s infinite alternate float;
			margin: 0;
		}
		div.background-2 {
			background-size: contain;
			background-repeat: no-repeat;
			animation: 3s infinite alternate-reverse float;
			height: 660px;
			width: 100%;
			position: relative;
			margin: 0;
			bottom: 0;
		}
		section.divider {
			grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
			display: grid;
			width: 70%;
			height: 600px;
			margin-top: 5%;
			margin-left: 15%;
			margin-right: 15%;
			border-bottom: 10.8% solid rgba(0, 0, 0, 0);
			background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)) , url("Papers.png");
			background-repeat: repeat;
			background-size: auto 600px;
			box-shadow: 5px 5px 10px rgba(0, 0, 0, .2);
			
		}
		div.image-holder {
			width: 100%;
		}
		div.image-holder h1 {
			font-size: 45px;
			margin: 180px 10% 15px 10%;
		}
		div.image-holder p.slogan {
			margin: 0px 10%;
		}
		div.login {
			background-color: #FAEED1;
			width: 100%;
			text-align: center;
			padding: 60px 0px;
		}
		div.login h1 {
			margin-bottom: 10px;
		}
		hr {
			height: 2px;
			background-color: #6C4E31;
			border: 0px;
			width: 80%;
			margin-bottom: 10px;
		}
		div.login p.error {
			margin: 0px 12%;
			font-size: 12px;
			color: #CD1818;
		}
		div.login p.success {
			margin: 0px 12%;
			font-size: 12px;
		}
		div.login p.label {
			width: 150px;
			font-size: 12px;
			text-align: left;
			margin-bottom: 5px;
			margin-left: 12%;
			align-content: center;
		}
		div.login select {
			width: 110px;
			height: 25px;
			background-color: rgba(0, 0, 0, 0);
			outline: none;
			border-radius: 8px;
			border: 1px solid #012401;
			padding: 5px;
		}
		div.login input {
			width: 75%;
			height: 25px;
			border-radius: 8px;
			border: 1px solid #012401; 
			padding: 3px;
			font-size: 14px;
			background-color: rgba(255, 255, 255, 0.5);
			outline: none;
		}
		div.login a {
			text-decoration: none;
		}
		div.login a:hover {
            text-shadow: 0 0 1px #012401;
            transition: 0.3s;
		}
		button.body {
			margin: 20px auto;
		}
	</style>
</head>
<body>
	<div class="background-2">
		     <form action="Login-Actions.php" method="post">
		     	<section class="divider">
		     		<div class="image-holder">
		     			<h1> Welcome to Gal's Cafe! </h1>
		     			<hr>
		     			<p class="slogan"> Taste the Blend of Comfort and Flavor. </p>
		     		</div>
		     		<div class="login">
				     	<h1> Log In </h1>
				     	<hr>
				     	<?php if (isset($_GET['error'])) { ?>
				     		<p class="error"> <?php echo $_GET['error']; ?> </p>
				     	<?php } ?>
				     	<?php if (isset($_GET['success'])) { ?>
     						<p class="success"> <?php echo $_GET['success']; ?> </p>
     					<?php } ?>
				     	<p class="label"> Username </p>
				     	<input type="text" name="uname" placeholder="Enter username"><br>

				     	<p class="label"> Password </p>
				     	<input type="password" name="password" placeholder="Enter password"><br>

				     	<a> <button type="submit" class="body"> Log In </button> </a>
				     	<p> Don't have an account? <a href="Sign-Up-Page.php"> Register. </a> </p>
			     	</div>
		     	</section>
		     </form>
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
</html>