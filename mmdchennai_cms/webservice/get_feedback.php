<?php include '../include/session.php';
include("../include/db_connection.php");
include '../include/checkval.php';
$currentyear = date("Y");
$previousyear = $currentyear - 1;

$sessionId = $_SESSION['userId'];
$start_date = date('Y-m-d', strtotime($_POST['start_date']));
$end_date = date('Y-m-d', strtotime($_POST['end_date']));

if (
    empty($start_date) && empty($end_date)
) {

    $error = 1;
} else {
    if ($start_date) {
        $check_start_date = check_date($start_date);
        if (empty($check_start_date)) {
           
            $error = 1;
        }
    }
    if ($end_date) {
        $check_end_date = check_date($end_date);
        if (empty($check_end_date)) {
            $error = 1;
        }
    }
}

redirect_error($error);
    if ($error != 1) {


?>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 310px;
        }

        table td {
            /* border: solid 1px #fab;/ */
            width: 100px;
            word-wrap: break-word;
        }
    </style>

    <div class="col-lg-12">

        <?Php
        $mainitems = "select * from mmd_feedback order by created_at desc";
        $resultcurrent = pg_query($db, $mainitems); 
        
        ?>
        <div class="data-table-list-En-draft">
            <!-- <h2 class="text-center">News/Announcement</h2> -->
            <div class="">
                <table class="example table table-striped table-bordered " datatable="" style="table-layout: fixed; width: 100%" width="100%" cellspacing="0" data-page-length="13" data-scroll-x="true" scroll-collapse="false">
                    <thead id="thead" style="color:#fff;background:#40c4ff" class="text-center">
                        <tr>
                            <!-- <th><input type="checkbox" class="" id='checkallusers' onclick="checkAll(id);"> All
                                                                            </th> -->
                            <th style="width:1%;">S.No</th>
                            <th style="width:10%;">Name</th>
                            <!-- <th>Organisation Name </th> -->
                            <th style="width:20%;">Email Address</th>
                            <!-- <th>Phone</th> -->
                            <!-- <th>Address</th> -->
                            <th>Enter Queries/Comments</th>
                            <th style="width:10%;">FeedBack Date</th>
                            <th style="width:10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $file;
                        while ($row = pg_fetch_array( $resultcurrent)) {

                        ?>
                            <tr>
                                <td style="width:1%;">
                                    <?php echo ++$i; ?>
                                </td>
                                <td id="tblHiTitle" <?php echo $row['feedback_id']  ?>>
                                    <?php echo $row['user_name'] ?>
                                </td>
                                <td id="tblHiTitle" <?php echo $row['feedback_id']  ?>>
                                    <?php echo $row['user_email'] ?>
                                </td>
                                <td id="tblHiTitle" <?php echo $row['feedback_id']  ?>>
                                    <?php echo $row['feedback_msg'] ?>
                                </td>
                                <td id="tblHiTitle" <?php echo $row['feedback_id']  ?>>
                                    <?php echo date('d-m-Y h:i:s a ', strtotime($row['created_at'])) ?>
                                </td>
                                <td data-title="Action">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal" onclick="editBtn('<?php //echo $row['feedback_id'] ?>');"><i class="dw dw-edit2"></i> Edit</a> -->
                                        <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['feedback_id'] ?>,'Y');"><i class="fa fa-envelope-open"></i> Read</a>
                                        <!-- <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['feedback_id'] ?>,'D');"><i class="dw dw-delete-3"></i> Delete</a> -->
                                    </div>
                                </div>
                            </td>


                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    </div>

<?Php } else { ?>
    <h2 class="text-center">Something Went Wrong! Please Try Again</h2>
<?Php } ?>
<script>
    // return false;
    var table;
    $(document).ready(function() {
        table = $('.example').DataTable({
            scrollY: 300,
            // responsive: true,
            paging: false,
            retrieve: true,
        });
        table.columns.adjust().draw();

    });
    $(".select2").select2();
</script>