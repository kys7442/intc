<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
            
$chk_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$chk_domain	= $_SERVER['SERVER_NAME'];
if(!stristr( $chk_url , $chk_domain)){
    alert("잘못된 접근입니다.");
    exit;
}

$msg = ""; //완료 메시지용
$mail_content = ""; // 메일발송 데이터
$table_field = get_form_table_field();

// 공통 쿼리용
$query_arr = array();

for($i=0; $i<sizeof($table_field); $i++) {
    $value = ${$table_field[$i]['field']};

    if( $table_field[$i]['type'] == 'date' ){
        $value = G5_TIME_YMDHIS;
    } elseif ( $table_field[$i]['type'] == 'text_split' ){
        $value = implode('|', $value);
    }
    $mail_content .= " - {$table_field[$i]['title']} : {$value} <br>";

    $query_arr[] = " {$table_field[$i]['field']} = '{$value}' ";
}

if ($w == "")
{   
    $sql_common = implode(',', $query_arr);

    // 저장 쿼리.
    $sql = " insert {$write_table} set $sql_common ";
    sql_query($sql);

    $msg = "문의가 등록되었습니다";
    
    // 메일발송
	include $_SERVER['DOCUMENT_ROOT']."/theme/basic/sub/mail.php";

    alert($msg, $_SERVER['HTTP_REFERER']);
}

?>