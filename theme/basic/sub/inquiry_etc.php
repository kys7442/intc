<?php
include_once('../../../common.php');
$g5['title'] = "부분공사 문의";
$main_menu = "부분공사 문의";
$depth1 = 5;

include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>
<div class="inquiry_section sub pt100 pb120">
	<div class="sub_container">
		<div class="inner_container">
			<h3 class="tits fs_40 fw_800 mb50"><?php echo $g5['title'] ?></h3>

			<?php include_once(G5_THEME_PATH.'/sub/contact_form.php'); ?>
		</div>
	</div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>