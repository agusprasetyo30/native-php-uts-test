<?php
   ini_set('display_errors', 1);

   include (__DIR__ . '/../../app/data/daftarPesan.php');
   $daftarPesan = new daftarPesan();

   // echo __DIR__
   // print_r($daftarPesan->getUrl());
?>

<div class="row mt-3 justify-content-center">
   <div class="col-md-6">
      <div class="row">
         <div class="col-md-6">
            <a href="?menu=daftar-pesan" style="text-decoration: none;">
               <div class="card">
                  <div class="card-body tombol-tambah">
                     Tambah Customer
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
      <br>
      <table class="table table-bordered table-striped table-hover">
         <thead>
            <tr>
               <td width="5%">#</td>
               <td width="20%">ID Customer</td>
               <td width="35%">Nama</td>
               <td width="10%">Status</td>
               <td width="20%">Total</td>
               <td width="10%">Action</td>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>CUS-1</td>
               <td>Melkan</td>
               <td>MEMBER</td>
               <td>Rp. 100000</td>
               <td><a href="#" class="btn btn-sm btn-primary">Show Detail</a></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="col-md-6">
      cfakc
   </div>
</div>