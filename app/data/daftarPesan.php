<?php
   require(__DIR__ . "/../koneksi/koneksi.php");

   class daftarPesan extends koneksi {
      
      function getUrl()
      {
         // $query = $this->query("SELECT * FROM customer");

         // return $query;

         echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      }

   }
?>