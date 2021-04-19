<?php
   require(__DIR__ . "/../koneksi/koneksi.php");

   class daftarPesan extends koneksi {

      /**
       * Undocumented function
       *
       * @return string
       */
      function getUrl() : string
      {
         
         $fileDirectory = $this->getUrlBase() . "/resource/daftar-pesan/" ;
         
         return $fileDirectory;
         // $query = $this->query("SELECT * FROM customer");

         // return $query;

         // echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      }

      /**
       * Undocumented function
       *
       * @return array
       */
      function getMakanan() : array 
      {
         $query = "SELECT * FROM makanan";

         $a = ["abc" => "mencoba push"];
         $arr = $this->query($query);

         array_push($this->query($query)[0], $a);

         return $arr;
      }

      /**
       * untuk menambahkan makanan
       *
       * @param [type] $input
       * @return boolean
       */
      function addMakanan($input) : bool 
      {
         $name = $input['name'];
         $price = $input['price'];

         $query = "INSERT INTO makanan VALUES (NULL, '$name', '$price')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi) ? mysqli_affected_rows($this->koneksi) : FALSE;
         // return false;
      }
   }
?>