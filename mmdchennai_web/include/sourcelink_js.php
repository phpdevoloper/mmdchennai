  <!-- JavaScript Libraries -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="js/slick/slick.js"></script>
  <script src="js/ionicons.min.js"></script>
  <script src="js/ionicons/ionicons.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap5.min.js"></script>
  <script src="js/fontresize.js"></script>
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