<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Pilih Penerima", // Placeholder untuk dropdown
      allowClear: true // Menambahkan opsi untuk menghapus pilihan
    });
  });
</script>
<!-- Vendor JS Files -->
<script src="<?= base_url('vendor/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/chart.js/chart.umd.js') ?>"></script>
<script src="<?= base_url('vendor/echarts/echarts.min.js') ?>"></script>
<script src="<?= base_url('vendor/quill/quill.min.js') ?>"></script>
<script src="<?= base_url('vendor/simple-datatables/simple-datatables.js') ?>"></script>
<script src="<?= base_url('vendor/tinymce/tinymce.min.js') ?>"></script>
<script src="<?= base_url('vendor/php-email-form/validate.js') ?>"></script>


<!-- Template Main JS File -->
<script src="<?= base_url('js/main.js') ?>"></script>

</body>

</html>