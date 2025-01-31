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
     $report = validate($_POST['report']); 

     if (!$conn) {
          echo "Connection failed!";
     }
     else{
          if (empty($category)!==false || empty($report)!==false) {
               header("Location: Customer-Report.php?message=All fields are required.&category=$category&report=$report");
          }
          else {
               $sql = "INSERT INTO `reports`(`account_id`, `category`, `report`) 
               VALUES('$account_id', '$category', '$report');";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    header("Location: Customer-Report.php?message=Your report has been sent to the management. Thank you!");
                    exit();
               }
               else {
                    header("Location: Customer-Report.php?message=An error occured. Please try again.");
                    exit();
               }
          }
     }
}
?>

