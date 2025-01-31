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
          <link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
          <link rel="stylesheet" type="text/css" href="Universal.css">
          <style type="text/css">
               div.logo {
                    margin-top: 50px;
                    padding: 50px;
                    text-align: center;
                    height: 450px;
               }
               @keyframes float {
                    0% {
                         margin-top: 70px;
                    }
                    100% {
                         margin-top: 50px;
                    }
               }
               div.logo div.animation {
                    animation: 1.5s infinite alternate float;
               }
               div.logo div.animation img.logo-content {
                    width: 350px;
                    height: 350px;
                    display: inline;
               }
               div.logo div.animation h1 {
                    font-size: 30px;
               }
               div.buttons {
                    border: 0px;
                    width: 80%;
                    margin: 0px auto;
                    padding: 15px;
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(220px, auto));
               }
               div.buttons div.button-cell {
                    position: relative;
               }
               button.body {
                    width: 90%;
               }
               button.body:hover {
                    width: 90%;
               }
          </style>
     </head>
     <body> 
          <div class="header"> 
               <table>
                    <tr>
                         <td> <a href="Customer-Homepage.php"> <p> Home </p> </a> </td>
                         <td > 
                              <div class="Records-Dropdown"> 
                                   <button class="Drop-Button"> Write </button>
                                        <div class ="Records"> 
                                             <a href="Customer-Rating-and-Review.php"> Rating and Review </a>
                                             <a href="Customer-Suggestion.php"> Suggestion </a>
                                             <a href="Customer-Report.php"> Report </a>
                                        </div>
                              </div>
                         </td>
                         <td> 
                              <div class="Records-Dropdown">
                                   <button class="Drop-Button"> Account </button>
                                   <div class="Records">
                                        <a href="Customer-Profile-Page.php"> Profile </a>
                                        <a href="Logout-Function.php"> Log Out</a>
                                   </div>
                              </div>
                         </td>
                         <td> 
                              <a href="About-Page.php"> <p> About Gal's Cafe </p> </a>
                         </td> 
                    </tr>
               </table>
          </div>
          <div class="logo"> 
               <div class="animation"> 
                    <img class="logo-content" src="Logo.png">
                    <h1> SpendSmartly Corporation </h1>
               </div>
          </div>
          <div class="buttons">
               <a href="Customer-Rating-and-Review.php"> <button class="body"> Write a Rating & Review </button> </a>
               <a href="Customer-Suggestion.php"> <button class="body"> Write a Suggestion </button> </a>
               <a href="Customer-Report.php"> <button class="body"> Write a Report </button> </a>
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
<?php
}
else{
     header("Location: Log-In-Page.php");
     exit();
}?>