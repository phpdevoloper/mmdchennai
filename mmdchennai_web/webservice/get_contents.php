<?php
include '../include/db_connection.php';

$sessionId = $_SESSION['userId'];
$service_id = $_REQUEST['service_id'];
$page_name = $_REQUEST['page_name'];

$get_contents = "select * from mst_" . $page_name . " where status='L' order by doc_id desc";
$result_contents = pg_query($db, $get_contents);
$row_sevices_count = pg_num_rows($result_contents);

?>
<div class="pd-20">
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
                while ($row = pg_fetch_array($result_contents)) {
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
                                <a rel="noopener" href='<?php echo $row['ad_link']; ?>' class="view_btn"> click Here </a><?php
                                                                                                                        }
                                                                                                                            ?>
                        </td>
                    </tr>
                <?Php } ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {

        $('.data-table').DataTable();
    });
</script>