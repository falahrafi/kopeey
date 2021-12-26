<?php 

   require_once '../connection.php';

   $weights = htmlspecialchars($_POST["weights"]);
   $grindLevel = htmlspecialchars($_POST["grind_level"]);
   $coffeeID = htmlspecialchars($_GET["id"]);

   $query = "INSERT INTO carts
               VALUES
               ('', '$weights', '$grindLevel', '$coffeeID')
         ";

   mysqli_query($conn, $query);

   echo "
            <script>
                document.location.href = '../cart';
            </script>
        ";

?>