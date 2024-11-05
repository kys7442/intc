<?php
	add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_CSS_URL.'/sub.css?ver='.G5_CSS_VER.'">', 0);
	//add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_CSS_URL.'/information.css?ver='.G5_CSS_VER.'">', 0);

	/* depth1, depth2 메뉴 */
	$depth_name_1 = array('종합건설', '창호', '인테리어', '부동산정보', '부분공사 문의');
	$depth_name_2 = array(
		array('견적 및 문의', '시공사례'),
		array('견적 및 문의', '시공사례'),
		array('견적 및 문의', '시공사례'),
		array('아파트', '빌라/연립', '단독주택'),
	);
	/* //depth1, depth2 메뉴 */
?>

<script>
	var agent = navigator.userAgent.toLowerCase();

    if( agent.indexOf('android') > -1 ) {
        // 안드로이드인 경우
    }else if( agent.indexOf("iphone") > -1 || agent.indexOf("ipad") > -1 || agent.indexOf("ipod") > -1 ) {
        // IOS인 경우
		$('#container').addClass('iosver');
    }else{
        // 기타
    }
</script>

<!-- 상단 서브비쥬얼 -->
<div class="sub_banner sub_page_<?=$depth1?>">
	<div class="sub_txt">
		<!--h2 class="tit"><?=$depth_name_2[($depth1 - 1)][($depth2 - 1)]?></h2-->
		<h2 class="tit"><?=$depth_name_1[($depth1 - 1)]?></h2>
		
		<ul class="nav">
			<li><a href="/">HOME</a></li>
			<li><?=$depth_name_1[($depth1 - 1)]?></li>
			<li><?=$depth_name_2[($depth1 - 1)][($depth2 - 1)]?></li>
		</ul>
	</div>
</div>

<!-- 서브메뉴바 -->
<?php if($depth2){ ?>
<div class="sub_depth2 inner_container">
	<div class="sub_depth2_inner">
		<?php if($depth1 == 1){ ?>
		<!-- 종합건설 -->
		<ul class="sub_depth2_nav">
			<li <?php if($depth2 == 1) echo "class='on'"?>><a href="/sub/construction_inquiry"><?=$depth_name_2[0][0]?></a></li>
			<li <?php if($depth2 == 2) echo "class='on'"?>><a href="/construction"><?=$depth_name_2[0][1]?></a></li>
		</ul>
		<?php } ?>
		
		
		<?php if($depth1 == 2){ ?>
		<!-- 창호 -->
		<ul class="sub_depth2_nav">
			<li <?php if($depth2 == 1) echo "class='on'"?>><a href="/sub/windows_inquiry"><?=$depth_name_2[1][0]?></a></li>
			<li <?php if($depth2 == 2) echo "class='on'"?>><a href="/windows"><?=$depth_name_2[1][1]?></a></li>
		</ul>
		<?php } ?>
		
		
		<?php if($depth1 == 3){ ?>
		<!-- 인테리어 -->
		<ul class="sub_depth2_nav">
			<li <?php if($depth2 == 1) echo "class='on'"?>><a href="/sub/interior_inquiry"><?=$depth_name_2[2][0]?></a></li>
			<li <?php if($depth2 == 2) echo "class='on'"?>><a href="/interior"><?=$depth_name_2[2][1]?></a></li>
		</ul>
		<?php } ?>
		
		
		<?php if($depth1 == 4){ ?>
		<!-- 부동산정보 -->
		<ul class="sub_depth2_nav">
			<li <?php if($depth2 == 1) echo "class='on'"?>><a href="/realty"><?=$depth_name_2[3][0]?></a></li>
			<li <?php if($depth2 == 2) echo "class='on'"?>><a href="/realty_villa"><?=$depth_name_2[3][1]?></a></li>
			<li <?php if($depth2 == 3) echo "class='on'"?>><a href="/realty_housing"><?=$depth_name_2[3][2]?></a></li>
		</ul>
		<?php } ?>
		

		<div class="sub_depth2_nav_mo">
			<!-- 1뎁스메뉴 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/sub/construction_inquiry" <?php if($depth1 == 1) echo "selected"?>><?=$depth_name_1[0]?></option>
					<option value="/sub/windows_inquiry" <?php if($depth1 == 2) echo "selected"?>><?=$depth_name_1[1]?></option>
					<option value="/sub/interior_inquiry" <?php if($depth1 == 3) echo "selected"?>><?=$depth_name_1[2]?></option>
					<option value="/realty" <?php if($depth1 == 4) echo "selected"?>><?=$depth_name_1[3]?></option>
					<option value="/sub/inquiry_etc" <?php if($depth1 == 5) echo "selected"?>><?=$depth_name_1[4]?></option>
				</select>
			</div>
			
			<!-- 2뎁스메뉴 -->
			<?php if($depth1 == 1){ ?>
			<!-- 종합건설 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/sub/construction_inquiry" <?php if($depth2 == 1) echo "selected"?>><?=$depth_name_2[0][0]?></option>
					<option value="/construction" <?php if($depth2 == 2) echo "selected"?>><?=$depth_name_2[0][1]?></option>
				</select>
			</div>
			<?php } ?>
			
			<?php if($depth1 == 2){ ?>
			<!-- 창호 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/sub/windows_inquiry" <?php if($depth2 == 1) echo "selected"?>><?=$depth_name_2[1][0]?></option>
					<option value="/windows" <?php if($depth2 == 2) echo "selected"?>><?=$depth_name_2[1][1]?></option>
				</select>
			</div>
			<?php } ?>
		
			<?php if($depth1 == 3){ ?>
			<!-- 인테리어 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/sub/interior_inquiry" <?php if($depth2 == 1) echo "selected"?>><?=$depth_name_2[2][0]?></option>
					<option value="/interior" <?php if($depth2 == 2) echo "selected"?>><?=$depth_name_2[2][1]?></option>
				</select>
			</div>
			<?php } ?>
		
			<?php if($depth1 == 4){ ?>
			<!-- 부동산정보 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/realty" <?php if($depth2 == 1) echo "selected"?>><?=$depth_name_2[3][0]?></option>
					<option value="/realty_villa" <?php if($depth2 == 2) echo "selected"?>><?=$depth_name_2[3][1]?></option>
					<option value="/realty_housing" <?php if($depth2 == 3) echo "selected"?>><?=$depth_name_2[3][2]?></option>
				</select>
			</div>
			<?php } ?>
			<?php if($depth1 == 5){ ?>
			<!-- 부분공사 문의 -->
			<div class="select">
				<select name="" id="" onchange="location.href=this.value">
					<option value="/sub/inquiry_etc" <?php if($depth2 == 1) echo "selected"?>><?=$depth_name_2[4][0]?></option>
				</select>
			</div>
			<?php } ?>
		</div>

	</div>
</div>
<?php } ?>