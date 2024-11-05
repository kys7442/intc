<?php
$sub_menu = "300900";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'r');

$table_field = get_form_table_field(); //목록 항목별 데이터베이스 연동 표시정보

$sql_common = " from {$write_table} ";
$sql_search = " where 1=1 ";
/*if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}*/

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "wr_name":
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default:
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if ($sst) {
    $sql_order = " order by {$sst} {$sod} ";
} else {
    $sql_order = " order by wr_id desc ";
}

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) {
    $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
}
$from_record = ($page - 1) * $rows; // 시작 열을 구함
//역순 페이징을 위한 번호.
$listnum = $total_count - (($page-1) * $rows);

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$g5['title'] = '문의현황';
require_once G5_ADMIN_PATH . '/admin.head.php';

$colspan = sizeof($table_field) + 2;
?>
<?php
if ($member['mb_id'] == 'admin') $is_admin = 'super';
?>
<style>
    .custom_line_view{ white-space:pre; text-align: left!important; } /* 문의내용 줄바꿈 및 정렬 처리 */
</style>
<div class="local_ov01 local_ov">
    <span class="btn_ov01"><span class="ov_txt">총 등록수</span><span class="ov_num"> <?php echo number_format($total_count) ?>명</span></span>
</div>

<!-- <form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_name" <?php echo get_selected($sfl, "wr_name"); ?>>이름</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" id="stx" value="<?php echo $stx ?>" required class="required frm_input">
    <input type="submit" value="검색" class="btn_submit">
</form> -->


<form name="form_list" id="form_list" action="form_list_update.php" onsubmit="return form_list_submit(this);" method="post">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
                <tr>
                    <th scope="col">
                        <label for="chkall" class="sound_only">등록신청 전체</label>
                        <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                    </th>
                    <th scope="col">No</th>
                    <? for($i=0; $i<sizeof($table_field); $i++) {
                        if(!$table_field[$i]['isView']) continue;
                    ?>
                        <th scope="col"><?=$table_field[$i]['title']?></th>
                    <? }?>
                    <th scope="col">관리</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    $bg = 'bg' . ($i % 2);
                ?>
                    <tr class="<?php echo $bg; ?>">
                        <td class="td_chk">
                            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['wr_name'] ?> 신청서</label>
                            <input type="checkbox" name="chk[]" value="<?php echo $row['wr_id'] ?>" id="chk_<?php echo $i ?>">
                        </td>
                        <td class="td_chk"><?=($listnum - $i)?></td>

                        <? 
                        for($j=0; $j<sizeof($table_field); $j++) { 
                            if(!$table_field[$j]['isView']) continue;

                            $str_add = "";
                            if($table_field[$j]['title'] == "현장주소"){
                                $str_add =$row["wr_4"];
                            }
                        ?>
                            <td class="<?=$table_field[$j]['class']?>"><?=get_form_field($table_field[$j]['type'], $row[$table_field[$j]['field']]); ?> <?=$str_add?></td>
                        <? }?>
                        <td class="td_mng_m">
                            <!-- <button type="button" class="btn_submit btn" onclick="">삭제</button> -->
                            <a href="./form_view.php?w=u&amp;wr_id=<?php echo $row['wr_id']; ?>" class="btn btn_03">상세</a>&nbsp;&nbsp;
                            <a href="./form_list_update.php?w=d&amp;wr_id=<?php echo $row['wr_id']; ?>&amp;page=<?=$page?>&amp;<?=$qstr?>" onclick="return delete_confirm(this);" class="btn btn_submit">삭제</a>
                        </td>
                    </tr>
                <?php
                }
                if ($i == 0) {
                    echo '<tr><td colspan="' . $colspan . '" class="empty_table">자료가 없습니다.</td></tr>';
                }
                ?>
        </table>
    </div>

    <div class="btn_fixed_top">
        <a href="form_list_exceldown.php" class="btn btn_01">전체 다운로드</a>
        <input type="submit" name="act_button" onclick="document.pressed=this.value" value="선택삭제" class="btn btn_02">
    </div>
</form>

<?php
$pagelist = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'] . '?' . $qstr . '&amp;page=');
echo $pagelist;
?>

<script>

    function excel_upload() {
        var url = "form_list_excelup.php";
        window.open(url,"excel_upload","height=230, width=600, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, top=100, left=100");
    }

    function form_list_submit(f) {
        if (!is_checked("chk[]")) {
            alert(document.pressed + " 하실 항목을 하나 이상 선택하세요.");
            return false;
        }

        if (document.pressed == "선택삭제") {
            if (!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
                return false;
            }
        }

        return true;
    }
</script>

<?php
require_once G5_ADMIN_PATH . '/admin.tail.php';
