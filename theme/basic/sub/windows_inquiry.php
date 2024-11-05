<?php
include_once('../../../common.php');
$g5['title'] = "견적 및 문의";
$main_menu = "창호";
$depth1 = 2;
$depth2 = 1;
include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>
<div class="inquiry_section sub pt140 pb120">
	<div class="sub_container">
		<div class="inner_container">
			<h3 class="tits fs_40 fw_800 mb50"><?php echo $g5['title'] ?></h3>
			<div class="info_box windows">
				<ul class="dfbox">
					<li class="fs_18 fw_500">KCC, 이끌림, LX, 이건창호, PVC 창호, 기타 등</li>
					<li class="fs_18 fw_500">현장실사 및 실측자료 본사 체크 후(필터링) 업체 비교견적을 한 번에(3군데)내어드립니다.</li>
					<li class="fs_18 fw_500">발코니 확장, 단열공사, 덧창공사, 터닝도어 등</li>
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