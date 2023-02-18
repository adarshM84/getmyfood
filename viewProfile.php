<?php
session_start();
require "connetion.php";
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] == 2) {
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
$email = $_SESSION["email"];
$pass = $_SESSION["pass"];
$firstrow;
$sql = "SELECT * FROM userAccount WHERE userEmail='$email' AND userPassword='$pass';";
// echo $sql;
// '851840291', 'Adarsh Mishra', 'adarshmishra812003@gmail.com', 'Subashnagar kariwali road bhiwandi', '1234', '9049194868'
$username;
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $firstrow = $row;
    }
} else {
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
    <title>Get Our Food-My Profile</title>
</head>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body style="background-color: black;">
    <div class="container mt-3">
        <div class="loginbox">
            <div class="rowtext-center">
                <div class="col-md-12">
                    <h1 class="text-center" style="color: orange;">My Profile</h1>
                    <hr style="color: white;">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label" style="color: white;">Full Name</label>
                            <input type="text" class="form-control" value="<?php echo $firstrow['userName']; ?>" id="name" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label" style="color: white;">Email</label>
                            <input type="email" class="form-control" value="<?php echo $firstrow['userEmail']; ?>" id="Email" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="mobile" class="form-label" style="color: white;">Mobile Number</label>
                            <input type="text" class="form-control" value="<?php echo $firstrow['userNumber']; ?>" id="mobile" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="pass" class="form-label" style="color: white;">Password</label>
                            <input type="text" class="form-control" value="<?php echo $firstrow['userPassword']; ?>" id="pass" disabled>
                        </div>
                        <div class="col-12">
                            <label for="address" style="color: white;">Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Enter Your Address" id="address" style="height: 100px" disabled><?php echo $firstrow['userAddress']; ?></textarea>

                            </div>
                        </div>

                        <div class="col-md-12 text-center text-danger">
                            <p class="errormessage" id="errormessage">

                            </p>
                        </div>
                        <div class="row text-center mb-2">
                            <div class="col-md-5"></div>
                            <div class="col-md-3">
                                <a class="btn btn-warning" href="index.php">Home</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>