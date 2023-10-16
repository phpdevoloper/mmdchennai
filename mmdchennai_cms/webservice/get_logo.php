<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';


$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$get_status = $_POST['status'];
$get_status = chkbadchar($get_status);
if ($get_status == '') {
    $get_logo = "select * from mst_logo order by position_order asc ";
} else {
    $get_logo = "select * from mst_logo where status='$get_status' order by position_order asc ";
}

$result_slider = pg_query($db, $get_logo);
$row_slider_count = pg_num_rows($result_slider);
?>
<table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus datatable-nosort">S.No</th>
            <th>Title</th>
            <th>File</th>
            <th>Logo Link</th>
            <th>Status</th>
            <th class="datatable-nosort">Action</th>
            <th class="datatable-nosort">Order Change</th>
        </tr>
    </thead>
    <tbody id="sortable">
        <?php
        $i = 0;
        $file;
        while ($row = pg_fetch_array($result_slider)) {
            $media_id = $row['media_id'];
            $get_file = "select me.foldername,ms.filesize,ms.alt_filename as filename  from mst_media ms 
                    inner join mst_mediafolder me on ms.folder_id = me.folder_id 
                    where ms.media_id = $media_id";
            $result_media = pg_query($db, $get_file);
            $row_media = pg_fetch_array($result_media);

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
            <tr id="<?php echo $row['logo_id']  ?>">
                <td class="table-plus" data-title="S.No"><?php echo ++$i; ?></td>
                <td data-title="Title"><?php echo $row['title'] ?></td>
                <td data-title="File"><?php
                                                if ($row['filename'] != '') {
                                                ?>
                        <a rel="noopener" href='uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                    <?php   } else {
                    ?>
                        <a rel="noopener" href='<?php echo $row['link']; ?>' target="_blank" class="view_btn"> click Here </a><?php
                                                                                                                            }
                                                                                                                                ?>
                </td>
                <td data-title="Status"><?Php echo $row['ad_link']?></td>
                <td data-title="Status"><span class="<?Php echo $class ?>">
                        <?Php echo $staus_text; ?> </span></td>
                <td data-title="Action">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal" onclick="editBtn('<?php echo $row['logo_id'] ?>');"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['logo_id'] ?>,'L');"><i class="fa fa-upload"></i> Publish</a>
                            <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['logo_id'] ?>,'A');"><i class="fa fa-archive"></i> Archive</a>
                            <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['logo_id'] ?>,'D');"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
                <td data-title="Order Change"><i class="fa fa-arrows fa-lg" title="Order Change"></i></td>

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
        $("#sortable").sortable({
            delay: 150,
            stop: function() {
                var selectedData = new Array();
                var i = 1;
                // $('table > tbody  > tr').each(function(index, tr) {

                // });
                $('#sortable>tr').each(function() {
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
                        url: "webservice/add_logo.php",
                        type: 'post',
                        datatype: 'JSON',
                        data: {
                            position: data,
                            operation: 'swipe'
                        },
                        success: function(data) {
                            // console.log(data);
                            // return false;
                            var parsedata = JSON.parse(data);
                            if (parsedata.status == 'ok') {
                                // $('#tblStatus' + id + '').append(status);
                                swal("Done!", "It was succesfully Moved !", "success");
                                get_logo();
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
                    get_logo();
                }
            });
        // $.ajax({
        //     url: "webservice/add_logo.php",
        //     type: 'post',
        //     data: {
        //         position: data,
        //         operation: 'swipe'
        //     },
        //     success: function(data) {
        //         console.log(data);
        //         get_logo();
        //     }
        // })
    }
</script>