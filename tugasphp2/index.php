<?php 

   function info_nim($nim){

      $kode_angkatan = substr($nim, 0, 2);
      $kode_fakultas = substr($nim, 3, 2);
      $kode_prodi = substr($nim, 6, 2);
      $nomor_urut = substr($nim, 9, 4);

      // Menentukan Jumlah Karakter NIM
      $jml_karakter = strlen($nim);

      // Menentukan Tahun Angkatan
      $tahun_angkatan = "20" . $kode_angkatan;

      // Menentukan Fakultas dan Program Studi
      switch($kode_fakultas){
         
         case "01":
            $fakultas = "Fakultas Teknologi Informasi";
            switch($kode_prodi){
               case "31":
                  $prodi = "Manajemen Informatika - D3";
                  break;
               case "53":
                  $prodi = "Teknik Informatika - S1";
                  break;
               case "55":
                  $prodi = "Sistem Informasi - S1";
                  break;
               default:
                  $prodi = "-";
            }
            break;

         case "02":
            $fakultas = "Fakultas Hukum";
            switch($kode_prodi){
               case "51":
                  $prodi = "Ilmu Hukum - S1";
                  break;
               default:
                  $prodi = "-";
            }
            break;

         case "03":
            $fakultas = "Fakultas Bahasa dan Ilmu Budaya";
            switch($kode_prodi){
               case "52":
                  $prodi = "Sastra Inggris - S1";
                  break;
               default:
                  $prodi = "-";
            }
            break;

         case "04":
            $fakultas = "Fakultas Teknik";
            switch($kode_prodi){
               case "51":
                  $prodi = "Teknik Industri - S1";
                  break;
               default:
                  $prodi = "-";
            }
            break;
            
         case "05":
            $fakultas = "Fakultas Ekonomika dan Bisnis";
            switch($kode_prodi){
               case "51":
                  $prodi = "Manajemen - S1";
                  break;
               case "52":
                  $prodi = "Akuntansi - S1";
                  break;
               case "34":
                  $prodi = "Keuangan Dan Perbankan";
                  break;
               default:
                  $prodi = "-";
            }
            break;

         case "06":
            $fakultas = "Fakultas Pariwisata";
            switch($kode_prodi){
               case "32":
                  $prodi = "Perhotelan - D3";
                  break;
               default:
                  $prodi = "-";
            }
            break;
            
         default:
            $fakultas = "-";
            $prodi = "-";
      }

      $informasi_nim = "
         <h2>NIM : " . $nim . "</h2>
         <table>
            <tr>
               <td>Jumlah Karakter</td>
               <td> : " . $jml_karakter . " karakter.</td>
            </tr>
            <tr>
               <td>Tahun Angkatan</td>
               <td> : " . $tahun_angkatan . "</td>
            </tr>
            <tr>
               <td>Program Studi</td>
               <td> : " . $prodi . "</td>
            </tr>
            <tr>
               <td>Fakultas</td>
               <td> : " . $fakultas . "</td>
            </tr>
         </table>
      ";
      
      return $informasi_nim;
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tugas PHP 2</title>
</head>
<body>

   <hr>

   <form method="post" action="">
      <label for="nim">Masukkan NIM : </label>
      <input type="text" name="nim" id="nim" placeholder="Contoh : 20.01.53.0033">
      <br>
      <button type="submit">Submit</button>
   </form>
   
   <hr>

   <?php 
      
      if(isset($_POST['nim'])){
         echo info_nim($_POST['nim']);
      }

   ?>

</body>
</html>