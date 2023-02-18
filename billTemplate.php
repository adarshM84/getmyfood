<?php
session_start();
require "connetion.php";
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] ==2) {
        // header("Location:loginmessage.php");
        // exit;
    } else {
        header("Location:loginmessage.php");
        exit;
    }
} else {
    header("Location:loginmessage.php");
    exit;
}

$name = $_SESSION["userName"];
$email = $_SESSION["email"];
$pass = $_SESSION["pass"];
$allDataArray = '';
if (isset($_POST["data"])) {
    $allDataArray = explode(":::", $_POST["data"]);;
} 
print_r($allDataArray);

$sql = "SELECT * FROM userAccount WHERE userEmail='" . $email . "' AND userPassword='" . $pass . "';";
// echo $sql;
$result = $conn->query($sql);
$firstrow;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $firstrow = $row;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Bill Template</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div id="invoice">
        <!-- bill formate -->
        <div>
            <div class='recieptHeaderBottom' style='margin-left: 20%;margin-right: 20%;'><img src="images/logoimage.png" style="width: 10%;" alt="">
                <h1>Thank You For Your Order</h1>
                <p>Dear Customer,</p>
                <p>Details of your orderr are given below</p>
            </div>
            <div id="receiptBody" style='margin-left: 20%;margin-right: 20%;'>
                <hr style='border: 1px solid black;'>
                <!-- Name -->
                <span style='font-size: 30px;'>Name</span> <span  id='userName' style='margin-left: 35%;font-size: 25px;font-weight: bold;'><?php echo  $name;?></span>
                <hr style='border: 1px solid black;'>
                 <!-- Mob No -->
                 <span style='font-size: 30px;'>Mob No</span> <span  id='userMobNo' style='margin-left: 28%;font-size: 25px;font-weight: bold;'><?php echo  $firstrow['userNumber'];?></span>
                 <hr style='border: 1px solid black;'>
                 <!-- Date And Time -->
                 <span style='font-size: 30px;'>Date And Time</span> <span  id='userOrderData' style='margin-left: 9%;font-size: 25px;font-weight: bold;'><?php echo $allDataArray[2];?></span>
                 <hr style='border: 1px solid black;'>
                 <!-- Dish Name -->
                 <span style='font-size: 30px;'>Dish Name</span> <span  id='userDishName' style='margin-left: 21%;font-size: 25px;font-weight: bold;'><?php echo $allDataArray[0];?></span>
                 <hr style='border: 1px solid black;'>
                 <!-- Dish Price -->
                 <span style='font-size: 30px;'>Dish Price</span> <span  id='userDishPrice' style='margin-left: 26%;font-size: 25px;font-weight: bold;'><?php echo $allDataArray[1];?>₹</span>
                 <hr style='border: 1px solid black;'>
                 <!-- Payment Status -->
                 <span style='font-size: 30px;'>Payment Status</span> <span  id='userPaymentStatus' style='margin-left: 9%;font-size: 25px;font-weight: bold;'>PENDING</span>
                 <hr style='border: 1px solid black;'>
                 <p style="margin-top:10px;text-align:center;font-weight: bold;">This Is Computer Generated Bill.</p>
                 <hr style='border: 1px solid black;'>
            </div>
        </div>
        <!-- bill end -->
    </div>
    <button class='btn btn-primary;text-align:center;' id='generateBill' onclick="generatePDF()">DOWNLOAD</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        document.getElementById('generateBill').click();
        //   window.location.href='order.php';
    </script>
</body>

</html>