<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';

$operation = $_POST['operation'];
$sessionId = $_SESSION['current_user_id'];
$get_status = $_POST['status'];
$get_status = chkbadchar($get_status);
$dept_id = $_SESSION['session_dept_id'];
$dept_id = chkbadchar($dept_id);
$get_dept_value = "select * from mst_whoswho_dept where dept_id =$dept_id";
$result_dept_value = pg_query($db, $get_dept_value);
$get_row  = pg_fetch_array($result_dept_value);
$get_depart_name = $get_row['title'];
$get_dept = "select * from mst_whoswho_dept dt
    inner join mst_whoswho_division di on dt.dept_id = di.mas_dept_id
    where  di.mas_dept_id=$dept_id  order by di.position_order asc ";

$result_slider = pg_query($db, $get_dept);
$row_slider_count = pg_num_rows($result_slider);
?>

<div class="row">
    <h4 class="text-center"><?Php echo $get_depart_name ?></h4>
</div>
<br>
<?Php
if ($row_slider_count != 0) {
?>
    <div class="faq-wrap">
        <div id="accordion">
            <?Php
            $i = 0;
            while ($row = pg_fetch_array($result_slider)) {
            ?>
                <div class="card" onclick="get_division_contents(<?Php echo $row['div_id'] ?>);">
                    <div class="card-header">
                        <button class="btn btn-block" data-toggle="collapse" data-target="#division_<?Php echo $row['div_id'] ?>">
                            <?Php echo ++$i . '.' . $row['div_title'] ?>
                            <div class="text-right">
                          
                        </div>
                        </button>
                        
                    </div>
                    <div id="division_<?Php echo $row['div_id'] ?>" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 ">
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcontentModal" onclick="set_contents_id(<?Php echo $row['div_id'] ?>);">
                                        Add new <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <?Php $division_id = $row['div_id']; ?>
                            <div id="get_records_contents_<?Php echo $row['div_id'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?Php } ?>
        </div>
    </div>
<?Php } else { ?>
    <h3 class="text-center">No Data Found Please Add New Division</h3>
<?Php } ?>

<script>
    var checkrowcount;
    $(document).ready(function() {

        $('.data-table').DataTable();
        get_division_contents();
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
                        url: "webservice/add_whoswho.php",
                        type: 'post',
                        datatype: 'JSON',
                        data: {
                            position: data,
                            operation: 'swipe_dept'
                        },
                        success: function(data) {
                            // console.log(data);
                            // return false;
                            var parsedata = JSON.parse(data);
                            if (parsedata.status == 'ok') {
                                // $('#tblStatus' + id + '').append(status);
                                swal("Done!", "It was succesfully Moved !", "success");
                                get_dept();
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

    function get_division_contents(div_id) {

        var status = $('#sltgetstatus').val();

        data = {
            division_id: div_id,
            operation: 'get_department'
        }
        $.ajax({
            type: 'POST',
            // contentType: "application/json",
            // dataType: "json",
            url: 'webservice/get_whoswho_divisions_contents.php',
            data: data,
            success: function(response, textStatus, xhr) {
                console.log(response);
                $("#get_records_contents_" + div_id + '').html(response);
                table = $('.data-table').DataTable();
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