<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?= $title ?></title>
      <link rel="stylesheet" href="./vendors/css/bootstrap.min.css">
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