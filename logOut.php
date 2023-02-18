<?php
session_start();
// if (isset($_SESSION["userName"])) {
//     // unset($_SESSION["userName"]);
//     unset( $_SESSION["login"]);
//     header("Location:index.php");
// }else{
//     header("Location:index.php");
// }
   session_destroy();
   header("Location:index.php");
?>