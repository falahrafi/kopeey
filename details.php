<?php 

   require_once 'connection.php';

   $coffeeID = $_GET["id"];

   $sql = "SELECT coffees.id AS 'coffeeID', coffees.name, coffees.category, coffees.price,
                   coffees.description, galleries.image, galleries.type
            FROM coffees INNER JOIN galleries ON coffees.id = galleries.coffee_id
            WHERE coffees.id = $coffeeID;";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
   $coffee = $rows[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?= $coffee["category"] . " " . $coffee["name"] . " – Kopeey"; ?>
   </title>
   <link href="libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="styles/main.css" rel="stylesheet">
   <link href="styles/about.css" rel="stylesheet">
   <link href="styles/product-detail.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
   
   <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container py-4">
         <a class="navbar-brand" href="index.php">
            <img src="assets/images/kopeey-logo-text-light.png" alt="" height="42">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 kopeey-menu">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <section class="product-detail">
      <div class="container">
         <div class="row product-detail-card justify-content-center align-items-center">
            
            <div class="col-lg-6 product-detail-image-container">
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner text-center">

                     <?php foreach ($rows as $row): ?>
                        
                     <div class="carousel-item <?php if($row['type'] == 'main'){ echo 'active'; } ?>">
                        <img
                           src="<?= $row['image']; ?>"
                           class="product-detail-image"
                           alt=""
                        >
                     </div>

                     <?php endforeach; ?>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                     <i class="fas fa-chevron-left"></i>
                     <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                     <i class="fas fa-chevron-right"></i>
                     <span class="visually-hidden">Next</span>
                  </button>
                  </div>
            </div>

            <div class="col-lg-6 product-info">
               <form class="row gx-0">
                  <div class="col-12 mb-2">
                     <div class="btn product-info-category mb-1">
                        <?= $coffee['category']; ?>
                     </div>
                  </div>

                  <div class="col-12 mb-2">
                     <h2>
                        <?= $coffee['name']; ?>
                     </h2>
                  </div>

                  <div class="col-12 mb-5">
                     <div class="product-info-price">
                        <?= "Rp. " . number_format($coffee['price'],0,',','.'); ?>
                        <span> / 250 gr</span>
                     </div>
                  </div>

                  <!-- Label Berat -->
                  <div class="col-12 mb-2">
                     <h4>Berat</h4>
                  </div>

                  <!-- Pilihan Berat -->
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="product-weights" checked>
                        <div class="btn btn-options">
                           250 gr
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="product-weights">
                        <div class="btn btn-options">
                           500 gr
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="product-weights">
                        <div class="btn btn-options">
                           1 kg
                        </div>
                     </label>
                  </div>


                  <!-- Label Gilingan -->
                  <div class="col-12 mb-2 mt-5">
                     <h4>Level Gilingan</h4>
                  </div>

                  <!-- Pilihan Gilingan -->
                  <div class="col-lg-4 mb-3 product-info-grind">
                     <label class="options-container">
                        <input type="radio" name="product-grind" checked>
                        <div class="btn btn-options">
                           Fine
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-4 mb-3 product-info-grind">
                     <label class="options-container">
                        <input type="radio" name="product-grind">
                        <div class="btn btn-options">
                           Medium
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-4 mb-3 product-info-grind">
                     <label class="options-container">
                        <input type="radio" name="product-grind">
                        <div class="btn btn-options">
                           Coarse
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-4 product-info-grind">
                     <label class="options-container">
                        <input type="radio" name="product-grind">
                        <div class="btn btn-options">
                           Biji
                        </div>
                     </label>
                  </div>

                  <!-- Label Deskripsi -->
                  <div class="col-12 mb-2 mt-5">
                     <h4>Deskripsi</h4>
                  </div>

                  <!-- Isi Deskripsi -->
                  <div class="col-10">
                     <p>
                        <?= $coffee['description']; ?>
                     </p>
                  </div>

                  <!-- Tombol Masukkan Keranjang -->
                  <div class="col-12 mt-4">
                     <a href="" class="btn btn-beli-sekarang px-4" role="button">
                        <i class="fas fa-cart-plus"></i>
                        &nbsp;Masukkan Keranjang
                     </a>
                  </div>
               </form>
            </div>

         </div>
      </div>
   </section>

   <section class="footer">
      <div class="container">
         <div class="row gx-5">
            <div class="col-md-4 mb-5">
               <img src="assets/images/kopeey-logo-text-light.png" alt="" height="42">
               <p class="hero-paragraph mt-4">
                  Menyediakan beragam jenis biji kopi dari seluruh Indonesia. Temukan kopeey yang sesuai dengan seleramu sekarang!
               </p>
            </div>

            <div class="col-md-2 offset-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Products
               </div>
               <div class="footer-link mb-3">
                  <a href="index.php#category-arabica" id="btn-footer-arabica">Kopi Arabica</a>
               </div>
               <div class="footer-link mb-3">
                  <a href="index.php#category-liberica" id="btn-footer-liberica">Kopi Liberica</a>
               </div>
               <div class="footer-link">
                  <a href="index.php#category-robusta" id="btn-footer-robusta">Kopi Robusta</a>
               </div>
            </div>

            <div class="col-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Company
               </div>
               <div class="footer-link mb-3">
                  <a href="about.php" target="_blank">About Us</a>
               </div>
               <div class="footer-link">
                  <a href="contact.php" target="_blank">Contact Us</a>
               </div>
            </div>

            <div class="col-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Social Media
               </div>
               <div class="footer-link">
                  <a href="https://instagram.com" target="_blank">
                     <i class="fab fa-instagram"></i>
                  </a>
                  <a href="https://facebook.com" target="_blank">
                     <i class="fab fa-facebook"></i>
                  </a>
               </div>
            </div>
         </div>

         <div class="footer-copyright text-center">
            &copy;2021 <span>Muhammad Falah Abdurrafi</span>
         </div>
      </div>
   </section>

   <script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>