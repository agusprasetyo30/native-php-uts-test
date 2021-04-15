<?php
   class koneksi {

      /**
       * Konstruktor Koneksi
       */
      function __construct()
      {
         $hostname   = 'localhost';
         $username   = 'root';
         $password   = 'gokpras123';
         $database   = 'kasir_sederhana';

         $this->koneksi = mysqli_connect($hostname, $username, $password, $database);
      }

      /**
       * fungsi untuk menampilkan data select dengan cara memasukan query ke dalam parameter
       *
       * @param [String] $query
       * @return array
       */
      function query($query) : array
      {
         $result = mysqli_query($this->koneksi, $query);
         $rows = [];
         while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
         }
         return $rows;
      }
   }
   
?>