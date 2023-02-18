<?php
$id = rand();
?>
<?php
session_start();
include "connetion.php";
$conn->begin_transaction();
try {

  if(isset($_POST['flagSaveReview'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $number = $_POST["number"];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];

    $id = '';

    $sql1 = "SELECT id FROM userReview ORDER BY id DESC LIMIT 1;";
    // echo $sql1;
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
        $id = $row['id']+1;
      }
    }else{
      $id=1;
    }

    $reviewType="CONTACT";

    $sql = "INSERT INTO userReview VALUES('$id','$name','$email','$message','$number','$state','$pincode','','$reviewType');";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    echo "true";
    $conn->commit();
  }
  else if (isset($_POST['secreateCode'])) {
    $orderId = '';

    $sql1 = "SELECT * FROM allKeyValue WHERE keyName='orderId';";
    // echo $sql1;
    $result = mysqli_query($conn, $sql1);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $orderId = $row['keyValue'];
      }
    }

    $dishname = $_POST["dishname"];
    $price1 = $_POST["price1"];
    $userName = $_POST["userName"];
    $userAddress = $_POST["userAddress"];
    $userNumber = $_POST["userNumber"];
    $secreateCode = $_POST["secreateCode"];
    $userId = $_SESSION["userId"];
    date_default_timezone_set('Asia/Kolkata');
    $orderDate = date('d-m-Y::h:i:sa');
    $sql = "INSERT INTO `orderList` VALUES('$userId','$orderId','$dishname','$userName','$userNumber','$secreateCode','$price1','$userAddress','PENDING','$orderDate','');";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    $sql1 = "UPDATE allKeyValue SET keyValue=keyValue+1 WHERE keyName='orderId';";
    // echo $sql1;
    $result = mysqli_query($conn, $sql1);
    echo $dishname.':::'.$price1.':::'.$orderDate.':::';

    // $userEmail = $_SESSION["email"];

    // $to_email ='adarshmishra812003@gmail.com';
    // //live
    // $subject = 'Congratulation .. Your order is Submited .';
    // $message = 'Order Detail 
    //          Name:  ' . $userName . '
    //          Mob No : ' . $userNumber . '
    //          Dish Name : ' . $dishname . '
    //          Dish Price : ' . $price1 . '
    //          Address : ' . $userAddress . '';
    // // echo $to_email, $subject, $message;
    // $headers .= "Reply-To: Adarsh Mishra <no-reply@getmyfood.com>\r\n";
    // $headers .= "Return-Path: Adarsh Mishra <no-reply@getmyfood.com>\r\n";
    // $headers .= "From: Adarsh Mishra <no-reply@getmyfood.com>\r\n";
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    // $headers .= "X-Priority: 3\r\n";
    // $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
    // mail($to_email, $subject, $message,$header);
    //   echo "This email is sent using PHP Mail";
    // header('Location: ' . $page);
    // die();


    $conn->commit();
  } else  if (isset($_POST['flag'])) {
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $number = $_POST["number"];
    $page = $_POST["page"];
    $id = '';

    $sql1 = "SELECT * FROM allKeyValue WHERE keyName='userId';";
    echo $sql1;
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
        $id = $row['keyValue'];
      }
    }
    $sql = "INSERT INTO userAccount VALUES('$id','$name','$email','$address','$pass','$number');";
    echo $sql;
    //  $conn->query($sql);
    $result = mysqli_query($conn, $sql);

    $sql2 = "UPDATE allKeyValue SET keyValue=keyValue+1 WHERE keyName='userId';";
    echo $sql2;
    $result2 = mysqli_query($conn, $sql2);

    // $to_email = 'adarshmishra812003@gmail.com';
    // //live
    // $subject = 'Congratulation .. New User Create on Get My Food Website .';
    // $message = 'Name:  ' . $name . '
    //    Email ID : ' . $email . '
    //     Address : ' . $address . '';
    // echo $to_email, $subject, $message;
   
    // mail($to_email, $subject, $message);
    $conn->commit();
  }
} catch (mysqli_sql_exception $exception) {
  $conn->rollback();

  throw $exception;
}
$conn = null;
?>