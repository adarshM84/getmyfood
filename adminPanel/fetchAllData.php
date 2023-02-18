<?php
require 'connection.php';
if (isset($_POST['flagForDishList'])) {
    $output = "";
    $dishListData = [];
    $sql = 'SELECT * FROM dishList ORDER BY dishId DESC';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $rowId = 0;
        while ($row = $result->fetch_assoc()) {
            $rowId = $rowId + 1;
            array_push($dishListData, $row);
            $output = $output . "
                 <tr class='text-center'>
                 <td>" . $rowId . "</td> 
                 <td>" . $row["dishName"] . "</td> 
                 <td>" . $row["dishDescription"] . "</td> 
                 <td>" . $row["dishPrice"] . ' ' . '₹' . "</td> 
                 <td>" . $row["entryDate"] . "</td> 
                 <td ><span title='click here to view' class='text-center'><i class='fa-solid fa-eye' id='$rowId' onclick='showDish(this.id)'></i><span></td> 
                 </tr>
                 ";
        }
    }

    echo $output . "%8%" . json_encode($dishListData);
} else if (isset($_POST['flagForDashboardData'])) {


    $sql = "SELECT(SELECT COUNT(*) FROM orderList) as totalOrder, (SELECT COUNT(*) FROM orderList WHERE orderStatus='PENDING') as totalPendingOrder,(SELECT COUNT(*) FROM orderList WHERE orderStatus='COMPLETED') as totalCompletedOrder,(SELECT COUNT(*) FROM userAccount ) as totalUser";
    $result = mysqli_query($conn, $sql);

    $allData = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $allData = $row['totalOrder'] . ':::' . $row['totalPendingOrder'] . ':::' . $row['totalCompletedOrder'] . ':::' . $row['totalUser'];
        }
    }

    echo $allData;
} else if (isset($_POST['flagForOrderList'])) {
    $output = "";

    $sql = 'SELECT * FROM orderList ORDER BY orderId DESC';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $rowId = 0;
        while ($row = $result->fetch_assoc()) {
            $rowId = $rowId + 1;
            $statusCss = 'badge bg-danger';
            $orderStatus = $row["orderStatus"];
            if ($orderStatus == 'COMPLETED') {
                $orderStatus = 'badge bg-success';
            }
            $output = $output . "
            <tr class='text-center'>
            <td>" . $rowId . "</td> 
            <td>" . $row["name"] . "</td> 
            <td>" . $row["dishname"] . "</td> 
            <td>" . $row["number"] . "</td> 
            <td><span class='$statusCss'>" . $row["orderStatus"] . "</span></td> 
            <td ><span title='click here to view' class='text-center'><i class='fa-solid fa-eye'></i></span></td> 
            </tr>
            ";
        }
    }
    echo $output;
} else if (isset($_POST['flagForUserList'])) {
    $output = "";

    $sql = 'SELECT * FROM userAccount ORDER BY userId';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $rowId = 0;
        while ($row = $result->fetch_assoc()) {
            $rowId = $rowId + 1;
            $output=$output. "
            <tr class='text-center'>
            <td>" . $rowId . "</td> 
            <td>" . $row["userName"] . "</td> 
            <td>" . $row["userEmail"] . "</td> 
            <td>" . $row["userPassword"] . "</td> 
            <td>" . $row["userNumber"] . "</td> 
            <td>" . $row["userAddress"] . "</td> 
            </tr>
            ";
            // <span title='click here to view' class='text-center'><i class='fa-solid fa-eye'></i><span>
        }
    }
    echo $output;
}
