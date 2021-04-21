   </div>
      </div>
         <footer id="footer">
            <div class="footer-copyright text-center">
               ©Copyright : Agus Prasetyo
            </div>
         </footer>
      </div>
   </body>
   
   <script src="../../vendors/jquery/jquery.min.js"></script>
   <script src="../../vendors/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../vendors/select2/js/select2.min.js"></script>

   <?php
      // untuk javascript yg ditampilkan sesuai menu
      if ($menu == null) {
         echo '<script src="../../dist/js/dashboard/index.js"></script>';
      } else if ($menu == 'bio') {
         echo '<script src="../../dist/js/biodata/index.js"></script>';
      } else if ($menu == 'profil') {
         echo '<script src="../../dist/js/profil/index.js"></script>';
      } else if ($menu == 'daftar-pesan') { 
         echo '<script src="../../dist/js/daftar-pesan/index.js"></script>';
      }
   ?>
</html>