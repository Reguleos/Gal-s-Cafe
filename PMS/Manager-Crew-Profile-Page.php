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
          $_SESSION['uname']            = $uname; 
          $_SESSION['first_name']       = $first_name; 
          $_SESSION['last_name']        = $last_name; 
          $_SESSION['role']             = $role;
          $_SESSION['birthday']         = $birthday; 
          $_SESSION['age']              = $age; 
          $_SESSION['sex']              = $sex; 
          $_SESSION['address']          = $address; 
          $_SESSION['e_mail']           = $e_mail; 
          $_SESSION['mobile_number']    = $mobile_number;
          
 ?>
<!DOCTYPE html>
<html>
<head>
     <title> Gal's Cafe | Profile </title>
     <link rel="icon" type="image/x-icon" href="Logo.ico">
     <link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
     <link rel="stylesheet" type="text/css" href="Sidebar.css">
     <link rel="stylesheet" type="text/css" href="Universal.css">
     <style type="text/css">
          * {
               font-family: sans-serif;
               color: #481E14;
          }
          html {
               height: auto;
               width: 100%;
               scroll-behavior: smooth;
               scrollbar-width: none;
          }
          body {
               background-color: #EEEEEE;
               background-attachment: fixed;
               margin: 0px;
          }
          div.body {
               width: 90%;
               margin: 0px 5% 0px 5%;
               top: 0;
               background-color: rgba(255, 255, 255, 0.2);
               text-align: center;
               display: grid;
               grid-template-columns: 50% 50%;
          }
          div.body div.message {
               width: 100%;
          }
          div.body div.message p.result {
               margin: 0px;
               font-size: 12px;
               text-align: center;
          }
          div.body h1 {
               margin: 90px auto 5px auto;
          }
          div.profile {
               margin-left: auto;
               margin-right: 0px;
               width: 90%;
               text-align: center;
               padding: 10px 0px;
               display: inline-block;
               position: relative;
          }
          div.profile h2 {
               font-family: sans-serif;
               font-weight: 800;
               margin-bottom: 10px;
               color: #481E14;
          }
          hr {
               height: 2px;
               background-color: #481E14;
               border: 0px;
               width: 80%;
               margin-bottom: 10px;
          }
          div.body p.label {
               width: 150px;
               font-size: 12px;
               text-align: left;
               margin-top: 7px;
               margin-bottom: 5px;
               margin-left: 12%;
               align-content: center;
          }
          div.body form input {
               width: 75%;
               height: 25px;
               border-radius: 8px;
               margin-bottom: 5px;
               border: 1px solid #481E14; 
               padding: 3px;
               color: #481E14;
               font-size: 14px;
               background-color: rgba(255, 255, 255, 0.1);
          }
          input[type="date"]::-webkit-calendar-picker-indicator {
               display: none;
          }
          div.body form input:focus {
               outline: none;
          }
          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
               -webkit-appearance: none;
               margin: 0;
          }
          input[type=number] {
               -moz-appearance: textfield;
          }
          div.profile div.name {
               grid-template-columns: repeat(auto-fit, minmax(145px, 1fr));
               display: grid;
               width: 76%;
               margin-left: 12%;
          }
          div.profile div.name div.namedivider {
               width: 100%;
          }
          div.profile div.name div.namedivider p.label {
               margin-left: 0%;
          }
          div.profile div.name div.namedivider input {
               width: 90%;
               height: 25px;
               border-radius: 8px;
               margin-bottom: 5px;
               border: 1px solid #481E14; 
               padding: 3px;
               color: #481E14;
               font-size: 14px;
          }
          div.profile div.bday-age-gender {
               grid-template-columns: 50% 25% 25%;
               grid-auto-rows: 1fr;
               display: grid;
               width: 76%;
               margin-left: 12%;
               box-sizing: border-box;
          }
          div.profile div.bday-age-gender div.bdaydivider {
               width: 100%;
          }
          div.profile div.bday-age-gender div.bdaydivider p.label {
               margin-left: 0%;
          }
          div.profile div.bday-age-gender div.bdaydivider input {
               width: 90%;
               height: 25px;
               border-radius: 8px;
               margin-bottom: 5px;
               border: 1px solid #481E14; 
               padding: 3px;
               color: #481E14;
               font-size: 14px;
          }
          div.profile div.bday-age-gender div.agdivider {
               width: 100%;
          }
          div.profile div.bday-age-gender div.agdivider p.label {
               margin-left: 0%;
               width: 60px;
          }
          div.profile div.bday-age-gender div.agdivider input {
               width: 80%;
               height: 25px;
               border-radius: 8px;
               margin-bottom: 5px;
               border: 1px solid #481E14; 
               padding: 3px;
               color: #481E14;
               font-size: 14px;
               float: right;
          }
          div.profile div.bday-age-gender div.agdivider select {
               width: 80%;
               height: 33px;
               border-radius: 8px;
               margin-bottom: 8px;
               border: 1px solid #481E14; 
               padding: 3px;
               color: #481E14;
               font-size: 14px;
               float: right;
          }
          div.password {
               margin-left: 0px;
               margin-right: auto;
               width: 90%;
               text-align: center;
               padding: 10px 0px;
               display: inline-block;
               position: relative;
               z-index: 1;
          }
          div.body a {
               color: #481E14;
               text-decoration: underline;
               text-decoration-style: dashed;
          }
          button.body {
               margin: 20px auto 0px auto;
          }
     </style>
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
     <div class="body"> 
          <div class="profile">
               <h1> Profile </h1>
               <?php if (isset($_GET['profile_result'])) { ?>
                    <div class="message"> 
                         <p class="result"> <?php echo $_GET['profile_result']; ?> </p>
                    </div>
               <?php } ?>
               <hr>
               <form action="Profile-Page-Actions.php" method="post">
                    <?php if($role === "Manager" || $role === "Crew") { ?>
                         <p class="label"> Username </p>
                         <input type="text" name="uname" placeholder="Enter username" value="<?php echo $uname ?>" disabled><br>
                    <?php } else { ?>
                         <?php if(isset($_GET['uname'])) { ?>
                              <p class="label"> Username </p>
                              <input type="text" name="uname" placeholder="Enter username" value="<?php echo $_GET['uname'] ?>" ><br>
                         <?php } else { ?>
                              <p class="label"> Username </p>
                              <input type="text" name="uname" placeholder="Enter username" value="<?php echo $uname ?>" ><br>
                         <?php } ?>
                    <?php } ?>
                    
                   <div class="name">
                         <div class="namedivider">
                              <?php if(isset($_GET['first_name'])) { ?>
                                   <p class="label"> First Name </p>
                                   <input type="text" name="first_name" placeholder="Enter first name" value="<?php echo $_GET['first_name'] ?>" style="float: left;"><br>
                              <?php } else { ?>
                                   <p class="label"> First Name </p>
                                   <input type="text" name="first_name" placeholder="Enter first name" value="<?php echo $first_name ?>" style="float: left;"><br>
                              <?php } ?>
                         </div>

                         <div class="namedivider">
                              <?php if(isset($_GET['last_name'])) { ?>
                                   <p class="label"> Last Name </p>
                                   <input type="text" name="last_name" placeholder="Enter last name" value="<?php echo $_GET['last_name'] ?>" style="float: right;"><br>
                              <?php } else { ?>
                                   <p class="label"> Last Name </p>
                                   <input type="text" name="last_name" placeholder="Enter last name" value="<?php echo $last_name ?>" style="float: right;"><br>
                              <?php } ?>
                        </div>
                    </div>

                    <div class="bday-age-gender">
                         <div class="bdaydivider">
                              <?php if(isset($_GET['birthday'])) { ?>
                                   <p class="label"> Birthday </p>
                                   <input type="date" name="birthday" value="<?php echo $_GET['birthday'] ?>" style="float: left;"><br>
                              <?php } else { ?>
                                   <p class="label"> Birthday </p>
                                   <input type="date" name="birthday" value="<?php echo $birthday ?>" style="float: left;"><br>
                              <?php } ?>
                         </div>

                         <div class="agdivider">
                              <?php if(isset($_GET['age'])) { ?>
                                   <p class="label" style="padding-left: 10px;"> Age </p>
                                   <input type="number" name="age" placeholder="Enter age" min="0" max="150" value="<?php echo $_GET['age'] ?>" ><br>
                              <?php } else { ?>
                                   <p class="label" style="padding-left: 10px;"> Age </p>
                                   <input type="number" name="age" placeholder="Enter age" min="0" max="150" value="<?php echo $age ?>" ><br>
                              <?php } ?>
                        </div>

                        <div class="agdivider">
                              <?php if(isset($_GET['sex'])) { ?>
                                   <p class="label" style="padding-left: 15px;"> Sex </p>
                                   <input type="text" name="sex" placeholder="Enter sex" value="<?php echo $_GET['sex'] ?>" style="float: right;"><br>
                              <?php } else { ?>
                                   <p class="label" style="padding-left: 15px;"> Sex </p>
                                   <input type="text" name="sex" placeholder="Enter sex" value="<?php echo $sex ?>" style="float: right;"><br>
                              <?php } ?>
                         </div>
                    </div>
                    <?php if(isset($_GET['address'])) { ?>
                         <p class="label"> Address </p>
                         <input type="text" name="address" placeholder="Enter address" value="<?php echo $_GET['address'] ?>" ><br>
                    <?php } else { ?>
                         <p class="label"> Address </p>
                         <input type="text" name="address" placeholder="Enter address" value="<?php echo $address ?>" ><br>
                    <?php } ?>

                    <?php if(isset($_GET['e_mail'])) { ?>
                         <p class="label"> E-mail Address </p>
                         <input type="email" name="e_mail" placeholder="Enter E-mail address" value="<?php echo $_GET['e_mail'] ?>" ><br>
                    <?php } else { ?>
                         <p class="label"> E-mail Address </p>
                         <input type="email" name="e_mail" placeholder="Enter E-mail address" value="<?php echo $e_mail ?>" ><br>
                    <?php } ?>
                         
                    <?php if(isset($_GET['mobile_number'])) { ?>
                         <p class="label"> Mobile Number </p>
                         <input type="number" name="mobile_number" placeholder="Enter mobile number" value="<?php echo $_GET['mobile_number'] ?>" ><br>
                    <?php } else { ?>
                         <p class="label"> Mobile Number </p>
                         <input type="number" name="mobile_number" placeholder="Enter mobile number" value="<?php echo $mobile_number ?>" ><br>
                    <?php } ?>

                    <button type="submit" class="body"> Save Changes </button>
               </form>
          </div>
          <div class="password">
               <h1> Change Password </h1>
               <?php if (isset($_GET['pass_result'])) { ?>
                    <div class="message"> 
                         <p class="result"> <?php echo $_GET['pass_result']; ?> </p>
                    </div>
               <?php } ?>
               <hr>
               <form action="Password-Actions.php" method="post">
                    <p class="label"> Enter current password </p>
                    <input type="password" name="verif_password" placeholder="Enter current password"> <br>
                    <p class="label"> Enter new password </p>
                    <input type="password" name="new_password" placeholder="Enter new password"> <br>
                    <p class="label"> Re-enter new password </p>
                    <input type="password" name="new_re_password" placeholder="Re-enter new password"> <br>
                    <button type="submit" class="body"> Save Changes </button>
               </form>
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