

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Sweet Alert -->
  <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php 
  $dataSession = $session->get('statusTambah');
  $dataKeterangan = $session->get('keterangan');
  if($dataSession == "Berhasil"){ 
  ?>
  <script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  }else if($dataSession == "Gagal"){
  ?>
  <script> swal("Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  } 
  ?>
</body>

</html>