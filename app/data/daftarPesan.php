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
       */
      function pagination(int $batasTampil, $query) : object
      {
         $halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
         $this->halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) - $batasTampil : 0;
         // $this->halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) / $batasTampil : 0;
         
         $this->previous = $halaman - 1;
         $this->next = $halaman + 1;

         $data = mysqli_query($this->koneksi, $query);
         $jml_data = mysqli_num_rows($data);
         $this->total_halaman = ceil($jml_data / $batasTampil);
         
         $data_pagination = mysqli_query($this->koneksi, $query . ' limit ' . $this->halaman_current . ', ' . $batasTampil);
         
         $this->nomer = 1 + $this->halaman_current;

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
      
      function getHalamanCurrent() : int
      {
         return $this->halaman_current;
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
            if ($this->next - 1 == $i) {
               $number_link .= "<li class='page-item active'><a class='page-link' href='?menu=" . $menu . "&page=" . $i . "'>" . $i . "</a></li>";
            } else {
               $number_link .= "<li class='page-item'><a class='page-link' href='?menu=" . $menu . "&page=" . $i . "'>" . $i . "</a></li>";
            }
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

      /************* CUSTOMER ************* */

      /**
       * Undocumented function
       *
       * @return string
       */
      function customerIdGenerated() : string
      {
         $get_id = $this->query("SELECT id FROM customer WHERE id IN (SELECT MAX(id) FROM customer)");

         $id_customer = 'CUST-' . ((int)($get_id[0]['id']) + 1);
         
         return $id_customer;
      }

      /**
       * Undocumented function
       *
       * @param [type] $input
       * @return void
       */
      function addCustomerTransaction($input) : bool
      {
         $id_customer = $input['id_customer'];
         $nama = $input['name'];
         $status = $input['status'];
         $pesan_makanan = $input['pesan_makanan'];

         $query_customer = "INSERT INTO customer (`id`, `id_customer`, `nama`, `status`) VALUES (NULL, '$id_customer', '$nama', '$status')";

         mysqli_query($this->koneksi, $query_customer);
         
         // $insert_id = mysqli_insert_id($this->koneksi);

         // echo $insert_id;
         // for ($i=0; $i < count($pesan_makanan) ; $i++) {
         //    $query_pesanan = "INSERT INTO pesanan ('id', 'id_customer', 'id_makanan') VALUES(NULL, '$insert_id', '$pesan_makanan[$i]')";
         //    mysqli_query($this->koneksi, $query_pesanan);
         // }

         // if (mysqli_affected_rows($this->koneksi)) {
         //    echo "berhasil hore";
            
         //    print_r($pesan_makanan);
         // } else {
         //    mysqli_error($this->koneksi);
         // }

         return mysqli_affected_rows($this->koneksi);
      }

      function ruleDiscount($status)
      {
         if ($status) {
            # code...
         }
      }
   }
?>