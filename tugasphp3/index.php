<?php 

   // Program ini saya buat menggunakan konsep OOP

   class Barang {

      public $nama;
      public $harga;
      public $jumlah;

      function __construct($nama, $harga, $jumlah){
         $this->nama = $nama;
         $this->harga = $harga;
         $this->jumlah = $jumlah;
      }

      // Menentukan total biaya sebelum diskon
      function total_awal(){
         return $this->harga * $this->jumlah;
      }

      // Menentukan diskon
      function diskon(){
         if( $this->total_awal() >= 500000){
            $diskon = 0.05 * $this->total_awal();
            return ["nominal" => $diskon, "persen" => "5%"];
         } else {
            return ["nominal" => 0, "persen" => "0%"];
         }
      }

      // Menentukan total biaya setelah diskon
      function total_akhir(){
         return $this->total_awal() - $this->diskon()['nominal'];
      }

   }

   function data_barang($kode, $jumlah){

      switch($kode){

         case 'BOO001':
            $barang_x = new Barang('Buku Atomic Habits James Clear', 108000, $jumlah);
            break;
            
         case 'COF001':
            $barang_x = new Barang('Kopi Aceh Gayo 200g', 85000, $jumlah);
            break;
               
         case 'ELE001':
            $barang_x = new Barang('Kompor Listrik Mini', 84900, $jumlah);
            break;
                  
         case 'ELE002':
            $barang_x = new Barang('Stereo Speaker ROBOT', 93900, $jumlah);
            break;
                     
         case 'FAS001':
            $barang_x = new Barang('Kemeja Formal Coop Design', 129000, $jumlah);
            break;

         case 'FAS002':
            $barang_x = new Barang('Sneakers Casual Prodigo', 189000, $jumlah);
            break;

         default:
            // Mengembalikan 'false' jika kode yang diinput tidak sesuai
            echo "Kode yang anda masukkan tidak tersedia!";
            return false;
      }

      // Mengembalikan objek $barang_x jika kode yang diinput sesuai
      if (isset($barang_x)) {
         return $barang_x;
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tugas PHP 3</title>
</head>
<body>

   <!-- Menampilkan Daftar Barang -->
   <section id="daftarBarang">
      <h1>Daftar Barang</h1>
      <table border="1" cellspacing="0" cellpadding="4">
         <thead>
            <tr>
               <th>Kode</th>
               <th>Nama Barang</th>
               <th>Harga</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>BOO001</td>
               <td>Buku Atomic Habits James Clear</td>
               <td>Rp. 108.000,-</td>
            </tr>
            <tr>
               <td>COF001</td>
               <td>Kopi Aceh Gayo 200g</td>
               <td>Rp. 85.000,-</td>
            </tr>
            <tr>
               <td>ELE001</td>
               <td>Kompor Listrik Mini</td>
               <td>Rp. 84.900,-</td>
            </tr>
            <tr>
               <td>ELE002</td>
               <td>Stereo Speaker ROBOT</td>
               <td>Rp. 93.900,-</td>
            </tr>
            <tr>
               <td>FAS001</td>
               <td>Kemeja Formal Coop Design</td>
               <td>Rp. 129.000,-</td>
            </tr>
            <tr>
               <td>FAS002</td>
               <td>Sneakers Casual Prodigo</td>
               <td>Rp. 189.000,-</td>
            </tr>
         </tbody>
      </table>
   </section>

   <br><hr>

   <!-- Membuat form input untuk pengguna -->
   <section id="inputPengguna">
      <form method="post" action="">
         <table>
            <tr>
               <td>
                  <label for="kode">Masukkan Kode Barang</label>
               </td>
               <td>
                  : <input type="text" name="kode" id="kode">
               </td>
            </tr>
            <tr>
               <td>
                  <label for="jumlah">Masukkan Jumlah Beli</label>
               </td>
               <td>
                  : <input
                        type="number"
                        name="jumlah"
                        id="jumlah"
                        min="1"
                        max="100"
                        value="1"
                     >
               </td>
            </tr>
            <tr>
               <td>
                  <button type="submit" name="checkout">Checkout</button>
               </td>
            </tr>
         </table>
      </form>
   </section>

   <hr>

   <!-- Menampilkan Detail Pembayaran -->
   <section id="pembayaran">
      <?php
         if( isset($_POST['checkout'])):

            $kode_barang = $_POST['kode'];
            $jumlah_beli = $_POST['jumlah'];
            
            if(data_barang($kode_barang, $jumlah_beli) != false):
               $barang = data_barang($kode_barang, $jumlah_beli);
      ?>

      <h1>Detail Pembayaran</h1>

      <table>
         <tr>
            <td>Kode Barang</td>
            <td>: <?= $kode_barang; ?></td>
         </tr>
         <tr>
            <td>Nama Barang</td>
            <td>: <?= $barang->nama; ?></td>
         </tr>
         <tr>
            <td>Jumlah</td>
            <td>: <?= $jumlah_beli; ?></td>
         </tr>
         <tr>
            <td>Harga Satuan</td>
            <td>: Rp. <?= number_format($barang->harga, 0, ",", ".") ?>,-</td>
         </tr>
         <tr>
            <td>Total Per Barang</td>
            <td>: Rp. <?= number_format($barang->total_awal(), 0, ",", ".") ?>,-</td>
         </tr>
         <tr>
            <td>Diskon</td>
            <td> 
               : Rp. <?= number_format($barang->diskon()['nominal'], 0, ",", ".") ?>,-
               <?= " (" . $barang->diskon()['persen'] . ")" ; ?>
            </td>
         </tr>
         <tr>
            <td><b>Total Bayar</b></td>
            <td><b>: Rp. <?= number_format($barang->total_akhir(), 0, ",", ".") ?>,-</b></td>
         </tr>
      </table>

      <?php
            endif;
         endif;
      ?>
   </section>

</body>
</html>