<?php 

   require_once '../../../connection.php';

   // Mengambil data dari input user
   $coffeeID = htmlspecialchars($_POST["coffee_id"]);
   $imageType = htmlspecialchars($_POST["type"]);


   if($imageType == "main") {

      error_reporting(0);

      $sqlTypeMain = "SELECT id FROM galleries WHERE EXISTS(SELECT * FROM galleries WHERE coffee_id = $coffeeID AND type = 'main') AND type = 'main' AND coffee_id = $coffeeID";
      $resultTypeMain = mysqli_query($conn, $sqlTypeMain);

      $rowsTypeMain = [];
      while($rowTypeMain = mysqli_fetch_assoc($resultTypeMain)){
         $rowsTypeMain[] = $rowTypeMain;
      }

      $idTypeMain = $rowsTypeMain[0]["id"];

      if(isset($rowsTypeMain[0]["id"])) {
         $queryUpdateMain = "UPDATE galleries SET type = 'gallery' WHERE id = $idTypeMain";
         mysqli_query($conn, $queryUpdateMain);
      }

   }


   // Generate nama file baru
   $imageNameNew = uniqid() . ".png";
   $imagePathNew = "assets/uploads/" . $imageNameNew;

   // Upload file ke directory
   $tmpName = $_FILES["image"]["tmp_name"];
   move_uploaded_file($tmpName, "../../../" . $imagePathNew);


   $query = "INSERT INTO galleries VALUES ('', '$imagePathNew', '$imageType', $coffeeID)";

   mysqli_query($conn, $query);

   echo "
         <script>
               document.location.href = '../../index.php#gambar';
         </script>
      ";

?>