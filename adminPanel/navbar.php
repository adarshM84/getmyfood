<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- <div class="card sidenav" >
              <ul id="navList">
                  <li class="liItem card text-center"><a class='liA' href="#">USERS</a></li>
                  <li class="liItem card text-center"><a class='liA'href="#">ENQUIRES</a></li>
                  <li class="liItem card text-center"><a class='liA' href="#">ORDERS LIST</a></li>
              </ul>
      </div> -->
<div class="row" id="allSection">
    <div class="col-md-3" id='sidebar'>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#home" class="nav-link active" aria-current="page" id='level1' onclick="showList('home',1);">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#ordersList" class="nav-link text-white" id='level2' onclick="showList('ordersList',2);">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#addProduct" class="nav-link text-white" id='level3' onclick="showList('addProduct',3);">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Add Products
                    </a>
                </li>
                <li>
                    <a href="#allProduct" class="nav-link text-white" id='level5' onclick="showList('allProduct',5);">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        All Products
                    </a>
                </li>
                <li>
                    <a href="#allCoustomers" class="nav-link text-white" id='level4' onclick="showList('allCoustomers',4);">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" onclick="showFooter()" aria-expanded="false">
                    <img src="../images/logoimage.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>More</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" id='signOut' aria-labelledby="dropdownUser1" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);" data-popper-placement="top-start">
                    <li><a class="dropdown-item" href="#">Adarsh Mishra</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li style="background-color: red;"><a class="dropdown-item text-white" href="logOut.php" >Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>