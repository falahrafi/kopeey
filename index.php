<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kopeey – Jelajahi Nusantara Dengan Kopi</title>
   <link href="libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="styles/main.css" rel="stylesheet">
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

   <section class="kopeey-hero">
      <div class="container">
         <div class="row">
            <div class="col-lg-5 mt-5">
               <h1 class="hero-title mb-4 mt-3">
                  Jelajahi Nusantara Dengan Kopi
               </h1>
               <p class="hero-paragraph mb-5">
                  Menyediakan beragam jenis biji kopi dari seluruh Indonesia. Temukan kopeey yang sesuai dengan seleramu sekarang!
               </p>
               <a href="#categories" class="btn btn-beli-sekarang px-4" role="button">
                  Beli Sekarang &nbsp;
                  <i class="fas fa-long-arrow-alt-right"></i>
               </a>
            </div>

            <div class="col-lg-7">
               <img src="assets/images/hero-image.png" alt="" class="hero-image img-fluid">
               <div class="hero-glass"></div>
            </div>
         </div>
      </div>
   </section>

   <section class="categories" id="categories">
      <div class="container">
         <div class="row gx-0 justify-content-center">

            <div class="col-lg-2 col-md-3 col-sm-5 col-8 mb-4">
               <label class="category-container">
                  <input type="radio" name="coffee-category" value="all" id="category-semua" checked>
                  <div class="btn btn-categories px-4 py-2">
                     Semua
                  </div>
               </label>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-5 col-8 mb-4">
               <label class="category-container">
                  <input type="radio" name="coffee-category" value="arabica" id="category-arabica">
                  <div class="btn btn-categories px-4 py-2">
                     Arabica
                  </div>
               </label>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-5 col-8 mb-4">
               <label class="category-container">
                  <input type="radio" name="coffee-category" value="liberica" id="category-liberica">
                  <div class="btn btn-categories px-4 py-2">
                     Liberica
                  </div>
               </label>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-5 col-8 mb-4">
               <label class="category-container">
                  <input type="radio" name="coffee-category" value="robusta" id="category-robusta">
                  <div class="btn btn-categories px-4 py-2">
                     Robusta
                  </div>
               </label>
            </div>

         </div>
      </div>
   </section>

   <section class="products">
      <div class="container">
         <div class="row gx-xl-5 gx-lg-4" id="product-catalogues">

            <!-- Akan diisi menggunakan AJAX -->

         </div>
      </div>
   </section>

   <section class="footer">
      <div class="container">
         <div class="row gx-sm-5">
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
   
   <script type="text/javascript" src="libraries/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="libraries/vanilla-tilt.js"></script>
   <script type="text/javascript" src="scripts/tilt-effect.js"></script>
   <script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
   <script src="scripts/ajax-categories.js"></script>
</body>
</html>