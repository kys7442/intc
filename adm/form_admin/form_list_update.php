<?php
$sub_menu = '999100';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, 'w');
check_admin_token();

if($w == "d") {

    $sql = " delete from {$write_table} where wr_id = '$wr_id' ";
    sql_query($sql);
    goto_url('./form_list.php?' . $qstr);
    
}else{

    $post_chk       = isset($_POST['chk']) ? (array) $_POST['chk'] : array();
    $act_button     = isset($_POST['act_button']) ? $_POST['act_button'] : '';
    
    $chk_count = count($post_chk);
    
    if (!$chk_count) {
        alert($act_button . '할 목록을 1개 이상 선택해 주세요.');
    }
    
    for ($i = 0; $i < $chk_count; $i++) {
        if ($act_button == '선택삭제') {       
            $wr_id = (int) $_POST['chk'][$i];
            $sql = " delete from {$write_table} where wr_id = '$wr_id' ";
            sql_query($sql);
        }
    }
    
    goto_url('./form_list.php?' . $qstr);
    
}
