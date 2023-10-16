<?php 
include("../include/db_connection.php");
include '../include/session.php';
$sessionId = $_SESSION['current_user_id'];
$lang = $_POST['lang'];
$status = $_POST['status'];

$type = $_REQUEST['type'];
$table_en = "mst_" . $type . "";

$statuslang["en"] = array();
$statuslang["ta"] = array();
$statuslang["hi"] = array();

if ($type == 'usefullinks' || $type == 'quicklinks') {
    $statuscheck = "select *
    from $table_en  en
     order by en.position_order asc";

    $result_link = pg_query($db, $statuscheck);
    $quicklinks_count = pg_num_rows($result_link);
} else {
    $statuscheck = "select *
    from $table_en  en 
      order by en.position_order asc";

    $resultstatus_footer = pg_query($db, $statuscheck);

    $footer_count = pg_num_rows($resultstatus_footer);
}


if ($type == 'usefullinks') {
?>
    <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#linkModal" style="margin-left:10px;" onclick="addnew('en','<?Php echo $type ?>','')"><i class="icofont icofont-plus"> </i> Add New</button>
    <?Php

    if ($quicklinks_count == 0) {
    ?>
        <div class="text-center">
            <h3> No Data Found ! Please Add New </h3>
        </div>
    <?php  } else  ?>

    <table class="example table table-hover table-striped" datatable="" width="100%" cellspacing="0" data-page-length="33" data-scroll-x="true" scroll-collapse="false">
        <thead style="background:#fff">
            <tr>
                <th style="width:2%">#</th>
                <th style="width:15%">Title</th>
                <th style="width:10%">Link</th>
                <th style="width:5%">Date</th>
                <th style="width:5%">Status</th>
                <th style="width:10%">Action</th>
                <th style="width:5%">Order Change</th>
            </tr>
        </thead>
        <tbody id="sortable_<?php echo $type ?>">
            <?php
            $i = 0;
            $file;
            while (
                $row = pg_fetch_array(
                    $result_link
                )
            ) {

                // if ($row['filename'] != "") {
                //     $file = $row['filename'];
                // } else if ($row['ad_link'] != "") {
                //     $file = $row['ad_link'];
                // }

                $status = $row['status'];
                if ($status == 'L') {
                    $class = "text-live";
                    $staus_text = "Published";
                } else if ($status == 'D') {
                    $class = "text-danger";
                    $staus_text = "Deleted";
                } else if ($status == 'A') {
                    $class = "text-archive";
                    $staus_text = "Archived";
                }
                // array_push($statuslang["hi"], array("status" =>   $row['status'], "id" => $row['hi_docid']));
                // array_push($statuslang["ta"], array("status" =>   $row['status'], "id" => $row['ta_docid']));
            ?>

                <tr id="<?php echo $row['doc_id']  ?>">

                    <td>
                        <?php echo ++$i; ?>
                    </td>
                    <td id="tblEnTitle" <?php echo $row['doc_id']  ?>>
                        <?php echo $row['title'] ?>
                    </td>

                    <td style="word-wrap: break-word;word-break:break-all;max-width:10%" id="tblEnTitle" <?php echo $row['doc_id']  ?>>
                        <?php echo $row['footer_link'] ?>
                    </td>
                    <td id="tblEnTitle" <?php echo $row['doc_id']  ?>>
                        <?php echo date('d-m-Y ', strtotime($row['uploaded_on'])) ?>
                    </td>
                    <td data-title="Status"><span class="<?Php echo $class ?>">
                            <?Php echo $staus_text; ?> </span></td>
                    <td data-title="Action">
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editlinkModal" onclick="editBtn('<?php echo $type ?>','<?php echo $row['doc_id'] ?>','');"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'L','<?php echo  $type ?>');"><i class="fa fa-upload"></i> Publish</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'A','<?php echo  $type ?>');"><i class="fa fa-archive"></i> Archive</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'D','<?php echo  $type ?>');"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>

                    <td class="text-center" onclick="get_order(<?php echo $row['doc_id']  ?>,'<?Php echo $type ?>');"><i class="fa fa-arrows fa-lg" title="Click and Drag"></i></td>
                </tr>
            <?php } ?>

        </tbody>

    </table>
<?Php
} else if ($type == 'quicklinks') {

?> <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#linkModal" style="margin-left:10px;" onclick="addnew('en','<?Php echo $type ?>','')"><i class="icofont icofont-plus"> </i> Add New</button>
    <?Php

    if ($quicklinks_count == 0) {
    ?>
        <div class="text-center">
            <h3> No Data Found ! Please Add New </h3>
        </div>
    <?php  } else ?>

    <table class="example table table-hover table-striped" datatable="" width="100%" cellspacing="0" data-page-length="33" data-scroll-x="true" scroll-collapse="false">
        <thead style="background:#fff">
            <tr>
                <th style=width:2%>#</th>
                <th style=width:15%>Title</th>
                <th style=width:10%>Link</th>
                <th style=width:5%>Date</th>
                <th style="width:5%;">Status</th>
                <th style=width:10%>Action</th>
                <th style=width:5%>Order Change</th>

            </tr>
        </thead>



        <tbody id="sortable_<?php echo $type ?>">

            <?php
            $i = 0;

            while (
                $row = pg_fetch_array(
                    $result_link
                )
            ) {
                $status = $row['status'];
                if ($status == 'L') {
                    $class = "text-live";
                    $staus_text = "Published";
                } else if ($status == 'D') {
                    $class = "text-danger";
                    $staus_text = "Deleted";
                } else if ($status == 'A') {
                    $class = "text-archive";
                    $staus_text = "Archived";
                }



            ?>
                <tr id="<?php echo $row['doc_id']  ?>">
                    <td><?php echo  ++$i; ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td style="word-wrap: break-word;word-break:break-all;max-width:10%"><a rel="noopener" style="font-weight:500" href="<?php echo $row["footer_link"] ?> " target="_blank"><?php echo $row["footer_link"] ?></a></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($row['uploaded_on'])) ?></td>
                    <td data-title="Status"><span class="<?Php echo $class ?>">
                            <?Php echo $staus_text; ?> </span></td>
                    <td data-title="Action">
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editlinkModal" onclick="editBtn('<?php echo $type ?>','<?php echo $row['doc_id'] ?>','');"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'L','<?php echo  $type ?>');"><i class="fa fa-upload"></i> Publish</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'A','<?php echo  $type ?>');"><i class="fa fa-archive"></i> Archive</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'D','<?php echo  $type ?>');"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center" onclick="get_order(<?php echo $row['doc_id']  ?>,'<?Php echo $type ?>');"><i class="fa fa-arrows fa-lg" title="Click and Drag"></i></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?Php
} else if ($type == 'footerslider') {

?> <button class="btn btn-success notika-btn-success pull-left" data-toggle="modal" data-target="#sliderModal" style="margin-left:10px;" onclick="addnew('en','<?Php echo $type ?>','')"><i class="icofont icofont-plus"> </i> Add New</button>
    <?Php

    if ($footer_count == 0) {
    ?>
        <div class="text-center">
            <h3> No Data Found ! Please Add New </h3>
        </div>
    <?php  } else ?>

    <table class="example table table-striped table-hover">
        <thead id="thead" style="color:#111;width:100%;background:#fff" class="text-center">
            <tr>
                <th style="width:2%;">#</th>
                <th style="width:15%;">Title</th>
                <th style="width:10%;">File</th>
                <th style="width:10%;">Link</th>
                <th style="width:5%;"> Date</th>
                <th style="width:5%;">Status</th>
                <th style="width:10%;">Action</th>
                <th style="width:3%;">Order Change</th>
            </tr>
        </thead>
        <tbody id="sortable_<?php echo $type  ?>">
            <?php
            $i = 0;
            $j = 0;
            $file;
            while (
                $row = pg_fetch_array(
                    $resultstatus_footer
                )
            ) {

                $status = $row['status'];
                if ($status == 'L') {
                    $class = "text-live";
                    $staus_text = "Published";
                } else if ($status == 'D') {
                    $class = "text-danger";
                    $staus_text = "Deleted";
                } else if ($status == 'A') {
                    $class = "text-archive";
                    $staus_text = "Archived";
                }

                $media_id = $row['media_id'];
                $get_file = "select me.foldername from mst_media ms 
                                inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                               where ms.media_id = $media_id
                                  ";
                // echo $get_file;
                // exit;
                $result_media = pg_query($db, $get_file);
                $row_media = pg_fetch_array($result_media);

            ?>

                <tr id="<?php echo $row['doc_id']  ?>">

                    <td>
                        <?php echo ++$i; ?>
                    </td>
                    <td><?php echo $row['title'] ?></td>
                    <td id="tblEnTitle" <?php echo $row['doc_id']  ?>>
                        <a rel="noopener" href="uploads/media/<?php echo  $row_media['foldername'] . '/' . $row['filename'] ?>">
                            <img src="uploads/media/<?php echo $row_media['foldername'] . '/' . $row['filename'] ?>" class="img-fluid img-thumbnail" alt="<?php echo $row['title'] ?>" style="max-width:100px;max-height:100px;">
                        </a>
                    </td>
                    <td><?php echo $row['footer_link'] ?></td>
                    <td id="tblEnTitle" <?php echo $row['doc_id']  ?>>
                        <?php echo date('d-m-Y ', strtotime($row['uploaded_on'])) ?>
                    </td>

                    <td data-title="Status"><span class="<?Php echo $class ?>">
                            <?Php echo $staus_text; ?> </span></td>
                    <td data-title="Action">
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editsliderModal" onclick="editBtn('<?php echo $type ?>','<?php echo $row['doc_id'] ?>','<?php echo  $row_media['foldername'] ?>');"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'L','<?php echo  $type ?>');"><i class="fa fa-upload"></i> Publish</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'A','<?php echo  $type ?>');"><i class="fa fa-archive"></i> Archive</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'D','<?php echo  $type ?>');"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center" onclick="get_order(<?php echo $row['doc_id']  ?>,'<?Php echo $type ?>');"><i class="fa fa-arrows fa-lg" title="Click and Drag"></i></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
?>

<script>
    var table;
    $(document).ready(function() {
        table = $('.example').DataTable({
            scrollY: 300,
            "responsive": true,
            paging: false,
            retrieve: true,
        });
        $(".select2").select2();
        table.columns.adjust().draw();
        var usefullinks = '<?php echo $quicklinks_count; ?>';
        var footer_counts = '<?php echo $footer_count; ?>';
        var quicklinks_counts = '<?php echo $quicklinks_count; ?>';

        $('#usefullinks').text(usefullinks);
        $('#footer_counts').text(footer_counts);
        $('#quicklinks').text(quicklinks_counts);


    });

    function get_order(id, type) {
        var start, change, update;

        $(function() {
            $("#sortable_" + type ).sortable({
                delay: 150,
                stop: function() {
                    var selectedData = new Array();
                    var i = 1;
                    // $('table > tbody  > tr').each(function(index, tr) {

                    // });
                    $('#sortable_' + type + '>tr').each(function() {
                        selectedData.push($(this).attr("id"));
                    });

                    updateOrder(selectedData, type, id);
                }

            });
        });
    }



    // $("#sortable").disableSelection();


    function updateOrder(data, type, id) {

        var order_data = {
            position: data,
            doc_id: id,
            pagename: type,
            operation: "swipe"

        }
        // console.log(order_data);
        // return false;
        swal({
                title: "Are you sure?",
                text: "Do You Want To Order Change ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "webservice/add_importantlinks.php",
                        type: 'post',
                        datatype: 'JSON',
                        data: order_data,
                        success: function(data) {
                            // console.log(data);
                            // return  false;
                            var parsedata = JSON.parse(data);
                            if (parsedata.status == 'ok') {

                                swal("", "Successully Order Changed", "success");

                                get_records(type);


                            } else {
                                swal("Error!", "Please try again", "error");

                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error:", "Please try again", "error");
                        }
                    })
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    get_records(type);
                }
            }
        );

        // $.ajax({
        //     url: "webservice/add_importantlinks.php",
        //     type: 'post',
        //     data: order_data,
        //     success: function(data) {
        //         console.log(data);

        //     }
        // })
    }

   
</script>