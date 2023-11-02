<?php 
include("../include/db_connection.php");
include '../include/session.php';
$sessionId = $_SESSION['current_user_id'];
$admin_id = $_SESSION['admin_id'];
$folder_id = $_POST['folder_id'];
$get_folder = "SELECT * FROM mst_mediafolder ms
where
 ms.status = 'L' and ms.folder_id = $folder_id";

$result_media = pg_query($db, $get_folder);
$get_foldername = pg_fetch_array($result_media);

?> <div class="card-body d-none" id="filesGroup">
   
   
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  rel="noopener" href="#" id="backTofolders" onclick="add_newbtn();"><i class="fa fa-folder"></i>&nbsp;Back</a></li>
        
        <li class="breadcrumb-item active"><?Php echo $get_foldername['foldername'] ?></li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">

            </div>
            <div class="col-lg-3" style="text-align:right">
                <label for="cars">Choose File Type :</label>
            </div>
            <div class="col-lg-4">
                <select class="js-example-responsive select2" style="width: 100%" id="sltsubmedia" onchange="get_submedia();">
                    <option value="">All</option>
                    <option value="images">images (jpeg,jpg,gig,png)</option>
                    <option value="documents">Documents (pdf)</option>
                    <option value="videos">Videos / Audios (Mp4)</option>

                </select>
            </div>
        </div>
    </div>
    <div id="get_submediaImages">
    </div>
</div>

<script type="text/javascript">
     $(document).ready(function() {
        get_submedia();
    });
  

    $('#get_foldername').text('<?Php echo $get_foldername['foldername'] ?>');
    $('#filesGroup').removeClass('d-none');
    $('#mediafoldersGroup').addClass('d-none')
    $('.subject-list').on('change', function() {
        $('.subject-list').not(this).prop('checked', false);
    });
    $('a#backTofolders').on('click', function() {
        $('#get_file').hide();
        $('#mediafoldersGroup').removeClass('d-none');
        $('#filesGroup').addClass('d-none')
    });

    function get_submedia() {

        var folder_id = <?Php echo $folder_id ?>;

        var status = $('#sltsubmedia').val();
        data = {
            status: status,
            folder_id: folder_id
        }
     
        $.ajax({
            type: 'POST',
            // url: 'webservice/get_modalmediafile.php',
            url: 'webservice/get_modal_submediaImages.php',
            data: data,
            success: function(response, textStatus, xhr) {

                $('#get_submediaImages').html(response);
                //  table.columns.adjust().draw();
            },
            complete: function(xhr) {

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                var response = XMLHttpRequest;
                swal("Error :Archive!", "Please try again", "error");

            }
        });
    }
</script>