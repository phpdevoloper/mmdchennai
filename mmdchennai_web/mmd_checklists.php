<?php include 'include/db_connection.php';
include 'include/session.php';

$get_dept =
    "select * from mst_checklist_dept where status='L' order by position_order asc";
$result_dept = pg_query($db, $get_dept);
$dept_count = pg_num_rows($result_dept);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | Checklist</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include 'include/sourcelink_css.php'; ?>
</head>

<body>
    <?php include 'include/header.php'; ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-1 wow fadeIn" data-wow-delay="0.1s">

    </div>
    <!-- Page Header End -->
    <div class="container-fluid breadcrum_bg">
        <div class=" py-1 px-5">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb breadcrumb_font justify-content-right mb-0">
                    <li class="breadcrumb-item "><a class="" href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a class="" href="#">Downloads</a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">Checklist</a></li>
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
                <h1 class="justify-content-left">Checklist </h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-4">
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
                                <!-- <h2 class="aboutus-title">Subordinate Offices</h2> -->
                                <?php
                                $get_division = "select * from mst_checklist_dept where status='L' order by position_order asc ";

                                $result_division = pg_query($db, $get_division);
                                $row_division_count = pg_num_rows(
                                    $result_division
                                );

                                if ($row_division_count != 0) {
                                    while (
                                        $row_div = pg_fetch_array(
                                            $result_division
                                        )
                                    ) { ?>

                                        <div class="feature ">
                                      <?Php    
                                       $get_dept_id = $row_div['dept_id'];
                                      $get_contents = "select * from mst_checklist_contents di 
                                            inner join mst_checklist_dept dt on di.mas_dept_id = dt.dept_id
                                            where  di.mas_dept_id =$get_dept_id 
                                            ";
                                
                                            $result_contents = pg_query($db, $get_contents);
                                            $row_contents_count = pg_num_rows(
                                                $result_contents
                                            );
                                            if ($row_contents_count != 0) { ?>
                                            <h4 class="text-center wow fadeInUp" data-wow-delay="0.1s"><?php echo $row_div['title']; ?></h4>
                                            <?Php
                                           
                                            // $get_division_contents = "select * from mst_whoswho_dept dt
                                            // inner join mst_whoswho_division di on dt.dept_id = di.mas_dept_id
                                            // where  dt.status='L' and di.status='L'  order by di.position_order asc ";

                                            // $result_division = pg_query($db, $get_division_contents);
                                            // $row_division_count = pg_num_rows(
                                            //     $result_division
                                            // );
                                          
                                            ?>
                                                <div class="feature-box wow fadeInUp" data-wow-delay="0.1s" id="<?php echo $row_div['dept_id']; ?>">
                                                    <h5 class="wow fadeInUp" data-wow-delay="0.1s"><?Php echo $get_row_con['div_title'] ?></h5>

                                                    <div class="table-responsive">
                                                        <table class="table table-borderd data-table table table-striped table-bordered hover nowrap">
                                                            <thead style="background:#009cff;color:#fff">
                                                                <tr>
                                                                    <th class="table-plus datatable-nosort">S.No</th>
                                                                    <th>Title</th>
                                                                    <th>File / Link</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?Php
                                                                while ($get_row_con = pg_fetch_array($result_contents)) {
                                                                    $media_id = $get_row_con['media_id'];
                                                                    $get_file = "select me.foldername,ms.filesize,ms.alt_filename as filename  from mst_media ms 
                                                                    inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                                                                    where ms.media_id = $media_id";
                                                                    $result_media = pg_query($db, $get_file);
                                                                    $row_media = pg_fetch_array($result_media);
                                                                ?>
                                                                    <tr>
                                                                        <td class="table-plus" data-title="S.No"><?php echo ++$i; ?></td>
                                                                        <td data-title="Title"><?php echo $get_row_con['title'] ?></td>
                                                                        <td data-title="File / Link"><?php
                                                                                                        if ($get_row_con['filename'] != '') {
                                                                                                        ?>
                                                                                <a rel="noopener" href='<?Php echo  $media . $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                                                                            <?php   } else {
                                                                            ?>
                                                                                <a rel="noopener" href='<?php echo $get_row_con['ad_link']; ?>' class="view_btn"> click Here </a><?php
                                                                                                                                                                                }
                                                                                                                                                                                    ?>
                                                                        </td>
                                                                    </tr>
                                                                <?Php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>
                                            <?Php } ?>
                                            <!-- <div class="feature-box wow fadeInUp" data-wow-delay="0.2s" id="category-02">

                                        <div class="clearfix">
                                            <div class="iconset">
                                                <i class="fa fa-cog icon"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h4>Mercantile Marine Department, Tuticorin</h4>
                                                <p>MMD, Tuticorin functions under the administrative control of the Principal Officer, MMD(H.Q.), Chennai for fulfilling the policy task of DGS on safety of ships and personnel onboard and other related Maritime matters. This office is headed by a Surveyor-in-Charge</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feature-box wow fadeInUp" data-wow-delay="0.3s" id="category-03">
                                        <div class="clearfix">
                                            <div class="iconset">
                                                <i class="fa fa-cog icon"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h4>Mercantile Marine Department, Visakhapatnam</h4>
                                                <p>MMD, Visakhapatnam functions under the administrative control of the Principal Officer, MMD (H.Q.), Chennai for fulfilling the policy task of DGS on safety of ships and personnel onboard and other related Maritime matters. This office is headed by a Surveyor-in-Charge</p>
                                            </div>
                                        </div>
                                    </div> -->
                                        </div>
                                <?php  }
                                }
                                ?>
                            </div>
                            <div class="col-lg-3 administration_sticky ">
                                <div class=" sticky_text">
                                    <nav id="admin-quick" class="">
                                        <div class="adminquick-menu section--background" style="padding-top:10px;">
                                            <div id="navbarSupportedContent">
                                                <div class="seven">
                                                    <h1 class="text-center">Checklist</h1>
                                                </div>
                                                <ul class="quick-1st">
                                                    <?php if (
                                                        $dept_count != 0
                                                    ) { ?>
                                                        <?php while (
                                                            $row = pg_fetch_array(
                                                                $result_dept
                                                            )
                                                        ) { ?>
                                                            <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#<?php echo $row['dept_id']; ?>"><?php echo $row['title']; ?></a></li>
                                                    <?php }
                                                    } ?>
                                                    <!-- <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#category-01">MERCANTILE MARINE DEPARTMENT CHENNAI</a></li>
                                                    <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#category-02">MERCANTILE MARINE DEPARTMENT TUTICORIN</a></li>
                                                    <li><a rel="noopener" class="nav-link js-scroll-trigger" href="#category-03">MERCANTILE MARINE DEPARTMENT VISAKHAPATNAM</a></li> -->
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



    <?php
    include 'include/bottom_footer.php';
    include 'include/sourcelink_js.php';
    ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.table').DataTable();
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
</script>