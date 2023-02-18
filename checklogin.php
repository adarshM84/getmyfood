<?php
session_start();
require "connetion.php";

if(isset($_POST['emailId'])){
    $email=$_POST['emailId'];
    $pass=$_POST['pass'];

    $sql="SELECT * FROM userAccount WHERE userEmail='$email' AND userPassword='$pass';";
    // echo $sql;
    // '851840291', 'Adarsh Mishra', 'adarshmishra812003@gmail.com', 'Subashnagar kariwali road bhiwandi', '1234', '9049194868'

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["login"]=2;
            $_SESSION["email"]=$email;
            $_SESSION["pass"]=$pass;
            $_SESSION["userName"]=$row['userName'];
            $_SESSION["userId"]=$row['userId'];
        }
    }else{
        echo "error";
    }
  
    // header('Location: ' . $page);
    die();
}else{
    echo "Error";
}
