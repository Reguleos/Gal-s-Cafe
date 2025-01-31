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
          $suggestions_sql = "SELECT * FROM `suggestions` WHERE `account_id`=$account_id;"; 
          $suggestions_result = mysqli_query($conn, $suggestions_sql);
          while($row = mysqli_fetch_array($result)){
               $suggestion    = $row['suggestion'];
          }
     }
?>
<!DOCTYPE html>
<html> 
     <head> 
          <title> Gal's Cafe | Suggestion </title>
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
               div.buttons {
                    border: 0px;
                    width: 80%;
                    margin: 0px auto 20px auto;
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
               div.form {
                    width: 35%;
                    border: 1px solid #012401;
                    border-radius: 8px;
                    padding: 15px;
                    margin: 0px auto 80px auto;
               }
               div.form p.message {
                    text-align: center;
                    margin: 5px;
               }
               div.form p.label {
                    margin-bottom: 5px;
                    font-weight: bold;
               }
               div.form div.input {
                    text-align: center;
               }
               div.form label.numbers {
                    margin: 0px 7px;
               }
               div.form textarea {
                    width: 97%;
                    height: 100px;
                    vertical-align: top;
                    resize: none;
                    border: 1px solid #012401;
                    border-radius: 8px;
                    background-color: rgba(0, 0, 0, 0);
                    padding: 5px;
                    outline: none;
                    display: block;
               }
               div.form button.submit {
                    margin: 20px auto 10px auto;
               }
               div.form button.submit:hover {
                    margin: 20px auto 10px auto;
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
               <h1> Gal's Cafe | Suggestion </h1>
          </div>
          <div class="buttons">
               <a href="Customer-Rating-and-Review.php"> <button class="body"> Write a Rating & Review </button> </a>
               <a href="Customer-Suggestion.php"> <button class="body"> Write a Suggestion </button> </a>
               <a href="Customer-Report.php"> <button class="body"> Write a Report </button> </a>
          </div>
          <div class="form">
               <?php if (isset($_GET['message'])) { ?>
                    <div class="message"> 
                         <p class="message"> <?php echo $_GET['message']; ?> </p>
                    </div>
               <?php } ?>
               <form action="Customer-Suggestion-Action.php" method="post" id="sugg"> 
                    <p class="label"> Suggestion for: </p>

                    <?php if (isset($_GET['category'])) {
                         $category = $_GET['category'];
                         if ($category=='food') { ?>
                              <div class="input">
                                   <input type="radio" value="food" name="category" checked>
                                   <label for="food"> Food </label>
                                   <input type="radio" value="beverage" name="category">
                                   <label for="beverage"> Beverage </label>
                                   <input type="radio" value="service" name="category">
                                   <label for="service"> Service </label>
                              </div>
                    <?php } else if ($category=='beverage') { ?>
                              <div class="input">
                                   <input type="radio" value="food" name="category">
                                   <label for="food"> Food </label>
                                   <input type="radio" value="beverage" name="category" checked>
                                   <label for="beverage"> Beverage </label>
                                   <input type="radio" value="service" name="category">
                                   <label for="service"> Service </label>
                              </div>
                    <?php } else if ($category=='service') { ?>
                              <div class="input">
                                   <input type="radio" value="food" name="category">
                                   <label for="food"> Food </label>
                                   <input type="radio" value="beverage" name="category">
                                   <label for="beverage"> Beverage </label>
                                   <input type="radio" value="service" name="category" checked>
                                   <label for="service"> Service </label>
                              </div>
                    <?php } else { ?>
                              <div class="input">
                                   <input type="radio" value="food" name="category">
                                   <label for="food"> Food </label>
                                   <input type="radio" value="beverage" name="category">
                                   <label for="beverage"> Beverage </label>
                                   <input type="radio" value="service" name="category">
                                   <label for="service"> Service </label>
                              </div>
                    <?php }
                    } else { ?> 
                         <div class="input">
                              <input type="radio" value="food" name="category">
                              <label for="food"> Food </label>
                              <input type="radio" value="beverage" name="category">
                              <label for="beverage"> Beverage </label>
                              <input type="radio" value="service" name="category">
                              <label for="service"> Service </label>
                         </div>
                    <?php } ?>

                    <p class="label"> Suggestion: </p>
                    <?php if (isset($_GET['suggestion'])) { 
                         $suggestion = $_GET['suggestion']; ?>
                         <textarea form="sugg" name="suggestion" placeholder="Enter suggestion here..."><?php echo $suggestion ?></textarea>
                    <?php } else { ?>
                         <textarea form="sugg" name="suggestion" placeholder="Enter suggestion here..."></textarea>
                    <?php } ?>
                    <button type="submit" class="body submit"> Submit </button>
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
<?php
}
else{
     header("Location: Log-In-Page.php");
     exit();
} ?>