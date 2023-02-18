<?php
// $hostname='localhost';
// $username='root';
// $password='yogita@84';
// $db='form';
$hostname='31.220.110.201';
$username='u964538868_testForStudy';
$password='JainamJain@12345678';
$db='u964538868_testForStudy';

// $hostname='	sql111.epizy.com';
// $username='epiz_30826116';
// $password='H6hTvsgXdsZ';
// $db='epiz_30826116_contact';
$conn=new mysqli($hostname,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
  //  echo "Successfuly conected";
}

?>
