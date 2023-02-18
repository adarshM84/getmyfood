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
$dishname = "";
if (isset($_GET["name"])) {
    $dishname = $_GET["name"];
} else {
    header("Location:index.php");
    exit;
}
$email = $_SESSION["email"];
$pass = $_SESSION["pass"];

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

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v=<?php echo rand(); ?>">
    <link rel="shortcut icon" href="images/fevicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Order Page - Get Our Food</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <h1 class="text-center" style="color:orange">

            Order Detail
        </h1>
        <hr>
        <!-- <div class="container text-center"> -->
        <div class="row">
            <div class="col-md-4">
                <label for="dishname" class="form-label">Dishname</label> <input type="text" class="form-control" id="dishname" aria-describedby="emailHelp" value="<?php echo $dishname; ?>" disabled>
            </div>
            <div class=" col-md-4 mb-3">
                <label for="name1" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name1" value="<?php echo $firstrow['userName']; ?>" placeholder="Enter Your Name" disabled>
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" value="40" id="price" disabled>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="code" class="form-label">Secreate Code</label>
                <input type="number" class="form-control" id="code" placeholder="Code is ask  for verification.">
            </div>
            <div class="col-md-6">
                <label for="number1" class="form-label">Mobile No</label>
                <input type="number" class="form-control" id="number1" value="<?php echo $firstrow['userNumber']; ?>" placeholder="Enter Your Mobile No." disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="address1">Address</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Enter Your Address." id="address1" style="height: 100px;" disabled><?php echo $firstrow['userAddress']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center text-danger">
            <p class="errormessage" id="errormessage">

            </p>
        </div>
        <div class="col-md-12 text-center text-success">
            <p class="successMessage" id="successMessage">

            </p>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" id="saveOrder" class="btn btn-warning" onclick="saveorder1()">Order</button>
                <a class="btn btn-danger" style="margin-left: 23px;" href="index.php">Cancel</a>
            </div>
        </div>


        <!-- </div> -->

    </div>
    <!-- bill -->
    <div hidden>
        <div id="invoice" style="background: white;color:black;">
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
                    <span style='font-size: 30px;'>Name</span> <span id='userName' style='margin-left: 35%;font-size: 25px;font-weight: bold;'><?php echo  $name; ?></span>
                    <hr style='border: 1px solid black;'>
                    <!-- Mob No -->
                    <span style='font-size: 30px;'>Mob No</span> <span id='userMobNo' style='margin-left: 28%;font-size: 25px;font-weight: bold;'><?php echo  $firstrow['userNumber']; ?></span>
                    <hr style='border: 1px solid black;'>
                    <!-- Date And Time -->
                    <span style='font-size: 30px;'>Date </span> <span id='userOrderData' style='margin-left: 19%;font-size: 25px;font-weight: bold;'></span>
                    <hr style='border: 1px solid black;'>
                    <!-- Dish Name -->
                    <span style='font-size: 30px;'>Dish Name</span> <span id='userDishName' style='margin-left: 21%;font-size: 25px;font-weight: bold;'></span>
                    <hr style='border: 1px solid black;'>
                    <!-- Dish Price -->
                    <span style='font-size: 30px;'>Dish Price</span> <span id='userDishPrice' style='margin-left: 26%;font-size: 25px;font-weight: bold;'></span>
                    <hr style='border: 1px solid black;'>
                    <!-- Payment Status -->
                    <span style='font-size: 30px;'>Payment Status</span> <span id='userPaymentStatus' style='margin-left: 9%;font-size: 25px;font-weight: bold;'>PENDING</span>
                    <hr style='border: 1px solid black;'>
                    <p style="margin-top:10px;text-align:center;font-weight: bold;">This Is Computer Generated Bill.</p>
                    <hr style='border: 1px solid black;'>
                </div>
            </div>
            <!-- bill end -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function saveorder1() {
            // console.log('enter');
            let userName = document.getElementById("name1").value;
            let userAddress = document.getElementById("address1").value;
            let userNumber = document.getElementById("number1").value;
            let secreateCode = document.getElementById("code").value;
            let dishname = document.getElementById("dishname").value;
            let dishPrice = document.getElementById("price").value;
            console.log(dishPrice);
            // return;
            //  console.log(name,address);
            if (secreateCode == '') {
                document.getElementById("errormessage").innerHTML = "Please write your secreate code.";
                document.getElementById("code").style.background = "#ff8080";
                return;
            } else {
                document.getElementById("errormessage").innerHTML = "";
                document.getElementById("code").style.background = "";
            }
            if (secreateCode.length < 4) {
                document.getElementById("errormessage").innerHTML = " secreate code should be minimum 4 digit.";
                document.getElementById("code").style.background = "#ff8080";
                return;
            } else {
                document.getElementById("errormessage").innerHTML = "";
                document.getElementById("code").style.background = "";
            }

            document.getElementById('saveOrder').disabled = true;
            document.getElementById('successMessage').innerHTML = "Saving Your Order.Please Wait...";
            $.post("data.php", {
                'secreateCode': secreateCode,
                'userName': userName,
                'userAddress': userAddress,
                'userNumber': userNumber,
                'dishname': dishname,
                'price1': dishPrice,
            }, function(data) {
                console.log(data);

                // calling for printing bill
                var dataArray = data.split(':::');
                console.log(dataArray);
                document.getElementById('userDishName').innerHTML = dataArray[0];
                document.getElementById('userDishPrice').innerHTML = dataArray[1] + '₹';
                document.getElementById('userOrderData').innerHTML = dataArray[2];

                // $.post("billTemplate.php", {
                //     'data': data
                // }, function(data) {
                //     console.log(data);
                //     generatePDF();
                //     // location.reload();
                // });
                if (generatePDF()) {
                    document.getElementById('saveOrder').disabled = false;
                    document.getElementById('successMessage').innerHTML = "Your Order Saved SuccessFul.";
                    document.getElementById("name1").value='';
                    document.getElementById("address1").value='';
                    document.getElementById("number1").value='';
                    document.getElementById("code").value='';
                    document.getElementById("dishname").value='';
                    document.getElementById("price").value='';
                    document.getElementById('successMessage').innerHTML = "";
                }

            });

        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

</body>

</html>