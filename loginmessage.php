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
    <title>Login Page - Get Our Food</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body style="background-color: black;">

    <div class="container text-center" style="max-width: 70%;">
        <div class="mt-3 loginbox">

            <div class="card text-center" style="background-color: #484848;">
                <div class="card-header">
                    <h1 class="text-center text-warning">Please Login For Make Order</h1>
                    <hr style="color: white;">
                </div>
                <div class="card-body">
                    <img class="mb-4" src="images/logoimage.png" alt="" max-width="20%">
                    <!-- <h1 class="h3 mb-3 fw-normal">Please Login</h1> -->

                    <div class="row mb-2">
                        <div class="col-md-4 col-sm-4"></div>
                        <div class=" col-md-4 col-sm-4">
                            <input type="email" class="form-control" id="emailId" placeholder="Email Id">
                            <label for="emailId" style="color:white;">Email address</label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 col-sm-4"></div>
                        <div class=" col-md-4 col-sm-4">
                            <input type="password" class="form-control" id="pass" placeholder="Password">
                            <label for="pass" style="color:white;">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-mb-12">
                            <p class="error text-danger" id="error">

                            </p>
                            <p class="text-success" id="success">

                            </p>
                        </div>
                    </div>
                    <audio id="audio" src="music/loginMusic.mp3" hidden></audio>
                    <div class="row mb-4">
                        <div class="col-md-12 text-primary">
                            <a href="create.php" style="color: black;font-weight: bold;background: orange;padding: 8px;border-radius: 5px;">Not have account ? Create Accont</a><br><br>
                            <a href="adminPanel/adminLogin.php" style="color: black;font-weight: bold;background: orange;padding: 8px;border-radius: 5px;">For Admin Login</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="w-10 btn btn-lg btn-warning" type="submit" onclick="checkLogin()">Login</button>
                    <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
                </div>
            </div>
            <!-- <main class="form-signin">
            
            </main> -->

        </div>
    </div>

    <script>

    </script>


    <script src="js/main.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>