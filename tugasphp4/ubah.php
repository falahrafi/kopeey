<?php 

   require_once 'koneksi.php';
   require_once 'fungsi.php';

   $kodeOld = $_GET["kode"];

   // Tampilkan Produk Lama
   $queryOld = "SELECT kode, nama, harga FROM produk WHERE kode='" . $kodeOld . "'";
   $productOld = tampil($queryOld)[0];

   if(isset($_POST["submit"])){

      // Tampil
      $query = "SELECT kode, nama, harga FROM produk WHERE kode='" . $_POST["kode"] . "'";
      $product = tampil($query);

      // Mengecek apakah kode sudah dimiliki produk lain atau belum
      // Dan apakah kode diubah atau tidak
      // Karena kode produk harus unique
      if($product && $kodeOld != $_POST["kode"]){
         echo "
               <script>
                  alert('Kode sudah dimiliki oleh produk lain!');
                  document.location.href = 'ubah.php?kode=$kodeOld';
               </script>
         ";
         die();
      }

      // cek apakah data berhasil ditambahkan
      if (ubah($_POST) > 0) {
         echo "
               <script>
                  alert('Data berhasil diubah!');
                  document.location.href = 'index.php';
               </script>
         ";
      } else {
         echo "
               <script>
                  alert('Data gagal diubah! :(');
                  document.location.href = 'index.php';
               </script>
         ";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tugas PHP 4 - Ubah Data</title>
</head>
<body>

   <h1>Ubah Data Produk</h1>

   <form action="" method="POST">

      <table>
         <tr>
            <td>
               <label for="kode">Kode</label>
            </td>
            <td>:</td>
            <td>
               <input type="text" name="kode" id="kode" value="<?= $productOld["kode"] ?>" size="40">
            </td>
         </tr>
         <tr>
            <td>
               <label for="nama">Nama</label>
            </td>
            <td>:</td>
            <td>
               <input type="text" name="nama" id="nama" value="<?= $productOld["nama"] ?>" size="40">
            </td>
         </tr>
         <tr>
            <td>
               <label for="harga">Harga</label>
            </td>
            <td>:</td>
            <td>
               <input type="number" name="harga" id="harga" value="<?= $productOld["harga"] ?>">
            </td>
         </tr>
      </table>

      <br>
      <input type="submit" name="submit" value="Ubah">

   </form>

</body>
</html>