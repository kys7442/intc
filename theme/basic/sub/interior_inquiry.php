<?php
include_once('../../../common.php');
$g5['title'] = "견적 및 문의";
$main_menu = "인테리어";
$depth1 = 3;
$depth2 = 1;

include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>
<div class="inquiry_section sub  pt140 pb120">
	<div class="sub_container">
		<div class="inner_container">
			<h3 class="tits fs_40 fw_800 mb50"><?php echo $g5['title'] ?></h3>
			<div class="info_box interior">
				<ul class="dfbox">
					<li class="fs_18 fw_500">한 번의 견적의뢰로 5군데 종합검토 후 최상업체와 최하의 업체 배제 후 3군데 업체로 압축한 다음 업체 미팅 혹은, 선별 미팅이 가능합니다. (최대 시간절약)</li>
					<li class="fs_18 fw_500">원하시는 인테리어 공사는 해당 공사를 전문적으로 업체를 선별하여 최대한 고객 니즈에 맞게 시공해드립니다.</li>
					<li class="fs_18 fw_500">부동산 계약 유무를 확인하여 2개월 이내의 공사로 우선 견적 하여 드립니다. &#60;현지 답사&#62;, &#60;허위 비교 견적 방지&#62;</li>
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