<?php include("include/db_connection.php");
include 'include/session.php';
	?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>MMD-Chennai | Media</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include "include/sourcelink_css.php" ?>

</head>

<body>

    <?php include "include/header.php" ?>

    <?php include "include/sidebar.php" ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Media</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Media</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <!-- <div class="pd-20">
                            <h4 class="text-blue h4">Data Table Simple</h4>
                            <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
                        </div> -->
                        <div class="pd-20">
                            <div class="gallery">
                                <div class="thumbnail">
                                    <div class=" pull-right media_btn" style="text-align:right">
                                        <i class="fa fa-edit edit " data-toggle="modal" data-target="#editfolderModal" onclick="editbtn(<?Php echo $row['folder_id'] ?>,'<?php echo $row['foldername'] ?>');"></i>
                                        <i class="fa fa-trash delete" onclick="deletebtn(<?Php echo $row['folder_id'] ?>,'<?Php echo $row['foldername'] ?>')"></i>
                                    </div>
                                    <span class="folder"><span class="file"></span>
                                    </span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder </div>
                                </div>
                                <div class="thumbnail"><span class="folder"><span class="file"></span></span>
                                    <div class="title">folder</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
</body>

</html>