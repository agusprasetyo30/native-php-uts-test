<?php
   require(__DIR__ . "/../koneksi/koneksi.php");

   class daftarPesan extends koneksi {
      
      public $previous;
      public $next;
      public $total_halaman;
      public $nomer;
      public $halaman_current;

      /**
       * Undocumented function
       *
       * @return string
       */
      function getUrl() : string
      {
         
         $fileDirectory = $this->getUrlBase() . "/resource/daftar-pesan/" ;
         
         return $fileDirectory;
      }

      /**
       * Undocumented function
       *
       * @param [int] $batasTampil
       * @param [string] $query
       * @return object
       */
      function pagination($batasTampil, $query) : object
      {
         $halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
         $halaman_awal = ($halaman > 1) ? ($halaman * $batasTampil) - $batasTampil : 0;
         
         $this->halaman_current = $halaman_awal;

         $this->previous = $halaman - 1;
         $this->next = $halaman + 1;

         $data = mysqli_query($this->koneksi, $query);
         $jml_data = mysqli_num_rows($data);
         $this->total_halaman = ceil($jml_data / $batasTampil);
         
         $data_pagination = mysqli_query($this->koneksi, $query . ' limit ' . $halaman_awal . ', ' . $batasTampil);
         
         $this->nomer = 1 + $halaman_awal;

         return $data_pagination;
      }

      /**
       * Undocumented function
       *
       * @return integer
       */
      function getNomer() : int
      {
         return (int)$this->nomer++;
      }

      /**
       * Undocumented function
       *
       * @param [type] $menu
       * @return string
       */
      function paginationNumber($menu = null) : string 
      {
         $link_previous = '';
         $number_link = '';
         $link_next = '';

         // Untuk tombol previous
         if ($this->halaman_current > 1) {
            $link_previous = "href='?menu=" . $menu . "&page=$this->previous'";
         }

         // Untuk tombol next
         if ($this->halaman_current < $this->total_halaman) {
            $link_next = "href='?menu=" . $menu . "&page=$this->next'";
         }

         $previous = "<nav>" .
            "<ul class='pagination justify-content-center'><li class='page-item'>" .
            "<a class='page-link'" . $link_previous . ">Previous</a>";
            

         for ($i=1; $i <= $this->total_halaman; $i++) { 
            $number_link .= "<li class='page-item'><a class='page-link' href='?menu=" . $menu . "&page=" . $i . "'>" . $i . "</a></li>";
         }
            
         $next = "<li class='page-item'> <a class='page-link'" . $link_next . ">Next</a>";

         // Menggabungkan semua perintah
         return $previous . $number_link . $next;
      }

      /**
       * Undocumented function
       *
       * @return array
       */
      function getMakanan() : array 
      {
         $query = "SELECT * FROM makanan";

         $arr = $this->query($query);

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