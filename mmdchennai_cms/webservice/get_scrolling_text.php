<?php
include("../include/db_connection.php");
include '../include/session.php';
$sessionId = $_SESSION['current_user_id'];
$status = $_POST['status'];
$cur_lang = $_POST['lang'];
$table_name = $_POST['page_name'];
$statusChange = ['ta', 'hi', 'en'];

$language = ['en', 'hi', 'ta'];
// $statusChange = $language;

$statuslang["en"] = array();
$statuslang["ta"] = array();
$statuslang["hi"] = array();
// array_push($statuslang["en"],array("Name"=>array("en","ta","hi"),"E-Mail"=>"isuru.eshan@gmail.com"));
// array_push($statuslang["ta"],array("Name"=>array("en","ta","hi"),"E-Mail"=>"isuru.eshan@gmail.com"));
// array_push($statuslang["hi"],array("Name"=>array("en","ta","hi"),"E-Mail"=>"isuru.eshan@gmail.com"));
// echo "<pre>";
// echo json_encode($statuslang,JSON_PRETTY_PRINT);
// echo "</pre>";

// echo $language[0];



if ($status == '') {

    $statuscheck = "select * from mst_scrolling_text en order by scroll_id desc";
    $resultstatus = pg_query($db, $statuscheck);
} else {

    $statuscheck = "select * from mst_scrolling_text en where en.status= '$status')";
    $resultstatus = pg_query($db, $statuscheck);
}

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
    <div class="data-table-list-En-draft">
        <!-- <h2 class="text-center">News/Announcement</h2> -->
        <div class="table-responsive">
            <table class="tbl-en-draft  table table-striped table-bordered " width="100%">
                <thead id="thead" style="color:#fff;background:#40c4ff" class="text-center">
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
                    $i = 0;
                    $file;
                    while (
                        $row = pg_fetch_array(
                            $resultstatus
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

                        <tr>

                            <td>
                                <?php echo ++$i; ?>
                            </td>
                            <td id="tblEnTitle" <?php echo $row['scroll_id']  ?>>
                                <?php echo $row['title'] ?>
                            </td>

                            <td id="tblEnTitle" <?php echo $row['scroll_id']  ?>>
                                <?php if ($row['filename'] == "" && $row['ad_link'] == "") {
                                    $file = '';
                                } else if ($row['ad_link'] != "") {
                                    $file = $row['ad_link'];
                                } else {
                                    $file = $row['filename'];
                                }
                                echo  $file; ?>
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
                        </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>
    </div>
</div>


<script>
    // return false;
    var table;
    $(Document).ready(function() {

       $('.example').DataTable();
           

    });
    // $(".select2").select2();
</script>