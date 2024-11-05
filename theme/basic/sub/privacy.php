<?php
include_once('../../../common.php');

$g5['title'] = "개인정보처리방침";
$main_menu = "개인정보처리방침";
$depth1 = 6;

include_once(G5_THEME_PATH.'/head.php');
?>

<?php include(G5_THEME_PATH.'/sub/sub_common.php')?>
<div class="sub_container etc">
	<div class="contain_inner">
		<h2 class="fw_700">개인정보처리방침</h2>
		<div class="textarea"><?php include(G5_THEME_PATH."/sub/privacy_form.php")?></div>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>