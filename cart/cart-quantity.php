<?php 

   $sql = "SELECT COUNT(id) AS 'quantity' FROM `carts`";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }

   $cartQuantityAll = $rows[0]['quantity'];

?>