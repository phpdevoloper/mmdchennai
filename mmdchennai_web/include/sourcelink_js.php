  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="js/slick/slick.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.2/esm/ionicons.min.js" integrity="sha512-2ySmquu6HK3CAvwLllh0R8K8buFPMZsUwWLZIlB7WW8c8ilUtoNyhsmEsQn2U0IV1USr2Oc/9DJzlr4cxAbuxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.2/ionicons.min.js" integrity="sha512-8O7VIjJxO2P/Vfm34bYnEbPwocNkwUQdzJCYooCDWP9MT4GpPw5Ktmk9NxVyWfrzDlXnbCsZzSUR81Etc6gv0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <!-- Template Javascript -->
  <!-- <script src="lib/scripts/core.js"></script>
	<script src="lib/scripts/script.min.js"></script>
	<script src="lib/scripts/process.js"></script>
	<script src="lib/scripts/layout-settings.js"></script>
  <script src="lib/datatables/js/jquery.dataTables.min.js"></script>
  <script src="lib/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="lib/datatables/js/dataTables.responsive.min.js"></script>
  <script src="lib/datatables/js/responsive.bootstrap4.min.js"></script>

  <script src="lib/datatables/js/dataTables.buttons.min.js"></script>
  <script src="lib/datatables/js/buttons.bootstrap4.min.js"></script>
  <script src="lib/datatables/js/buttons.print.min.js"></script>
  <script src="lib/datatables/js/buttons.html5.min.js"></script>
  <script src="lib/datatables/js/buttons.flash.min.js"></script>
  <script src="lib/datatables/js/pdfmake.min.js"></script>
  <script src="lib/datatables/js/vfs_fonts.js"></script>

  <script src="vendors/scripts/datatable-setting.js"></script> -->

  <script src="js/main.js"></script>
  <script>
    (function($) {

      $('#search-button').on('click', function(e) {
        if ($('#search-input-container').hasClass('hdn')) {
          e.preventDefault();
          $('#search-input-container').removeClass('hdn')
          return false;
        }
      });

      $('#hide-search-input-container').on('click', function(e) {
        e.preventDefault();
        $('#search-input-container').addClass('hdn')
        return false;
      });

    })(jQuery);

 function google_search() {

        var search_value = $('#txt_search').val();

        if (search_value != '') {
            document.location.href = 'niot_gcse_home.php#gsc.q=' + search_value + '';
        } else {
            toastr.error('Search value is mandatory!');
        }

    }
  </script>