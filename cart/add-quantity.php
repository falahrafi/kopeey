<?php 

      require_once '../connection.php';

      $weights = htmlspecialchars($_POST["weights"]);
      $grindLevel = htmlspecialchars($_POST["grind_level"]);
      $coffeeID = htmlspecialchars($_POST["coffee_id"]);

      $query = "INSERT INTO carts
                  VALUES
                  ('', '$weights', '$grindLevel', '$coffeeID')
            ";

      mysqli_query($conn, $query);
      
      echo json_encode(array("coba" => "Hello"));
?>