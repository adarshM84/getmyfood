<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?v=<?php echo rand();?>">
    <link rel="shortcut icon" href="images/fevicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sign Page - Get Our Food</title>
</head>
</head>
<!-- jquery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body style="background-color: black;">
    <div class="container mt-3">
        <div class="container text-center" style="max-width: 70%;">
            <div class="loginbox">
                <div class="rowtext-center">
                    <div class="card text-center" style="background-color: #484848;">
                        <div class="col-md-12">
                            <div class="card-header">
                                <h1 class="text-center" style="color: orange;">Sign In</h1>
                                <hr style="color: white;">
                            </div>
                            <div class="card-body">
                                <img class="mb-4" src="images/logoimage.png" alt="" max-width="20%">

                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="name" class="form-label" style="color: white;">Full Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label" style="color: white;">Email</label>
                                        <input type="email" class="form-control" id="Email">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="mobile" class="form-label" style="color: white;">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pass" class="form-label" style="color: white;">Password</label>
                                        <input type="text" class="form-control" id="pass">
                                    </div>
                                    <div class="col-12">
                                        <label for="address" style="color: white;">Address</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Enter Your Address" id="address" style="height: 100px"></textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <p class="error text-danger" id="errormessage">

                                        </p>
                                        <p class="text-success" id="success">

                                        </p>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-md-12 text-center">
                                            <button class="btn ordercolor" type="submit" onclick="saveData()">Submit</button>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>