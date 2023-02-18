<?php
require 'connection.php';
$conn->begin_transaction();
try{
    if (isset($_POST['flagAddProduct'])) {
        $dirDishImage = "../images/dishImages/";
        $dishName = $_POST['dishName'];
        $dishPrice = $_POST['dishPrice'];
        $dishType = $_POST['dishType'];
        $flagImageUpload = $_POST['flagImageUpload'];
        $dishDescription = $_POST['dishDescription'];
        $dishId = "";
        $entryDate = date("d-m-Y");
        $dishImageName = "";
    
        $sql = "SELECT dishId FROM dishList ORDER BY dishId DESC limit 1;";
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dishId = $row['dishId']+1;
            }
        } else {
            $dishId = 1;
        }
        if ($flagImageUpload == true) {
            $temp1        = explode(".", $_FILES["dishImage"]["name"]);
            $dishImageName = round(rand()) . '.' . end($temp1);
            move_uploaded_file($_FILES["dishImage"]["tmp_name"], $dirDishImage . $dishImageName);
        }
    
        $sql = "INSERT INTO dishList values('$dishId','$dishName','$dishDescription','$dishPrice','$dishType','$dishImageName','$entryDate');";
        $result=mysqli_query($conn,$sql);
        $conn->commit();
        echo "true";
    }
    
}catch (mysqli_sql_exception $exception) {
    $conn->rollback();
  
    throw $exception;
  }
  $conn = null;