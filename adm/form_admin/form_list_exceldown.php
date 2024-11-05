<?php
$sub_menu = '999100';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

// 엑셀 다운 정보
$sql = " select *
            from {$write_table}
            where 1=1
            order by wr_id desc ";
$result = sql_query($sql);

if(! function_exists('column_char')) {
    function column_char($i) {
        return chr( 65 + $i );
    }
}

include_once(G5_LIB_PATH.'/PHPExcel.php');

$table_field = get_form_table_field();


$headers = array();
$headers[] = 'No';
for($i=0; $i<sizeof($table_field); $i++) {
    $headers[] = $table_field[$i]['title'];
}

$widths  = array(10, 20, 20, 20, 20, 30, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20);// 넓이 설정이 필요하다면 추가.

$header_bgcolor = 'FFABCDEF';
$last_char = column_char(count($headers) - 1);
$rows = array();
for($i=1; $row=sql_fetch_array($result); $i++) {
    $row_data = array();
    $row_data[] = ' '.$i;
    for($j=0; $j<sizeof($table_field); $j++){
        $val = $row[$table_field[$j]['field']];
        $val = get_form_field($table_field[$j]['type'], $val, 'excel');

        $row_data[]=' '.$val;
    }
    $rows[] = $row_data;
}

$data = array_merge(array($headers), $rows);

$excel = new PHPExcel();
$excel->getDefaultStyle()->getFont()->setName('Arial')->setSize(11);

$excel->setActiveSheetIndex(0)->getStyle( "A1:{$last_char}1" )->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB($header_bgcolor);
$excel->setActiveSheetIndex(0)->getStyle( "A:$last_char" )->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
foreach($widths as $i => $w) $excel->setActiveSheetIndex(0)->getColumnDimension( column_char($i) )->setWidth($w);
$excel->getActiveSheet()->fromArray($data,NULL,'A1');

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"exceldown_list-".date("ymd", time()).".xls\"");
header("Cache-Control: max-age=0");

$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$writer->save('php://output');
