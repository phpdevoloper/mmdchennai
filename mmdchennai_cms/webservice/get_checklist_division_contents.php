<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';


$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$get_status = $_POST['status'];
$division_id = $_POST['division_id'];
$get_status = chkbadchar($get_status);
$dept_id = $_SESSION['session_dept_id'];
$dept_id = chkbadchar($dept_id);


$get_contents = "select *,co.status as content_status from mst_checklist_contents co 
                            inner join mst_checklist_dept di on co.mas_dept_id = di.dept_id
                            where  di.dept_id =$dept_id 
                            ";

$result_contents = pg_query($db, $get_contents);
?>
<table class="data-table table stripe hover nowrap">
    <thead class="text-center">
        <tr>
            <!-- <th><input type="checkbox" class="" id='checkallusers' onclick="checkAll(id);"> All
                                                                            </th> -->
            <th style="width:2%;">S.No</th>
            <th class="text-center" style="width:10%;">Title</th>
            <th class="text-center" style="width:10%;">File / Link</th>
            <th style="width:5%;">Status</th>
            <!-- <th>Status Change</th> -->
            <th style="width:10%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $j = 0;
        $file;
        while ($row_contents = pg_fetch_array($result_contents)) {

            $status = $row_contents['content_status'];
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


            $media_id = $row_contents['media_id'];
            $get_file = "select me.foldername,ms.filesize,ms.alt_filename as filename  from mst_media ms 
        inner join mst_mediafolder me on ms.folder_id = me.folder_id 
        where ms.media_id = $media_id";
            $result_media = pg_query($db, $get_file);
            $row_media = pg_fetch_array($result_media);

        ?>
            <tr>

                <td>
                    <?php echo ++$i; ?>
                </td>
                <td id="tblEnTitle" <?php echo $row_contents['cont_id']  ?>>
                    <?php echo $row_contents['title'] ?>
                </td>

                <td id="tblEnTitle" <?php echo $row_contents['cont_id']  ?>>
                    <?php if ($row_contents['filename'] == "" && $row_contents['ad_link'] == "") {
                        $file = '';
                    } else if ($row_contents['ad_link'] != "") {
                        $file = $row_contents['ad_link'];
                    } else {
                        $file = $row_contents['filename'];
                    }



                    if ($row_contents['filename'] != '') {
                    ?>
                        <a rel="noopener" href='uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                    <?php   } else {
                    ?>
                        <a rel="noopener" target="blank" href='<?php echo $row_contents['ad_link']; ?>' class="view_btn"> click Here </a><?php
                                                                                                                                        }
                                                                                                                                            ?>


                </td>
                <td data-title="Status"><span class="<?Php echo $class ?>">
                        <?Php echo $staus_text; ?> </span></td>
                <!-- <td data-title="Action">
                    <button class="btn btn-info" data-toggle="modal" data-target="#editModal" onclick="editBtn_contents(<?php echo $division_id ?>,'<?php echo $row_contents['cont_id'] ?>');"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;
                    <button onclick="status_contents_change(<?php echo $row_contents['cont_id'] ?>,<?php echo $division_id ?>);" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td> -->
                <td data-title="Action">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal" onclick="editBtn_contents('<?php echo $row_contents['cont_id'] ?>');"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#" onclick="status_contents_change(<?php echo $row_contents['cont_id'] ?>,'L');"><i class="fa fa-upload"></i> Publish</a>
                                        <a class="dropdown-item" href="#" onclick="status_contents_change(<?php echo $row_contents['cont_id'] ?>,'A');"><i class="fa fa-archive"></i> Archive</a>
                                        <a class="dropdown-item" href="#" onclick="status_contents_change(<?php echo $row_contents['cont_id'] ?>,'D');"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                <!-- <td data-title="Order Change"><i class="fa fa-arrows fa-lg" title="Order Change"></i></td> -->

            </tr>
        <?Php } ?>
    </tbody>
</table>
<script>
    var checkrowcount;
    $(document).ready(function() {
        $('.data-table').DataTable();

    });

    $(function() {
        var start, change, update;
        $("#contentssortable").sortable({
            delay: 150,
            stop: function() {
                var selectedData = new Array();
                var i = 1;
                // $('table > tbody  > tr').each(function(index, tr) {

                // });
                $('#contentssortable>tr').each(function() {
                    selectedData.push($(this).attr("id"));
                });

                updateOrder(selectedData);
            }

        });

        // $("#sortable").disableSelection();
    });


    function updateOrder(data) {
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
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "webservice/add_whoswho.php",
                        type: 'post',
                        datatype: 'JSON',
                        data: {
                            position: data,
                            operation: 'swipe_division_contents'
                        },
                        success: function(data) {
                            // console.log(data);
                            // return false;
                            var parsedata = JSON.parse(data);
                            if (parsedata.status == 'ok') {
                                // $('#tblStatus' + id + '').append(status);
                                swal("Done!", "It was succesfully Moved !", "success");
                                get_division_contents(<?Php echo $division_id ?>);
                            } else {
                                swal("Error !", "Please try again", "error");

                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error:", "Please try again", "error");
                        }
                    })
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    get_dept();
                }
            });
        // $.ajax({
        //     url: "webservice/add_slider.php",
        //     type: 'post',
        //     data: {
        //         position: data,
        //         operation: 'swipe'
        //     },
        //     success: function(data) {
        //         console.log(data);
        //         get_dept();
        //     }
        // })
    }
</script>