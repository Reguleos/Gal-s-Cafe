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
     $rating = validate($_POST['rating']); 
     $review = validate($_POST['review']); 

     if (!$conn) {
          echo "Connection failed!";
     }
     else{
          if (empty($category)!==false || empty($rating)!==false || empty($review)!==false) {
               header("Location: Customer-Rating-and-Review.php?message=All fields are required.&category=$category&rating=$rating&review=$review");
          }
          else {
               $sql = "INSERT INTO `rating_and_reviews`(`account_id`, `category`, `rating`, `review`) 
               VALUES('$account_id', '$category', '$rating', '$review');";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    header("Location: Customer-Rating-and-Review.php?message=Your rating and review has been sent to the management. Thank you!");
                    exit();
               }
               else {
                    header("Location: Customer-Rating-and-Review.php?message=An error occured. Please try again.");
                    exit();
               }
          }
     }
}
?>

