<?php 

      require_once '../connection.php';

      $weights = htmlspecialchars($_POST["weights"]);
      $grindLevel = htmlspecialchars($_POST["grind_level"]);
      $coffeeID = htmlspecialchars($_POST["coffee_id"]);
      $cartID = $_GET['q'];
      $qtyNew = (int) $_GET['qty'];

      // Mengambil data quantity saat ini (sebelum diubah)
      $sql = "SELECT COUNT(id) AS 'qtyOld' FROM `carts` GROUP BY weights, grind_level, coffee_id HAVING MAX(id) = $cartID;";
      $result = mysqli_query($conn, $sql);
      $rows = [];
      while($row = mysqli_fetch_assoc($result)){
         $rows[] = $row;
      }
      $qtyOld = (int) $rows[0]['qtyOld'];

      // Menghitung selisih quantity
      $qtyGap = $qtyNew - $qtyOld;

      // Menentukan apakah selisih negatif atau positif
      // Jika positif maka quantity nantinya akan ditambah
      // Jika negatif maka quantity nantinya akan dikurangi
      if($qtyGap > 0){
         $qtyChange = array("add_remove" => "add", "how_much" => $qtyGap);
      } else if ($qtyGap < 0) {
         $qtyChange = array("add_remove" => "remove", "how_much" => abs($qtyGap));
      }

      $queryAdd = "INSERT INTO carts
                  VALUES
                  ('', '$weights', '$grindLevel', '$coffeeID')
            ";

      $queryRemove = "DELETE FROM carts WHERE weights='$weights'
                        AND grind_level='$grindLevel' AND coffee_id=$coffeeID
                        ORDER BY id DESC LIMIT 1;";


      // Menambah atau mengurangi sebanyak selisih quantity
      if($qtyGap != 0) {
         if ($qtyChange['add_remove'] == "add") {
            for ($i=0; $i < $qtyChange['how_much']; $i++) { 
               mysqli_query($conn, $queryAdd);
            }
         }
         else if ($qtyChange['add_remove'] == "remove") {
            for ($i=0; $i < $qtyChange['how_much']; $i++) { 
               mysqli_query($conn, $queryRemove);
            }
         }
      }

?>