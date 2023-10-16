<?php
include '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';

$operation = $_POST['operation'];
$get_aboutus = "select * from mmd_rti where status='L' limit 1";

$result_aboutus = pg_query($db, $get_aboutus);
$row_aboutus = pg_fetch_array($result_aboutus);
$row_sevices_count = pg_num_rows($result_aboutus);
?>
<div class="pd-20 card-box mb-30">
    <div id="get_contacts">
        <div class="row">
            <div class="col-md-6 col-sm-12">
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-primary" href="#" role="button" onclick="get_edit('open');">
                    Edit <i class="fa fa-edit"></i>
                </a>

            </div>
        </div>
        <div class="row">
            <?php echo html_entity_decode(
                stripslashes($row_aboutus['contents'])
            ); ?>
        </div>
    </div>
    <div id="edit_contacts">
        <div class="row">
            <div class="col-md-6 col-sm-12">
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-primary" type="button" onclick="savedata()">Save</button>
                <a class="btn btn-danger" href="#" role="button" onclick="get_edit('closed');">
                    Close <i class="fa fa-window-close"></i>
                </a>
            </div>
        </div>
        <br>
        <form data-parsley-validate="">
            <div class="form-group ">
                <textarea class="tinymce" id="save_contacts"><?php echo $row_aboutus['contents']; ?></textarea>
                </br>
                <!-- <div class=" text-center">
                                                        <button class="btn btn-primary" type="button" onclick="savedata('ship_services',1,1)">Submit</button>
                                                    </div> -->
            </div>
        </form>
    </div>
</div>

<script>
    var checkrowcount;
    $(document).ready(function() {
        get_edit('closed');
        tynymce();



    });
</script>