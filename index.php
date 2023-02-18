<?php
session_start();
// require "connetion.php";
// if (isset($_SESSION["login"])) {
//   $email = $_SESSION["email"];
//   $pass = $_SESSION["pass"];

//   $sql = "SELECT * FROM userAccount WHERE userEmail='$email' AND userPassword='$pass';";
//   // echo $sql;
//   // '851840291', 'Adarsh Mishra', 'adarshmishra812003@gmail.com', 'Subashnagar kariwali road bhiwandi', '1234', '9049194868'
//   $username;
//   $result = mysqli_query($conn, $sql);
//   if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//       $username = $row['userName'];
//       echo $username;
//     }
//   } else {
//   }
// }
$username = "";
if (isset($_SESSION["userName"]) && $_SESSION['login'] == 2) {
  $username = $_SESSION["userName"];
}

?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Adarsh,adarsh siddharthshankar mishra,get my food,adarsh@84,adarsh software">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css?v=<?php echo rand(); ?>">
  <link rel="shortcut icon" href="images/fevicon.ico" type="image/x-icon">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Index Page - Get Our Food</title>
  <!-- adding font awesome cdn link -->
  <script src="https://use.fontawesome.com/ed481f8158.js"></script>
  <script src="https://kit.fontawesome.com/f19617ca8d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- jquery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-dark text-light">
  <header id="home">

    <!-- old nav -->
    <!-- <div id="openNav" class="mt-3">
      <a class="fS-2 ms-5 mt-4" onclick="showNav()"><i class="fas fa-list-alt"></i></a>
    </div> -->
    <!-- <div id="myNav" style="position: fixed;top: 200px;left: 0;border-radius: 10px;" hidden> -->
    <!-- //cut button -->
    <!-- <a class=" btn btn-danger text-white fs-3" onclick="showNav()" style="float: right;"><i class="far fa-times-circle mt-2"></i></a>
      <ul class="">
        <li class="mb-2">
          <a class="active ms-2 fs-3" aria-current="page" href="#home"><i class="fa-solid fa-house mR2"></i>Home</a>
        </li>
        <li class="mb-2">
          <a class="ms-2 fs-3"  href="#review"><i class="fas fa-star mR2"></i>Reviews</a>
        </li>
        <li class="mb-2">
          <a class="ms-2 fs-3" href="#aboutus"><i class="fas fa-info mR2"></i>About us</a>
        </li>
        <li class="mb-2">
          <a class="ms-2 fs-3" href="#contactus"><i class="fas fa-id-card mR2"></i>Contact Us <span style="color: white;">----</span></a>
        </li>
        <li class="mb-2">
          <a class="ms-2 fs-3" href="todo.php"><i class="fas fa-sticky-note mR2"></i>Notes</a>
        </li>
        <li class="mb-2">
          <a class="btn ordercolor nav-link  fs-4 text-white w-100" id="loginId" onclick="confirmlogin()">Login</a>
        </li>
        <li class="mb-2 ml-2">
          <a class="btn btn-danger nav-link text-white fs-4" id="logOut" href="logOut.php" hidden>Log Out</a>
        </li>
      </ul>
    </div> -->




    <nav class="navbar navbar-expand-lg navbar-dark" style="font-family:monospace;background:#000304;">
      <div class="container-fluid">
        <a class="navbar-brand fs-1 text-center " href="#home"><img src="images/logoimage.png" class="img-fluid logosize" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto ms-3 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active ms-3 fs-3" aria-current="page" href="#home"><i class="fa-solid fa-house mR2"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3 fs-3" href="#review"><i class="fas fa-star mR2"></i>Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3 fs-3" href="#aboutus"><i class="fas fa-info mR2"></i>About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3 fs-3" href="#contactus"><i class="fas fa-id-card mR2"></i>Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3 fs-3" href="todo.php"><i class="fas fa-sticky-note mR2"></i>Notes</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary nav-link ms-3 fs-4 w-100" id="loginId" onclick="confirmlogin()">Login</a>
            </li>
            <li class="nav-item">
              <a class=" btn btn-danger nav-link ms-5 fs-4" id="logOut" href="logOut.php" hidden>Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <div class="container text-center mt-2" data-aos="fade-up">
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>WELCOME ! To The Restaurant.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>

  <div id="carouselExampleCaptions" class="carousel slide mt-3" data-bs-ride="carousel" data-aos="fade-up">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner carousel-fade">
      <div class="carousel-item active ">
        <img src="images/4.jpg" class="d-block w-100 caroselsize" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Try the Healthy Food.</h5>

        </div>
      </div>
      <div class="carousel-item">
        <img src="images/2.jpg" class="d-block w-100 caroselsize" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Food With best Test.</h5>

        </div>
      </div>
      <div class="carousel-item">
        <img src="images/3.jpg" class="d-block w-100 caroselsize" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>30% Discont on Festival.</h5>

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- feature -->

  <!-- our best -->
  <section id="ourbest">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-12  text-center mt-3">
          <h1 style="color:orange" data-aos="fade-up">Our Special</h1>
          <span>
            <b>
              <hr>
            </b>
          </span>
          <!-- loading message -->
          <div class="text-center mt-3 mb-3">
            <button class="btn btn-primary" type="button" disabled id="loadingMessageSpecialDish">
              Loading dishesh please wait...
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </button>
          </div>
          <!-- loading message end-->
        </div>
      </div>
      <div class="row" data-aos="fade-up" id="specialDishList">

      </div>
    </div>
  </section>

  <!-- end our bst -->

  <!-- aboutus -->
  <section id="aboutus">
    <div class="container">
      <h1 class=" text-center" style="color:orange" data-aos="fade-up">About Us</h1>
      <!-- <button class="btn-primary" onclick="downloadPpt('downloadPPt')">Download</button> -->
      <a href="images/Adarsh Mishra Presentation.pptx" class="btn btn-primary" download hidden id='downloadPPt'></a>
      <hr>
      <p class="mb-3 text-left" data-aos="fade-up">Our Restaurant is a localy business that was fond in 2022.We're dedicated to creating wonderful Dishes surprises that you'll absolutely love. When you visit our shop,
        you won't believe your eyes with the incredible range of options that are available with us. We specialize in Vada pav,Dosa and Burger Wth more than 180 different type of Dishes!
        They're the testy and spicy dishes you'll ever experience, with an unforgettable taste.</p>
      <p class="mb-3" data-aos="fade-up">Our Dishes are our passion. Without wonderful customers like you, our Restaurant would never survive. That's
        why we're sure to say "thank you" to everyone who gives us their business and support.
        We're extremely thankful for our loyal customers and their love never falls short.</p>
      <p data-aos="fade-up">Visit our Restaurant where you'll always be treated like family.
        Warm smiles and welcome greetings are our number one guarantee.
        Carryout and delivery options are available. Our Dishes taste as good as they look!</p>
    </div>
  </section>
  <!-- abusend -->
  <!-- our dishes -->
  <section id="dish">
    <div class="container mt-5">
      <h1 class="text-center" style="color:orange" data-aos="fade-up">Our Dishesh</h1>
      <!-- loading message -->
      <div class="text-center mt-3 mb-3">
        <button class="btn btn-primary" type="button" disabled id="loadingMessageDish">
          Loading dishesh please wait...
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        </button>
      </div>
      <!-- loading message end-->
      <hr>
      <div class="row" id="dishListHome">


      </div>

  </section>
  <!-- our dishes end -->
  <!-- reviews -->
  <section id="review">
    <div class="container mt-5">
      <h1 class="text-center" style="color:orange" data-aos="fade-up">Our Reviews</h1>
      <hr>
      <div class="row">
        <div class="col-md-4 mb-3" data-aos="fade-up">
          <div class="card">
            <img src="images/user1.jpg" style="border-radius:50%" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-dark">I realy love her all dishes.I recomend you to try Vada pav.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3" data-aos="fade-up">
          <div class="card">
            <img src="images/user1.jpg" style="border-radius:50%" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-dark">I realy love her all dishes.I recomend you to try Vada pav.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3" data-aos="fade-up">
          <div class="card">
            <img src="images/user1.jpg" style="border-radius:50%" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-dark">I realy love her all dishes.I recomend you to try Vada pav.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- reviewsend -->
  <!-- contactus -->
  <section id="contactus" data-aos="fade-up">
    <div class="container  mt-5">
      <div class="row">
        <div class="col-md-6">
          <h1 class="text-center" style="color: orange;">Contact Us</h1>
          <hr>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="Email" placeholder="Email">
            </div>
            <div class="col-12">
              <label for="message">Message</label>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Enter Your Message" id="message" style="height: 100px"></textarea>

              </div>
            </div>
            <div class="col-md-6">
              <label for="mobile" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="mobile" placeholder="Mobile Number">
            </div>
            <div class="col-md-4 mb-3">
              <label for="state" class="form-label">State</label>
              <!--- India states -->
              <select id="country-state" class="form-control" name="country-state">
                <option value="">Select State</option>
                <option value="AN">Andaman and Nicobar Islands</option>
                <option value="AP">Andhra Pradesh</option>
                <option value="AR">Arunachal Pradesh</option>
                <option value="AS">Assam</option>
                <option value="BR">Bihar</option>
                <option value="CH">Chandigarh</option>
                <option value="CT">Chhattisgarh</option>
                <option value="DN">Dadra and Nagar Haveli</option>
                <option value="DD">Daman and Diu</option>
                <option value="DL">Delhi</option>
                <option value="GA">Goa</option>
                <option value="GJ">Gujarat</option>
                <option value="HR">Haryana</option>
                <option value="HP">Himachal Pradesh</option>
                <option value="JK">Jammu and Kashmir</option>
                <option value="JH">Jharkhand</option>
                <option value="KA">Karnataka</option>
                <option value="KL">Kerala</option>
                <option value="LA">Ladakh</option>
                <option value="LD">Lakshadweep</option>
                <option value="MP">Madhya Pradesh</option>
                <option value="MH">Maharashtra</option>
                <option value="MN">Manipur</option>
                <option value="ML">Meghalaya</option>
                <option value="MZ">Mizoram</option>
                <option value="NL">Nagaland</option>
                <option value="OR">Odisha</option>
                <option value="PY">Puducherry</option>
                <option value="PB">Punjab</option>
                <option value="RJ">Rajasthan</option>
                <option value="SK">Sikkim</option>
                <option value="TN">Tamil Nadu</option>
                <option value="TG">Telangana</option>
                <option value="TR">Tripura</option>
                <option value="UP">Uttar Pradesh</option>
                <option value="UT">Uttarakhand</option>
                <option value="WB">West Bengal</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="pincode" class="form-label">Pin Code</label>
              <input type="number" class="form-control" id="pincode" placeholder="Pin Code">
            </div>
            <div class="col-md-12 text-center">
              <p class="error errormessage text-danger" id="errormessage">

              </p><br><br>
              <p class="success text-success" id="success">

              </p>
            </div>

            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <button class="btn ordercolor" type="submit" id="saveContactMessage" onclick="save()">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h1 class="text-center" style="color: orange;">FAQS</h1>
          <hr>
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" style="background-color: black; color:white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  How Can We Give Order ?
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body" style="color:black">
                  You can give order by just clicking order now button.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" style="background-color: black; color:white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  Can we get discontt ?
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" style="color:black" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body"> You can get discount in festivel time.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" style="background-color: black; color:white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  Home delivery facility available or not ?
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body" style="color:black">
                  Yes.It is available.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- faq -->
  <section id="faqs" class="my-4">
    <div class="container">

    </div>

  </section>
  <div class="myFooter">
    <footer class="py-3 mt-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#home" class="nav-link px-2 text-white ">Home</a></li>
        <li class="nav-item"><a href="#review" class="nav-link px-2 text-white">Reviews</a></li>
        <li class="nav-item"><a href="#aboutus" class="nav-link px-2 text-white">About Us</a></li>
        <li class="nav-item"><a href="#contactus" class="nav-link px-2 text-white">Contact Us</a></li>
        <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li> -->
      </ul>
      <p class="text-center text-white"> © 2022 Copyright Reserved:
        <a href="https://www.linkedin.com/in/adarsh-mishra-469811205/">Made By Adarsh Mishra</a>
      </p>
    </footer>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- <footer class="text-center ">
    <div class="text-center bg-orange p-3">
      © 2022 Copyright Reserved:
      <a href="https://www.linkedin.com/in/adarsh-mishra-469811205/">Made By Adarsh Mishra</a>
    </div>

  </footer> -->
</body>

<script src="js/main.js?v=<?php echo rand(); ?>"></script>
<script src="js/index.js?v=<?php echo rand(); ?>"></script>

<script>
  //initialte ade animation
  AOS.init();

  window.onload = function() {
    loginCheck();
    loadDishList();
  };

  function loginCheck() {
    var userName = "<?php echo $username; ?>";
    // console.log(userName);
    if (userName == '') {
      document.getElementById("loginId").innerText = "Login";
    } else {
      document.getElementById("loginId").innerText = userName.split(" ")[0];
      var logOut = document.getElementById("logOut");

    }
    var logOut = document.getElementById("logOut");
    console.log(logOut);
    if (document.getElementById("loginId").innerText == "Login") {
      logOut.setAttribute('style', 'display:none !important');
    } else {
      logOut.setAttribute('style', 'display:block !important');
    }
    // var loginValue = document.getElementById("loginId").innerText;

  }
</script>

<!-- <script>
  function downloadPpt(pptId) {
    var opinion = prompt('Enter Value');
    if (opinion == 'download') {
      document.getElementById(pptId).click();
    }

  }
</script> -->

</html>