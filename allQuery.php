<?php
include "connetion.php";

if (isset($_POST['saveFlag'])) {
    $name = $_POST['name'];
    $taskDate = $_POST['taskDate'];
    $task = $_POST['task'];
    $taskId = $_POST['taskId'] . rand();

    $sql = "INSERT INTO todo VALUES('$taskId','$name','$taskDate','PENDING','$task');";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
} else if (isset($_POST['deleteFlag'])) {
    $taskId = $_POST['taskId'];

    $sql = "DELETE FROM todo WHERE taskId='$taskId';";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
} else if (isset($_POST['flagForDishList'])) {
    $output = "";
    $specialDishList="";
    $dishListData = [];
    $sql = 'SELECT * FROM dishList ORDER BY dishId DESC';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $rowId = 0;
        while ($row = $result->fetch_assoc()) {
            $rowId = $rowId + 1;
            array_push($dishListData, $row);
            $success="true";

            // $output = $output . "
            //      <tr class='text-center'>
            //      <td>" . $rowId . "</td> 
            //      <td>" . $row["dishName"] . "</td> 
            //      <td>" . $row["dishDescription"] . "</td> 
            //      <td>" . $row["dishPrice"] . ' ' . '₹' . "</td> 
            //      <td>" . $row["entryDate"] . "</td> 
            //      <td ><span title='click here to view' class='text-center'><i class='fa-solid fa-eye' id='$rowId' onclick='showDish(this.id)'></i><span></td> 
            //      </tr>
            //      ";
            if ($row["dishType"] != "SPECIAL") {
                $imagePath = "images/dishImages/" . $row['imageName'];
                $output = $output . '
                <div class="col-md-4 mt-3 mb-3">
                <div class="card aos-init aos-animate" style="height: 600px;" data-aos="fade-up">
                <div class="card-header">
                  <h5 class="card-title text-dark"><b>' . $row["dishName"] . '</b></h5>
                </div>
                <div class="card-body">
                  <img src=' . $imagePath . ' class="imgsize" alt="">
                  <p class="card-text text-dark mt-2">' . $row["dishDescription"] . '</p>
                </div>
                <div class="card-footer ">
                  <a class="btn ordercolor" name=' . $row["dishId"] . ' onclick="saveOrder(this.name)">Order Now</a>
                </div>
              </div>
              </div>';
            }else{
                $imagePath = "images/dishImages/" . $row['imageName'];
                $specialDishList = $specialDishList . '
                <div class="col-md-4 mt-3 mb-3">
                <div class="card aos-init aos-animate" style="height: 600px;" data-aos="fade-up">
                <div class="card-header">
                  <h5 class="card-title text-dark"><b>' . $row["dishName"] . '</b></h5>
                </div>
                <div class="card-body">
                  <img src=' . $imagePath . ' class="imgsize" alt="">
                  <p class="card-text text-dark mt-2">' . $row["dishDescription"] . '</p>
                </div>
                <div class="card-footer ">
                  <a class="btn ordercolor" name=' . $row["dishId"] . ' onclick="saveOrder(this.name)">Order Now</a>
                </div>
              </div>
              </div>';
            }
        }
    }

    echo $output . "%8%" . json_encode($dishListData)."%8%".$specialDishList."%8%".$success;
    // echo $output;
}
