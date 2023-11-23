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
  <script src="lib/isotope-docs/js/isotope-docs.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap5.min.js"></script>
  <script src="js/fontresize.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/glightbox.min.js"></script>
  <script src="js/swiper-bundle.min.js"></script>
  <!-- Include Isotope from CDN -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script> -->
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

    $(".external_link").on("click", function(e) {
      swal_title = 'MMDChennai';
      swal_text = 'You are being redirected to an external website. Please note that Mercantile Marine Department,Chennai cannot be held responsible for external websites content & privacy policies.';
      e.preventDefault();
      var getURL_en = this.href;
      swal({
              title: swal_title,
              text: swal_text,
              confirmButtonText: "Ok",
              showCancelButton: true,
              confirmButtonColor: "#041e42",
              cancelButtonColor: "#DD6B55",

          },
          function(isConfirm) {
              if (isConfirm) {
                  window.open(getURL_en);
              }
          }
      )
      });

  </script>