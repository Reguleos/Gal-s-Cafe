<?php 
session_start();

if (isset($_SESSION['account_id']) && isset($_SESSION['username'])) {

     $account_id = $_SESSION['account_id']; 
     
     $sname = "localhost";
     $uname = "root";
     $password = "";
     $db_name = "pms_db";

     $conn = mysqli_connect($sname, $uname, $password, $db_name);

     
     function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }

     $category = validate($_POST['category']); 
     $suggestion = validate($_POST['suggestion']); 

     if (!$conn) {
          echo "Connection failed!";
     }
     else{
          if (empty($category)!==false || empty($suggestion)!==false) {
               header("Location: Customer-Suggestion.php?message=All fields are required.&category=$category&suggestion=$suggestion");
          }
          else {
               $sql = "INSERT INTO `suggestions`(`account_id`, `category`, `suggestion`) 
               VALUES('$account_id', '$category', '$suggestion');";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    header("Location: Customer-Suggestion.php?message=Your suggestion has been sent to the management. Thank you!");
                    exit();
               }
               else {
                    header("Location: Customer-Suggestion.php?message=An error occured. Please try again.");
                    exit();
               }
          }
     }
}
?>

