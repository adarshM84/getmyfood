<?php
require_once 'connection.php';

$sql="SELECT(SELECT COUNT(*) FROM orderList) as totalOrder, (SELECT COUNT(*) FROM orderList WHERE orderStatus='PENDING') as totalPendingOrder,(SELECT COUNT(*) FROM userAccount ) as totalUser";
$result=mysqli_query($conn,$sql);

$allData='';
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $allData=$row['totalOrder'].':::'.$row['totalPendingOrder'].':::'.$row['totalUser'];    
    }
}
echo $allData;
?>