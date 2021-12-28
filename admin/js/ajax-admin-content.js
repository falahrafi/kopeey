$(document).ready(function(){
   
   // Saat file pertama kali di-load
   $('.isi-konten-admin').load('pages/data-produk.php');
   $('li').removeClass('active');
   $('#menuProduk').addClass('active');

   // Menggunakan Sidebar

   var url = window.location.href;
   url = url.split("#");
   var sidebarMenu = url.at(1);

   $('#sidebarDataProduk').click(function(){
      $('.isi-konten-admin').load('pages/data-produk.php');
      window.location.href = "#produk";
      if (sidebarMenu != 'produk') {
         window.location.reload();
      }
   });

   $('#sidebarTambahProduk').click(function(){
      $('.isi-konten-admin').load('pages/tambah-produk.php');
      window.location.href = "#produk";
      if (sidebarMenu != 'produk') {
         window.location.reload();
      }
   });

   $('#sidebarDataGambar').click(function(){
      $('.isi-konten-admin').load('pages/data-gambar.php');
      window.location.href = "#gambar";
      if (sidebarMenu != 'gambar') {
         window.location.reload();
      }
   });

   $('#sidebarTambahGambar').click(function(){
      $('.isi-konten-admin').load('pages/tambah-gambar.php');
      window.location.href = "#gambar";
      if (sidebarMenu != 'gambar') {
         window.location.reload();
      }
   });


   // Mengatur menu yang aktif
   if(sidebarMenu == 'produk') {
      $('.isi-konten-admin').load('pages/data-produk.php');
      $('li').removeClass('active');
      $('#menuProduk').addClass('active');
   } else if (sidebarMenu == 'gambar') {
      $('.isi-konten-admin').load('pages/data-gambar.php');
      $('li').removeClass('active');
      $('#menuGambar').addClass('active');
   }

});