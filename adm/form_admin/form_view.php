<?php
$sub_menu = "300200";
require_once './_common.php';
require_once G5_EDITOR_LIB;

auth_check_menu($auth, $sub_menu, 'w');


$sql = " select * from tb_form_request where wr_id = '{$wr_id}' ";
$result = sql_fetch($sql);

$html_title = '문의현황 상세';


$g5['title'] = $html_title;
require_once G5_ADMIN_PATH . '/admin.head.php';
add_stylesheet('<link rel="stylesheet" href="../css/admin.css">', 0);
?>

<section id="anc_bo_basic">
    <h2 class="h2_frm">문의현황 상세</h2>
    <div class="container_wr">
        <div class="tbl_frm01 tbl_wrap">
            <table>
                <colgroup>
                    <col class="grid_4"/>
                    <col/>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">이름</th>
                        <td><?=$result['wr_name']?></td>
                    </tr>
                    <tr>
                        <th scope="row">연락처</th>
                        <td><?=$result['wr_tel']?></td>
                    </tr>
                    <tr>
                        <th scope="row">구분</th>
                        <td><?=$result['wr_1']?></td>
                    </tr>
                    <tr>
                        <th scope="row">현장주소</th>
                        <td>
                        <?=$result['wr_3']?>
                        <?=$result['wr_4']?></td>
                    </tr>
                    <tr>
                        <th scope="row">현장 상세주소</th>
                        <td><?=$result['wr_5']?></td>
                    </tr>
                    <tr>
                        <th scope="row">부동산 계약여부</th>
                        <td><?=$result['wr_6']?></td>
                    </tr>
                    <tr>
                        <th scope="row">예정일(희망)</th>
                        <td><?=$result['wr_7']?></td>
                    </tr>
                    <tr>
                        <th scope="row">문의내용</th>
                        <td><?=nl2br($result['wr_content'])?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</section>

<div class="btn_bottom">
	<a href="./form_list.php" class="btn btn_02">목록으로</a>
</div>


<?php
require_once G5_ADMIN_PATH . '/admin.tail.php';
