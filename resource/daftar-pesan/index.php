<?php
   ini_set('display_errors', 1);
   require (__DIR__ . '/../../app/data/daftarPesan.php');
   $daftarPesan = new daftarPesan();
   
   // print_r($daftarPesan->getUrl());
?>

<div class="row mt-3">
   <div class="col-md-4">
      <div class="row">
         <div class="col-md-6">
            <a href="">
               <div class="card">
                  <div class="card-body text-center">
                     Daftar Customer
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6">
            <a href="">
               <div class="card">
                  <div class="card-body text-center">
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