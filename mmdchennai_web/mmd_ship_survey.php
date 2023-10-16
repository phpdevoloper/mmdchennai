<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | Ship Survey & Inspection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?Php include "include/sourcelink_css.php" ?>
</head>

<body>
    <?Php include "include/header.php" ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-1 wow fadeIn" data-wow-delay="0.1s">

    </div>
    <!-- Page Header End -->
    <div class="container-fluid breadcrum_bg">
        <div class=" py-1 px-5">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb breadcrumb_font justify-content-right mb-0">
                    <li class="breadcrumb-item "><a class="" href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a class="" href="#">Services</a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">Ship Survey & Inspection</a></li>
                </ol>
            </nav>
        </div>
        <!-- <div class="py-1 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Subordinate Offices </h1>
            </div>
        </div> -->
    </div>
    <div class="container-fluid main_title">
        <div class=" py-3 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Ship Survey & Inspection </h1>
            </div>
        </div>
    </div>



    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-1">
        <div class="py-3 px-5">
            <div class="row g-5">
                <div class="aboutus-section">
                    <div class="">
                        <div class="row">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="aboutus">
                                    <h2 class="aboutus-title">About Us</h2>
                                    <p class="aboutus-text">The Mercantile Marine Department, Chennai was set up in 1929 to implement the first SOLAS Convention and Load Line Conventions. This Department was working directly under the Ministry till the establishment of the Directorate General of Shipping at Mumbai in 1949 This department revise powers under section 8 of the Merchant Shipping Act, 1958.</p>
                                    
                                </div>
                            </div> -->

                            <div class="col-md-9 col-sm-6 col-xs-12">
                             <div class="row">
                                <div id="get_services">
                                </div>
                             </div>

                            </div>
                            <div class="col-lg-3 administration_sticky">
                                <div class=" sticky_text">
                                    <nav id="admin-quick" class="">
                                        <div class="adminquick-menu " style="padding-top:10px;">
                                            <div id="navbarSupportedContent">

                                                <div class="seven">
                                                    <h1 class="text-center">Ship Survey & Inspection</h1>
                                                </div>

                                                <ul class="quick-1st">
                                                    <!-- <?php //while ($row = pg_fetch_array($result_administration)) { ?>
                                                        <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#<?php //echo $row['lang_mas_id'] ?>"><?php echo $row['lang_title'] ?></a></li>
                                                    <?php //    } ?> -->
                                                    <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#" onclick="get_data(2,1)"> For Whom </a></li>
                                                    <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#" onclick="get_data(2,2)">Fees</a></li>
                                                    <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#" onclick="get_data(2,3)"> Supporting Documents </a></li>
                                                    <!-- <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#category-04">Awards & Honors</a></li> -->
                                                    <!-- <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#portfolio">Publications</a></li> -->

                                                </ul>

                                            </div>
                                        </div>

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <?Php include "include/bottom_footer.php";
    include "include/sourcelink_js.php"
    ?>
</body>

</html>
<script>
     $(document).ready(function() {
        get_data(2,1);
        $('.data-table').DataTable();
    });
    $(window).on('scroll load', function(e) {
        var nowScrollTop = $(window).scrollTop(),
            nowScrollLeft = $(window).scrollLeft();
        quickMenuSelect(nowScrollTop);
    });

    var quickClickTF = false,
        quickOnClass = 'active';
    var inViewCheck = function(el) {
        var _this = el;
        var elementTop = _this.offset().top + ($(window).height() / 2);
        var elementBottom = elementTop + _this.outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    var quickMenuSelect = function(st) {
        var scrollTop = st;
        var elQuick1stLi = '.quick-1st > li';
        if (quickClickTF) return;
        if (!scrollTop) {
            $(elQuick1stLi).removeClass(quickOnClass).eq(0).addClass(quickOnClass);
        } else {
            $(elQuick1stLi).each(function(i, el) {
                var _this = $(el);
                var elSections = _this.children('a').attr('href');
                if (inViewCheck($(elSections))) {
                    $(elQuick1stLi).removeClass(quickOnClass);
                    _this.addClass(quickOnClass);
                }
            });
        }
    };

    $('.quick-menu li > a').on('click', function(e) {
        e.preventDefault();
        var quickClickTime;
        var thisIndex = $(this).parent('li').index();
        var toGoTop = (thisIndex != 0) ? $($(this).attr('href')).offset().top - $('#header').outerHeight() : 0;
        $(this).parent('li').addClass(quickOnClass).siblings('li').removeClass(quickOnClass);
        $('html, body').animate({
            scrollTop: toGoTop
        }, 250);
        quickClickTF = true;
        clearTimeout(quickClickTime);
        quickClickTime = setTimeout(function() {
            quickClickTF = false
        }, 300);
    });

    function get_data(service_id, category) {
        data = {
            service_id: service_id,
            category: category
        }

        // console.log(editdata[0].edit);
        $.ajax({
            type: 'POST',
            // contentType: "application/json",
            // dataType: "json",
            url: 'webservice/get_service.php',
            data: data,
            success: function(response, textStatus, xhr) {
                $('#get_services').html(response);
            },
            complete: function(xhr) {

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                var response = XMLHttpRequest;
                swal("Error !", "Please try again", "error");

            }
        });
    }
</script>