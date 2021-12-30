<?php

   require_once 'koneksi.php';
   require_once 'fungsi.php';

   $kode = $_GET["kode"];

   // cek apakah data berhasil dihapus
   if (hapus($kode) > 0) {
      echo "
               <script>
                  alert('Data berhasil dihapus!');
                  document.location.href = 'index.php';
               </script>
         ";
   } else {
      echo "
               <script>
                  alert('Data gagal dihapus! :(');
                  document.location.href = 'index.php';
               </script>
         ";
   }

?>