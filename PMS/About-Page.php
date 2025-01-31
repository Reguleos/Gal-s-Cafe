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

          $description_sql = "SELECT * FROM `about`;"; 
          $description_result = mysqli_query($conn, $description_sql);
          while($row = mysqli_fetch_array($description_result)){
               $description_id[]   = $row['description_id'];
               $description[]      = $row['description'];
          }

          if (empty($description_id)==false) {
               $description_max    = max($description_id);
          } 
     }
?>
<!DOCTYPE html>
<html> 
     <head> 
          <title> Gal's Cafe | About Gal's Cafe </title>
          <meta charset="UTF-8">
          <link rel="icon" type="image/x-icon" href="Logo.ico">
          <link rel="stylesheet" type="text/css" href="Header-and-Footer.css">
          <link rel="stylesheet" type="text/css" href="Universal.css">
          <style type="text/css">
               div.logo {
                    margin-top: 50px;
                    padding: 50px 50px 0px 50px;
                    text-align: center;
               }
               div.logo h1 {
                    font-size: 30px;
               }
               div.body {
                    margin: 0px auto;
                    width: 70%;
                    text-align: justify;
                    text-indent: 50px;
                    display: block;
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
               <h1> About Gal's Cafe </h1>
          </div>
          <div class="body"> 
               <div class="paragraph">
                    <?php 
                    $i = 0;
                    while ($i < $description_max) { ?>
                         <p class="paragraph"> <?php echo $description[$i] ?> </p>
                    <?php 
                    $i++;
                    } ?>
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
</html>
<?php
}
else{
     header("Location: Log-In-Page.php");
     exit();
} ?>