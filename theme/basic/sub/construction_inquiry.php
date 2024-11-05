<?php
include_once('../../../common.php');
$g5['title'] = "견적 및 문의";
$main_menu = "종합건설";
$depth1 = 1;
$depth2 = 1;
include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>
<div class="inquiry_section sub pt140 pb120">
	<div class="sub_container">
		<div class="inner_container">
			<h3 class="tits fs_40 fw_800 mb50"><?php echo $g5['title'] ?></h3>
			<div class="info_box construction">
				<ul class="dfbox">
					<li class="fs_18 fw_500">예산에 맞게 건물 크기 검토</li>
					<li class="fs_18 fw_500">대지 분석 및 수익성 검토</li>
					<li class="fs_18 fw_500">설계 건축사 연결</li>
					<li class="fs_18 fw_500">기본 계획안 검토</li>
					<li class="fs_18 fw_500">인허가 및 준공 · 추후 시설, 유지 관리</li>
				</ul>
			</div>
			<h4 class="fs_30 fw_800 sub_inquiry_title">시공문의</h4>
			<?php include_once(G5_THEME_PATH.'/sub/contact_form.php'); ?>
		</div>
	</div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>