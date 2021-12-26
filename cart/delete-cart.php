<?php 

      require_once '../connection.php';

      $weights = htmlspecialchars($_POST["weights"]);
      $grindLevel = htmlspecialchars($_POST["grind_level"]);
      $coffeeID = htmlspecialchars($_POST["coffee_id"]);

      $query = "DELETE FROM carts WHERE weights='$weights'
                        AND grind_level='$grindLevel' AND coffee_id=$coffeeID";


      mysqli_query($conn, $query);

?>