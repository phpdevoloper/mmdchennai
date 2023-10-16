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


$get_contents = "select * from mst_whoswho_contents co 
                            inner join mst_whoswho_division di on co.mas_division_id = di.div_id
                            where di.div_id=  $division_id and di.mas_dept_id =$dept_id and co.status='L'
                            "; 

$result_contents = pg_query($db, $get_contents);
?>
<table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus datatable-nosort">S.No</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
            <th class="datatable-nosort">Order Change</th>
        </tr>
    </thead>
    <tbody id="contentssortable">
        <?php
        $j = 0;
        $file;
        while ($row_contents = pg_fetch_array($result_contents)) {

            $status = $row_contents['status'];
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
            <tr id="<?php echo $row_contents['cont_id'] ?>">
                <td class="table-plus" data-title="S.No"><?php echo ++$j; ?></td>
                <td data-title="Name"><?php echo $row_contents['name'] ?></td>
                <td data-title="Designation"><?php echo $row_contents['designation'] ?></td>
                <td data-title="Email"><?php echo $row_contents['email'] ?></td>
                <td data-title="Phone"><?php echo $row_contents['phone'] ?></td>
                </td>
                <td data-title="Action">
                    <button class="btn btn-info"  data-toggle="modal" data-target="#editcontentsModal" onclick="editBtn_contents(<?php echo $division_id ?>,'<?php echo $row_contents['cont_id'] ?>');"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;
                     <button onclick="status_contents_change(<?php echo $row_contents['cont_id'] ?>,<?php echo $division_id ?>);" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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