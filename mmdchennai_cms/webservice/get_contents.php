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

$table = 'mst_' . $table_name . '';
$table_en = "niot_" . $table_name . "_en";

if ($status == '') {
    $statuscheck = "select * from $table en order by doc_id desc";
    $resultstatus = pg_query($db, $statuscheck);
} else {
    $statuscheck = "select * from $table en where en.status= '$status' order by doc_id desc";
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


                        $media_id = $row['media_id'];
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
                               


                                if ($row['filename'] != '') {
                                ?>
                                    <a rel="noopener" href='uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                                <?php   } else {
                                ?>
                                    <a rel="noopener" target="blank" href='<?php echo $row['ad_link']; ?>' class="view_btn"> click Here </a><?php
                                                                                                                            }
                                                                                                                                ?>


                            </td>

                            <td data-title="Status"><span class="<?Php echo $class ?>">
                                    <?Php echo $staus_text; ?> </span></td>
                            <td data-title="Action">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal" onclick="editBtn('<?php echo $row['doc_id'] ?>');"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'L');"><i class="fa fa-upload"></i> Publish</a>
                                        <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'A');"><i class="fa fa-archive"></i> Archive</a>
                                        <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,'D');"><i class="dw dw-delete-3"></i> Delete</a>
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
    var page_name;
    $(Document).ready(function() {

        $('.example').DataTable();
        page_name = '<?Php echo $table_name ?>';
    });


    // $(".select2").select2();
</script>