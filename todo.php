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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo rand();?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/fevicon.ico" type="image/x-icon">
</head>

<body>
    <div class="text-center" style="background-color: lightgreen;">
        <h1>TO DO LIST</h1>
        <input type='text' class="mt-1" id='name' value='<?php echo $name; ?>' name='<?php echo $email; ?>' disabled placeholder="Name" style=" height: 40px; text-align: center; margin: 10px 30px;  width: 300px; border:4px lightskyblue; border-radius: 10px;"><br>
        <input type='date' class="mt-1" id='taskDate' placeholder="Number" style=" height: 40px; text-align: center; margin: 10px 30px;  width: 300px; border:4px lightskyblue; border-radius: 10px;"><br>
        <input type='textarea' class="mt-1" id='task' placeholder="Enter Task" style=" height: 40px; text-align: center; margin: 10px 30px;  width: 300px; border:4px lightskyblue; border-radius: 10px;"><br>
        <button class="btn btn-primary mt-2" id='btn1' type="submit" onclick="saveTask()" style=" height: 40px; text-align: center; margin: 10px 30px;  width: 300px; border:4px lightskyblue; border-radius: 10px;">Enter Task</button>
        <p class="errormessage" class="mt-2" id="errormessage" style="color:red;">
        </p>
        <p class="success" class="mt-1" id="success" style="color:green;">
        </p>
        <hr class="mt-2">
    </div>

    <h1 class="text-center">All Task</h1>

    <div class="text-center" style="background-color: orange !important;">
        <table style="width:100%" class="table table-primary table-striped mt-3">
            <tr>
                <th style="width: 10%;">Sr No.</th>
                <th style="width: 20%;">Name</th>
                <th style="width: 20%;">Task Date</th>
                <th style="width: 20%;">Task Status</th>
                <th style="width: 20%;">Task</th>
                <th style="width: 10%;">Action</th>
            </tr>
            <?php
            include "connetion.php";
            $sql = "SELECT * FROM todo WHERE userName='$name';";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            $sr = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $taskId = $row['taskId'];
                    $name = $row['userName'];
                    $taskDate = $row['taskDate'];
                    $taskStatus = $row['taskStatus'];
                    $task = $row['task'];
                    $badgeCss = "badge bg-info";
                    if ($taskStatus == "PENDING") {
                        $badgeCss = "badge bg-danger";
                    }
                    echo "  <tr class='mt-2'>
                <td>$sr</td>
                <td>$name</td>
                <td>$taskDate</td>
                <td><span class='$badgeCss'>$taskStatus<span></td>
                <td>$task</td>
                <td> <button class='btn btn-danger' id='$taskId' onclick='deleteTask(this.id)'>Delete</button></td>
            </tr>";
                    $sr = $sr + 1;
                }
            }
            ?>
        </table>
    </div>


    <script src="js/index.js"></script>
    <script>
        function deleteTask(taskId) {
            // console.log(taskId);
            $.post('allQuery.php', {
                "deleteFlag": "DELETE",
                'taskId': taskId
            }, function(data) {
                // console.log(data);
                document.getElementById("success").innerHTML = "Task Deleted..Page will refresh please wait..";
                location.reload();
            });
        }
    </script>
</body>

</html>