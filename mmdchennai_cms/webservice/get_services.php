<?php
include '../include/db_connection.php';
include '../include/session.php';

// $host     = 'localhost';
// $db       = 'mst';
// $user     = 'postgres';
// $password = 'postgress';
// $dsn = "pgsql:host=$host;dbname=$db;port=5432;";

$content = $_REQUEST['value'];
$operation = $_POST['operation'];
$type = $_REQUEST['type'];
$sessionId = $_SESSION['current_user_id'];
$checkrowcount = $_REQUEST['checkrowcount'];
$service_id = $_REQUEST['service_id'];
$category = $_REQUEST['category'];
$get_status = $_POST['status'];

$get_services = "select * from mmd_services where category = $category  and service_id =$service_id  limit 1";
$result_services = pg_query($db, $get_services);
$row_services = pg_fetch_array($result_services);
$row_sevices_count = pg_num_rows($result_services);
if ($operation == 'get_editor') { ?>
    <div class="pd-20">
        <div id="get<?php echo $type . '_' . $service_id . '_' . $category; ?>">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="#" role="button" onclick="get_edit('open',<?php echo $service_id .
                                                                                                    ',' .
                                                                                                    $category; ?>);">
                        Edit <i class="fa fa-edit"></i>
                    </a>

                </div>
            </div>
            <div class="row">
                <?php echo html_entity_decode(
                    stripslashes($row_services['contents'])
                ); ?>
            </div>
        </div>
        <div id="edit<?php echo $type .
                            '_' .
                            $service_id .
                            '_' .
                            $category; ?>">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button class="btn btn-primary" type="button" onclick="savedata('<?php echo $type; ?>',<?php echo $service_id .
                                                                                                                ',' .
                                                                                                                $category; ?>)">Save</button>
                    <a class="btn btn-danger" href="#" role="button" onclick="get_edit('closed',<?php echo $service_id .
                                                                                                    ',' .
                                                                                                    $category; ?>);">
                        Close <i class="fa fa-window-close"></i>
                    </a>
                </div>
            </div>
            <br>
            <form data-parsley-validate="">
                <div class="form-group ">
                    <textarea class="tinymce" id="save_<?php echo $type .
                                                            '_' .
                                                            $category; ?>"><?php echo $row_services['contents']; ?></textarea>
                    </br>
                    <!-- <div class=" text-center">
                                                        <button class="btn btn-primary" type="button" onclick="savedata('ship_services',1,1)">Submit</button>
                                                    </div> -->
                </div>
            </form>
        </div>
    </div>
<?php } elseif ($operation == 'get_documents') {
    if ($get_status == '') {
        $get_documents = "select * from mst_supporting_documents where service_id = $service_id order by uploaded_on desc";
    } else {
        $get_documents = "select * from mst_supporting_documents where service_id = $service_id and status='$get_status' order by uploaded_on desc";
    }
    $result_documents = pg_query($db, $get_documents);

?>

    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">S.No</th>
                <th>Title</th>
                <th>File / Link</th>
                <th>Status</th>
                <th class="datatable-nosort">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $file;
            while ($row = pg_fetch_array($result_documents)) {
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
                <tr>
                    <td class="table-plus" data-title="S.No"><?php echo ++$i; ?></td>
                    <td data-title="Title"><?php echo $row['title'] ?></td>
                    <td data-title="File / Link"><?php
                                                    if ($row['filename'] != '') {
                                                    ?>
                            <a rel="noopener" href='uploads/media/<?Php echo  $row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                        <?php   } else {
                        ?>
                            <a rel="noopener" href='<?php echo $row['link']; ?>' target="_blank"  class="view_btn"> click Here </a><?php
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal" onclick="editBtn('<?php echo $row['doc_id'] ?> ',<?php echo $row['service_id'] ?>);"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,<?php echo $row['service_id'] ?>,'L');"><i class="fa fa-upload"></i> Publish</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,<?php echo $row['service_id'] ?>,'A');"><i class="fa fa-archive"></i> Archive</a>
                                <a class="dropdown-item" href="#" onclick="status_change(<?php echo $row['doc_id'] ?>,<?php echo $row['service_id'] ?>,'D');"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>

                </tr>
            <?Php } ?>
        </tbody>
    </table>


<?php }
?>
<script>
    var checkrowcount;
    $(document).ready(function() {
        tynymce();
        $('.data-table').DataTable();
        checkrowcount = <?Php echo $row_sevices_count; ?>


    });
</script>