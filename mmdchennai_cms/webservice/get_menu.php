<?php
include("../include/db_connection.php");
include '../include/session.php';
$sessionId = $_SESSION['current_user_id'];

$menu_query = "select * FROM mst_mmd_menu WHERE mainmenu_status='L'  and submenu_id=0 order by mainmenu_order asc";
$result = pg_query($db, $menu_query);
$get_count = pg_num_rows($result);
$query = pg_fetch_all($result);





if ($get_count == 0) {

?>
    <h3 class="text-center"> No Data Found ! Please Add Main Menu</h3>
<?Php } else {
?>
    <ul class="tree">

        <?Php
        while ($menuRow = pg_fetch_row($result)) {

            $order_id = $menuRow[0];

        ?>
            <li class="section" id="<?Php echo $order_id ?>">
                <input type="checkbox" id="groupA<?Php echo $menuRow[0] ?>" class="subicon" />
                <label for="groupA<?Php echo $menuRow[0] ?>"><i class="fa fa-arrow-right "></i> <?Php echo $menuRow[1] ?> </label>
                <div class="pull-right mainmenubtn">
                    <?Php
                    $check_menu = "select * from mst_mmd_menu as en
                    WHERE en.mainmenu_status='L'  and en.menu_id =$menuRow[0]  order by en.mainmenu_order asc ";

                    $result_check_menu = pg_query($db, $check_menu);
                    $get_check_row = pg_fetch_array($result_check_menu);

                    ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_submenu" onclick="set_menuid(<?Php echo $menuRow[0] ?>);" title="Add Sub Menu"> <i class="fa fa-plus"></i></button>

                    <?Php
                    $update_id = $menuRow[0];

                    ?>

                    <button class="btn btn-info" data-toggle="modal" data-target="#edit_menu" onclick="editmenu(<?Php echo  $update_id ?>,'<?Php echo $menuRow[1] ?>','<?Php echo $menuRow[2] ?>');"><i class="fa fa-edit"></i> </button>

                    <button class="btn btn-danger" onclick="deletebtn(<?Php echo  $menuRow[0] ?>,'delete_mainmenu')"><i class="fa fa-trash" ></i> </button>

                </div>
                <!-- <i class="fa fa-arrow-right subicon" id="groupA"></i> Group A -->

                <?Php

                // $sub = "select * FROM niot_menu_" . $lang . " WHERE mainmenu_status='L' and  submenu_status = 'L' and submenu_id=$menuRow[0] order by submenu_order asc";


                $sub = "select * FROM mst_mmd_menu WHERE submenu_status='L' and mainmenu_status='L' and submenu_id=$menuRow[0] order by submenu_order,menu_id asc";

                $subResult = pg_query($db, $sub);
                //   echo $sub_query;
                ?><ul class="submenucms"> <?Php
                                            while ($subRow = pg_fetch_row($subResult)) { ?>
                        <li class="submenucmssection" id="<?Php echo $subRow[0] ?>" style="padding-left:20px;"><i class="fa fa-arrow-right "></i> <?Php echo $subRow[1] ?>

                            <div class="pull-right submenubtn">
                                <?Php
                                                if ($lang == 'en') {
                                                    $check_submenu = "select * from niot_menu_en as en
                            WHERE en.mainmenu_status='L' ";
                                                    // echo $check_submenu;
                                                    // exit;

                                                    //exit;
                                                    $result_check_submenu = pg_query($db, $check_submenu);
                                                    $get_check_subrow = pg_fetch_array($result_check_submenu);
                                                }


                                ?>
                                <?Php
                                                $update_sub_id = $subRow[0];
                                ?>
                                <button class="btn" data-toggle="modal" data-target="#edit_menu" onclick="editmenu(<?Php echo  $update_sub_id ?>,'<?Php echo $subRow[1] ?>','<?Php echo $subRow[2] ?>');"> <i class="fa fa-edit"></i> </button>

                                <button class="btn" onclick="deletebtn(<?Php echo $subRow[0] ?>,'delete_submenu')"><i class="fa fa-trash"></i> </button>


                            </div>
                        </li>
                    <?Php    }
                    ?>
                </ul>

            </li>

        <?Php } ?>
    </ul>
<?Php } ?>

<script>
    var table;
    $(document).ready(function() {

    });




    $(".tree").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            var i = 1;
            // $('table > tbody  > tr').each(function(index, tr) {

            // });

            $('.section').each(function() {
                selectedData.push($(this).attr("id"));
            });

            updateOrder(selectedData, 'mainmenu_order');

        },
        // deactivate: function(ui, e) {
        //     console.log(e.item.attr('id'));
        //     updateOrder(selectedData);
        // },
    });

    $(".submenucms").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            var i = 1;
            // $('table > tbody  > tr').each(function(index, tr) {

            // });
            $('.submenucmssection').each(function() {
                selectedData.push($(this).attr("id"));
            });

            updateOrder(selectedData, 'submenu_order');
        },
        // deactivate: function(ui, e) {
        //     console.log(e.item.attr('id'));
        //     updateOrder(selectedData);
        // },

    });
</script>