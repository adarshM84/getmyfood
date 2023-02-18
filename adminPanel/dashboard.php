<?php require_once 'head.php';
require_once 'connection.php';
session_start();
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == 'admin') {
    } else {
        header("Location:adminLogin.php");
        exit;
    }
} else {
    header("Location:adminLogin.php");
    exit;
}


?>


<body style="background-color: black;">


    <!-- view dish -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modalOpenBtn" data-bs-target="#staticBackdrop" hidden>
        Open Model
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDishTitle">...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="modalBody">
                    <!-- card -->
                    <div class="card">
                        <img src="" class="card-img-top" id="modalDishImage" style="height: 300px;" alt="..." id="cardImage">
                        <div class="card-body">
                            <h5 class="card-title" id="modalDishPrice">...</h5>
                            <p class="card-text" id="modalDishDescription">....</p>
                        </div>
                    </div>
                    <!-- card end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="closeModalBtn">Close</button>
                    <button type="button" class="btn btn-primary" onclick="closeModal()">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- view dish end -->
    <?php require_once 'navbar.php'; ?>
    <!-- home -->
    <div class="col-md-9" id='home'>
        <div class="container">
            <h1 class='text-center headingColor'>All Details</h1>
            <!-- loading message -->
            <div class="text-center">
                <button class="btn btn-primary mt-2 mb-2" type="button" disabled id="loadingMessageHome" hidden>
                    Loading...
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
            <!-- loading message end-->

            <div class="row" id="circleDiv">
                <div class="col-md-3">
                    <div class="dashboardCircle">
                        <input class='text-success text-center homeInput dashboardValueSize' value="0" id='totalOrder' disabled><br><br>
                        <input class='text-white text-center homeInput circleFooterTextStyle' value="Total Order" id='totalOrderFooter' disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardCircle">
                        <input class='text-danger text-center homeInput dashboardValueSize' value="0" id='pendingOrder' disabled><br><br>
                        <input class='text-white text-center homeInput circleFooterTextStyle' value="Pending Order" id='pendingOrderFooter' disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardCircle">
                        <input class='text-success text-center homeInput dashboardValueSize' value="0" id='completedOrder' disabled><br><br>
                        <input class='text-white text-center homeInput circleFooterTextStyle' value="Completed Order" id='completedOrderFooter' disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardCircle">
                        <input class='text-success text-center homeInput dashboardValueSize' value="0" id='totalUser' disabled><br><br>
                        <input class='text-white text-center homeInput circleFooterTextStyle' value="Total User" id='totalUserFooter' disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //order list -->
    <div class="col-md-9" id='ordersList' hidden>
        <div class="container">
            <h1 class='text-center headingColor'>All Order</h1>
            <!-- loading message -->
            <div class="text-center">
                <button class="btn btn-primary mt-2 mb-2" type="button" disabled id="loadingMessageOrderList" hidden>
                    Loading...
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
            <!-- loading message end-->

            <div class="row">
                <div class="col-md-12 VerticalScrollSection">
                    <input type="text" id="orderSearchInput" onkeyup="filterTable('orderSearchInput','orderListTable')" class="searchInput" placeholder="Search for names.." title="Search here">
                    <table class="table table-warning table-hover  table-striped table-bordered table-responsive-md" id="orderListTable">
                        <thead class="table-primary">
                            <th class='text-center'>Sr</th>
                            <th class='text-center'>User Name</th>
                            <th class='text-center'>Dish Name</th>
                            <th class='text-center'>Mob No</th>
                            <th class='text-center'>Order Status</th>
                            <th class='text-center'>Action</th>
                        </thead>
                        <tbody id="orderListTableBody">
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add products -->
    <div class="col-md-9" id='addProduct' hidden>
        <div class="container">
            <h1 class='text-center headingColor'>Add Dishes</h1>
            <!-- //add dish -->
            <div class="addDish">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="dishName" class="form-label text-white">Dish Name</label>
                        <input type="text" class="form-control" id="dishName" placeholder="Dish name">
                    </div>
                    <div class="col-md-4">
                        <label for="dishPrice" class="form-label text-white">Dish Price</label>
                        <input type="number" class="form-control" id="dishPrice" placeholder="Dish Price">
                    </div>
                    <div class="col-md-4">
                        <label for="dishType" class="form-label text-white">Dish Type</label>
                        <select id="dishType" class="form-select form-select">
                            <option value="ORDINARY" selected>ORDINARY</option>
                            <option value="SPECIAL">SPECIAL</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="dishDescription" class="form-label text-white">Dish Description</label>
                        <textarea id="dishDescription" class="form-control" cols="60" rows="6" placeholder="Dish Description"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label for="dishImage" class="form-label text-white">Dish Image</label>
                        <input type="file" class="form-control" id="dishImage" accept="image/*" onchange="loadFile(event,this.id)">
                    </div>
                    <div class="col-md-4">
                        <label for="imagePreview" class="text-white">Image Preview</label>
                        <img src="../images/food.png" alt="" id="imagePreview">
                    </div>
                </div>

                <!-- For message -->
                <div class="row mt-4 mb-4">
                    <div class="col-md-12 text-center">
                        <p class="error text-danger" id="error"></p>
                        <p class="success text-success" id="success"></p>
                    </div>
                </div>
                <div class="text-center mt-2 pb-3">
                    <button class="btn btn-success" onclick="addDish()" id="addDishBtn">Submit</button>
                </div>
            </div>
            <!-- https://www.youtube.com/watch?v=OweJ0eXZCsE&t=159s -->
        </div>
    </div>
    <!-- add product end -->

    <!-- all product -->
    <div class="col-md-9" id='allProduct' hidden>
        <div class="container">
            <h1 class='text-center headingColor'>All Dishes</h1>
            <!-- loading message -->
            <div class="text-center">
                <button class="btn btn-primary" type="button" disabled id="loadingMessage" hidden>
                    Loading...
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
            <!-- loading message end-->
            <div id="allDish" class="VerticalScrollSection">
                <input type="text" id="dishSearchInput" onkeyup="filterTable('dishSearchInput','dishListTable')" class="searchInput" placeholder="Search for names.." title="Search here">
                <table class="table table-warning table-hover  table-striped table-bordered mt-3" id="dishListTable">
                    <thead class="table-primary">
                        <th class="text-center">Sr</th>
                        <th class="text-center">Dish Name</th>
                        <th class="text-center">Dish Description</th>
                        <th class="text-center">Dish Price</th>
                        <th class="text-center">Entry Date</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody id="dishListTableBody">

                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- all product end -->

    <!-- all coustomer -->
    <div class="col-md-9" id='allCoustomers' hidden>
        <div class="container">
            <h1 class='text-center headingColor'>All Coustomers</h1>
            <!-- loading message -->
            <div class="text-center">
                <button class="btn btn-primary mt-2 mb-2" type="button" disabled id="loadingMessageCustomer" hidden>
                    Loading...
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
            <!-- loading message end-->

            <div class="row">
                <div class="col-md-12 VerticalScrollSection">
                    <input type="text" id="customerSearchInput" onkeyup="filterTable('customerSearchInput','coustomerListTable')" class="searchInput" placeholder="Search for names.." title="Search here">
                    <table class="table table-warning table-hover  table-striped table-bordered table-responsive-md" id="coustomerListTable">
                        <thead class="table-primary">
                            <th class='text-center'>Sr</th>
                            <th class='text-center'>Name</th>
                            <th class='text-center'>Email Id</th>
                            <th class='text-center'>Password</th>
                            <th class='text-center'>Mob No</th>
                            <th class='text-center'>Address</th>
                            <!-- <th class='text-center'>Action</th> -->
                        </thead>
                        <tbody id="coustomerListTableBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/coustom.js?v=<?php echo rand(); ?>"></script>
    <script src="js/manageDish.js?v=<?php echo rand(); ?>"></script>
    <script>
        $(document).ready(function() {
            loadDashboardData();


            // console.log("Called");
        });

        function loadFile(event, imageId) {
            imageUpload = 1;
            // console.log(event, imageId);
            var dishImage = document.getElementById("imagePreview");
            dishImage.src = URL.createObjectURL(event.target.files[0]);
            // dishImage.style.height = 200;
            // dishImage.style.width = 180;
            dishImage.onload = function() {
                URL.revokeObjectURL(dishImage.src) // free memory
            }
        }
    </script>
</body>

</html>