<?php
   ini_set('display_errors', 1);

   include (__DIR__ . '/../../app/data/daftarPesan.php');
   $daftarPesan = new daftarPesan();

   // echo __DIR__
   // print_r($daftarPesan->getUrl());
?>

<div class="row mt-3">
   <div class="col-md-4">
      <div class="row">
         <div class="col-md-6">
            <a href="?menu=daftar-pesan" style="text-decoration: none;">
               <div class="card">
                  <div class="card-body tombol-tambah">
                     Daftar Customer
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6">
            <a href="<?= $daftarPesan->getUrl() ?>tambah-makanan.php?menu=daftar-pesan" style="text-decoration: none;">
               <div class="card">
                  <div class="card-body tombol-tambah" >
                     Tambah Makanan
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>


<!-- <div class="container text-center">
   <div class="center">
      <p>Ini halaman <b>Daftar Pesanan</b></p>
   </div>
</div> -->