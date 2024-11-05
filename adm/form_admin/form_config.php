<?php

// 신청테이블 정보.
$write_table = 'tb_form_request';
// 사용자 신청 페이지
$form_regist_page = '/sub/inquiry_etc';

// 테이블 생성처리.
if (!sql_query(" DESCRIBE {$write_table} ", false)) {
    $create_query = sql_query(
        " CREATE TABLE IF NOT EXISTS `{$write_table}` (
            wr_id            int auto_increment primary key comment '고유키',
            wr_name          varchar(50) not null comment '이름',
            wr_tel           varchar(20) null DEFAULT ''  comment '연락처',
            wr_email         varchar(100) null DEFAULT '' comment '이메일',
            wr_content       mediumtext null comment '문의내용',
            wr_1       varchar(200) null DEFAULT '' comment '구분',
            wr_2       varchar(200) null DEFAULT '' comment '소구분',
            wr_3       varchar(200) null DEFAULT '' comment '현장주소1',
            wr_4       varchar(200) null DEFAULT '' comment '현장주소2',
            wr_5       varchar(200) null DEFAULT '' comment '현장 상세주소',
            wr_6       varchar(1) null DEFAULT '' comment '부동산계약여부',
            wr_7       varchar(100) null DEFAULT '' comment '예약일(희망)',
            wr_8             varchar(100) null DEFAULT '' comment '추가필드8',
            wr_9             varchar(100) null DEFAULT '' comment '추가필드9',
            wr_10            varchar(100) null DEFAULT '' comment '추가필드10',

            wr_agree_1       varchar(1) default 'N'       comment '개인정보보호정책 동의',
            wr_datetime      datetime   default '0000-00-00 00:00:00' not null comment '등록일',
            wr_update_time   datetime   default '0000-00-00 00:00:00' not null comment '수정일'
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ", true );
}


/**
 * 간단하게 사용할 수 있는 토큰 처리 방식.
 *
 * get_write_token_custom('custom');
 * check_write_token_custom('custom');
 */
function get_write_token_custom($token_val)
{
    $token = md5(uniqid(rand(), true));
    set_session('custom_write_' . $token_val . '_token', $token);

    return $token;
}

function check_write_token_custom($token_val)
{
    if (!$token_val)
        alert('올바른 방법으로 이용해 주십시오.', G5_URL);

    $token = get_session('custom_write_' . $token_val . '_token');
    set_session('custom_write_' . $token_val . '_token', '');

    if (!$token || !$_REQUEST['token_write'] || $token != $_REQUEST['token_write'])
        alert('올바른 방법으로 이용해 주십시오.', G5_URL);

    return true;
}

/**
 * 주의 요망 !!!!
 * 신청 테이블 삭제 처리.
 */
function delete_form_table(){
    global $write_table;
    sql_query(" drop table {$write_table} ", true);
}

/**
 * 관리자 테이블 항목 표시를 위한 필드 표시.
 * 순서대로 표시됨
 */
function get_form_table_field($type = ''){

    $table_field = array(
        array( 'field'=>'wr_name', 'title'=>'이름', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_tel', 'title'=>'연락처', 'type'=>'phone', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_1', 'title'=>'구분', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_2', 'title'=>'소구분', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_3', 'title'=>'현장주소', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_4', 'title'=>'현장주소2', 'type'=>'text', 'isView'=>false, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_5', 'title'=>'현장 상세주소', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_6', 'title'=>'부동산계약여부', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),
        array( 'field'=>'wr_7', 'title'=>'예약일(희망)', 'type'=>'text', 'isView'=>true, 'required'=>true, 'save'=>true, 'class'=>'td_mng_m', 'excelDown'=>true, ),

        array( 'field'=>'wr_content', 'title'=>'문의내용', 'type'=>'textarea', 'isView'=>false, 'required'=>true, 'save'=>true, 'class'=>'custom_line_view', 'excelDown'=>true, ),
        array( 'field'=>'wr_datetime', 'title'=>'등록일', 'type'=>'date', 'isView'=>false, 'required'=>false, 'save'=>false, 'class'=>'td_mng_l', 'excelDown'=>true, ),
    );

    return $table_field;
}

/**
 * 타입에 맞는 결과물을 반환한다.
 */
function get_form_field($type = 'text', $word, $file_export = ''){
    $return_word = $word;

    if($type == 'text')
    {
        $return_word = strip_tags(trim(clean_xss_attributes($word)));
    }
    else if($type == 'text_split')
    {
        if($file_export == 'excel'){
            $lfcr = chr(10);
            $return_word = str_replace('|', $lfcr, trim($word));
        }else{
            $return_word = str_replace('|', '<br>', trim($word));
        }
    }
    else if($type == 'textarea')
    {
        $return_word = $word;
    }
    else if($type == 'phone')
    {
        $return_word = $word;
    }
    else if($type == 'email')
    {
        $return_word = $word;
    }
    else if($type == 'date')
    {
        if(trim($word) != ''){
            $return_word = date("Y-m-d H:i", strtotime($word));
        }
    }
    else if($type == 'file')
    {
        $return_word = $word;
    }

    return $return_word;
}
