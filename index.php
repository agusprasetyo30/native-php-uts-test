<?php
   $menu = $_GET['menu'];

   // untuk mengatur isi dari $title
   if ($menu == null) {
      $title = 'Dashboard';
   } else if ($menu == 'bio') {
      $title = 'Biodata';
   } else if ($menu == 'profil') {
      $title = 'Profil';      
   } else if ($menu == 'daftar-pesan') { 
      $title = 'Daftar Pesanan';
   }

   // Memanggil file header
   include_once('./layouts/header.php');
   
   // Untuk mengatur menu berdasarkan tampilan
   if ($menu == null) {
      include_once('./resource/dashboard/index.php');
   
   } else if ($menu == 'bio') {
      include_once('./resource/biodata/index.php');

   } else if ($menu == 'profil') {
      include_once('./resource/profil/index.php');
   
   } else if ($menu == 'daftar-pesan') { 
      include_once('./resource/daftar-pesan/index.php');
   
   } else {
      header('location:./layouts/errors.php');
   }

   include_once('./layouts/footer.php');
?>