<?php

include_once '../include/db_connection.php';
include '../include/session.php';
include '../include/checkval.php';

$operation = $_POST['operation'];
$menu_title = $_POST['menu_title'];
$menu_title = chkbadchar($menu_title);
$end_date = $_POST['end_date'];
$end_date = chkbadchar($end_date);
$menu_link = $_POST['menu_link'];
$menu_link = chkbadchar($menu_link);
$submenu_id = $_POST['submenu_id'];
$submenu_id = chkbadchar($submenu_id);
$main_menu_id = $_POST['main_menu_id'];
$main_menu_id = chkbadchar($main_menu_id);
$masmenu_id = $_POST['menu_id'];
$masmenu_id = chkbadchar($masmenu_id);
$mas_submenu_id = $_POST['mas_submenu_id'];
$mas_submenu_id = chkbadchar($mas_submenu_id);
$sessionId = $_SESSION['current_user_id'];
$currdate = date('Y-m-d h:i:s');
$max_order = 'select max(mainmenu_order) from mst_mmd_menu';
$result_order = pg_query($db, $max_order);
$main_row = pg_fetch_array($result_order);
$max_mainorder = $main_row['mainmenu_order'];
if ($max_mainorder == '') {
    $max_mainorder = 1;
} else {
    $max_mainorder = $max_mainorder + 1;
}

$max_suborder = 'select max(submenu_order) from mst_mmd_menu';
$result_suborder = pg_query($db, $max_suborder);
$sub_row = pg_fetch_array($result_suborder);
$max_suborder = $main_row['submenu_order'];
if ($max_suborder == '') {
    $max_suborder = 1;
} else {
    $max_suborder = $max_suborder + 1;
}

if ($operation == 'mainmenu_save') {

    $query =
        "insert into mst_mmd_menu
            (menu_title,menu_link,mainmenu_order,inserted_by,uploaded_on,updated_on) values('$menu_title','$menu_link','$max_mainorder','$sessionId','$currdate','$currdate')";

    $result = pg_query($db, $query);

    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }

    echo json_encode($files_arr);
} elseif ($operation == 'submenu_save') {

    $query =
        "insert into mst_mmd_menu (menu_title,menu_link,submenu_id,submenu_order,inserted_by,uploaded_on,updated_on) values('$menu_title','$menu_link',$submenu_id,'$max_suborder','$sessionId','$currdate','$currdate')";
    $result = pg_query($db, $query);

    if ($result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }

    echo json_encode($files_arr);
} elseif ($operation == 'editmenu') {
    $edit_query =
        "update mst_mmd_menu set menu_title ='$menu_title' ,menu_link='$menu_link',updated_by ='$sessionId' ,updated_on='$currdate'  where menu_id = $masmenu_id";
    $edit_result = pg_query($db, $edit_query);

    if ($edit_result) {
        $files_arr['status'] = 'ok';
    } else {
        $files_arr['status'] = 'error';
    }
    echo json_encode($files_arr);
} elseif ($operation == 'mainmenu_order') {
    $position = $_POST['position'];

    $i = 1;

    foreach ($position as $k => $v) {
        $sql =
            'Update mst_mmd_menu SET mainmenu_order=' .
            $i .
            ' WHERE menu_id=' .
            $v;

        $result = pg_query($db, $sql);

        $i++;
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'err';
            return false;
        }
    }
    echo json_encode($files_arr);
} elseif ($operation == 'submenu_order') {
    $position = $_POST['position'];

    $i = 1;

    foreach ($position as $k => $v) {
        $sql =
            'Update mst_mmd_menu
             SET submenu_order=' .
            $i .
            ' WHERE menu_id=' .
            $v;

        $result = pg_query($db, $sql);

        $i++;
        if ($result) {
            $files_arr['status'] = 'ok';
        } else {
            $files_arr['status'] = 'err';
            return false;
        }
    }
    echo json_encode($files_arr);
} elseif ($operation == 'delete_mainmenu') {
    $sql =
        "update mst_mmd_menu set mainmenu_status='N',submenu_status='N' ,updated_by ='$sessionId',uploaded_on ='$currdate'  where  menu_id= $masmenu_id ";

    $result = pg_query($db, $sql);

    if ($result) {
        $data['status'] = 'ok';
    } else {
        $data['status'] = 'error';
    }
    echo json_encode($data);
} elseif ($operation == 'delete_submenu') {
    $sql =
        "update mst_mmd_menu set submenu_status='N',updated_by ='$sessionId',uploaded_on ='$currdate'  where  menu_id= $masmenu_id ";

    $result = pg_query($db, $sql);

    if ($result) {
        $data['status'] = 'ok';
    } else {
        $data['status'] = 'error';
    }
    echo json_encode($data);
}
