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
   ?>
   <!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title><?= $title ?></title>
         <link rel="stylesheet" href="./vendors/bootstrap/css/bootstrap.min.css">
         <link rel="stylesheet" href="./dist/css/style.css">
      </head>
      <body>
         <nav class="navbar navbar-expand-md navbar-dark bg-danger">
            <a class="navbar-brand" href="#">Ini Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item <?= $_GET['menu'] ?? 'active' ?>">
                     <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item <?= $_GET['menu'] == 'bio' ? 'active' : '' ?>">
                     <a class="nav-link" href="?menu=bio">Biodata</a>
                  </li>
                  <li class="nav-item <?= $_GET['menu'] == 'profil' ? 'active' : '' ?>">
                     <a class="nav-link" href="./?menu=profil">Profil</a>
                  </li>
                  <li class="nav-item <?= $_GET['menu'] == 'daftar-pesan' ? 'active' : '' ?>">
                     <a class="nav-link" href="./?menu=daftar-pesan">Daftar Pesan</a>
                  </li>
               </ul>
            </div>
         </nav>
         <div id="page-container" >
            <div id="content-wrap">
               <div class="col-md-12">   
                  <?php
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
               ?>
            </div>
         </div>
            <footer id="footer">
               <div class="footer-copyright text-center">
                  ©Copyright : Agus Prasetyo
               </div>
            </footer>
         </div>
      </body>
      
      <script src="./vendors/jquery/jquery.min.js"></script>
      <script src="./vendors/bootstrap/js/bootstrap.min.js"></script>

      <?php
         // untuk javascript yg ditampilkan sesuai menu
         if ($menu == null) {
            echo '<script src="./dist/js/dashboard/index.js"></script>';
         } else if ($menu == 'bio') {
            echo '<script src="./dist/js/biodata/index.js"></script>';
         } else if ($menu == 'profil') {
            echo '<script src="./dist/js/profil/index.js"></script>';
         } else if ($menu == 'daftar-pesan') { 
            echo '<script src="./dist/js/daftar-pesan/index.js"></script>';
         }
      ?>
   </html>