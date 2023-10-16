<?php
include '../include/db_connection.php';


$sessionId = $_SESSION['userId'];
$service_id = $_REQUEST['service_id'];
$category = $_REQUEST['category'];

$get_services = "select * from mmd_services where category = $category  and service_id =$service_id  limit 1";
$result_services = pg_query($db, $get_services);
$row_services = pg_fetch_array($result_services);
$row_sevices_count = pg_num_rows($result_services);
if ($category  == 1 || $category  == 2) {

    if ($category == 1) {
        $category_name = "For Whom";
    } else if ($category == 2) {
        $category_name = "Fees";
    }
?>
    <div class="row">
        <h4 class="text-center"><?Php echo  $category_name; ?></h4>
        <?Php $get_contents = html_entity_decode(
            $row_services['contents']
        );
        echo $get_contents;

        ?>
    </div>
<?php } else if ($category  == 3) {
    $get_documents = "select * from mst_supporting_documents where service_id = $service_id and status ='L' order by uploaded_on asc";
    $result_documents = pg_query($db, $get_documents);

?>
    <div class="pd-20">
        <h4 class="text-center">Supporting Documents</h4>
        <div class="table-responsive">
            <table class="data-table table table-striped hover table-bordered nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">S.No</th>
                        <th>Title</th>
                        <th>File / Link</th>

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


                    ?>
                        <tr>
                            <td class="table-plus" data-title="S.No"><?php echo ++$i; ?></td>
                            <td data-title="Title"><?php echo $row['title'] ?></td>
                            <td data-title="File / Link"><?php
                                                            if ($row['filename'] != '') {
                                                            ?>
                                    <a rel="noopener" href='<?Php echo  $media.$row_media['foldername'] ?>/<?php echo $row_media['filename'] ?>' target="_blank" class="view_btn" title="View Here"> view Ad (<?php echo  $row_media['filesize'];  ?>) </a>
                                <?php   } else {
                                ?>
                                    <a rel="noopener" href='<?php echo $row['event_link']; ?>' class="view_btn"> click Here </a><?php
                                                                                                                            }
                                                                                                                                ?>
                            </td>
                        </tr>
                    <?Php } ?>
                </tbody>
            </table>
        </div>

    </div>
<?php }
?>
<script>
    $(document).ready(function() {

        $('.data-table').DataTable();
    });
</script>