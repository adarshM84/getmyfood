<?php
session_start();
require "connection.php";

if(isset($_POST['emailId'])){
    $email=$_POST['emailId'];
    $pass=$_POST['pass'];

    $sql="SELECT * FROM login WHERE name='$email' AND password='$pass';";
    // echo $sql;
    // '851840291', 'Adarsh Mishra', 'adarshmishra812003@gmail.com', 'Subashnagar kariwali road bhiwandi', '1234', '9049194868'

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["login"]='admin';
            $_SESSION["userName"]=$row['name'];
        }
    }else{
        echo "error";
    }
  
    // header('Location: ' . $page);
    die();
}else{
    echo "Error";
}
