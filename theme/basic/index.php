<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<div class="banner_section">
	<div class="swiper mainSwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide slide1">
				<div class="swiper-slide-cover"></div>
			</div>
			<div class="swiper-slide slide2">
				<div class="swiper-slide-cover"></div>
			</div>
			<div class="swiper-slide slide3">
				<div class="swiper-slide-cover"></div>
			</div>
		</div>
		<div class="txtbtn_wrap">
			<div class="inner_container">
				<div class="txts">
					<h2 class="fs_60 fw_800">INT-X</h2>
					<div class="line"></div>
					<p class="fs_20 fw_400">섬세한 솜씨와 혁신적인 디자인으로 귀하의 꿈을 현실로 만들고 항상 최고의 결과물을 추구함으로서, <br>단순히 공간을 꾸미는 것을 넘어 삶의 질을 향상시키는 특별한 경험을 제공합니다.</p>
				</div>
				<div class="btns dfbox mt100">
					<div class="swiper-pagination"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="link_section">
	<div class="inner_container">
		<ul class="dfbox">
			<li>
				<a href="<?= G5_URL; ?>/sub/construction_inquiry">
					<div class="dfbox">
						<div class="icon"><img src="<?= G5_THEME_IMG_URL; ?>/main/link_icon01.png" alt="icon"></div>
						<div class="txt">
							<strong class="fs_24 fw_800">종합건설</strong>
							<p class="fs_16 fw_300">바로가기 →</p>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="<?= G5_URL; ?>/sub/windows_inquiry">
					<div class="dfbox">
						<div class="icon"><img src="<?= G5_THEME_IMG_URL; ?>/main/link_icon02.png" alt="icon"></div>
						<div class="txt">
							<strong class="fs_24 fw_800">창호</strong>
							<p class="fs_16 fw_300">바로가기 →</p>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="<?= G5_URL; ?>/sub/interior_inquiry">
					<div class="dfbox">
						<div class="icon"><img src="<?= G5_THEME_IMG_URL; ?>/main/link_icon03.png" alt="icon"></div>
						<div class="txt">
							<strong class="fs_24 fw_800">인테리어</strong>
							<p class="fs_16 fw_300">바로가기 →</p>
						</div>
					</div>
				</a>
			</li>
			<li>
				<a href="<?= G5_URL; ?>/realty">
					<div class="dfbox">
						<div class="icon"><img src="<?= G5_THEME_IMG_URL; ?>/main/link_icon04.png" alt="icon"></div>
						<div class="txt">
							<strong class="fs_24 fw_800">부동산정보</strong>
							<p class="fs_16 fw_300">바로가기 →</p>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>

<div class="quot_section pbt100">
	<div class="inner_container">
		<h3 class="tits fs_40 fw_800 mb50">공사 무료 견적 상황</h3>
		<form name="" action="" method="GET">
			<div class="quot_form">
				<div class="thead dfbox">
					<p class="fs_18 fw_500">등록일</p>
					<p class="fs_18 fw_500">공사구분</p>
					<p class="fs_18 fw_500">현장위치</p>
					<p class="fs_18 fw_500">성명</p>
					<p class="fs_18 fw_500">예정일</p>
				</div>
				<div class="swiper quot_slide">
					<div class="swiper-wrapper">
						<?
						$sql = " select * from tb_form_request order by wr_id desc ";
						$result = sql_query($sql);
						$slide_cnt = 0;
						for ($i=0; $row=sql_fetch_array($result) ; $i++) { 
							$slide_cnt++;
						?>
						<div class="swiper-slide tbody dfbox">
							<p><span class="fs_16 fw_300 date"><?=str_replace('-', '.', substr($row['wr_datetime'], 0, 10))?></span></p>
							<p class="fs_16 fw_300"><?=$row['wr_1']?></p>
							<p class="fs_16 fw_300"><?=$row['wr_3']." ".$row['wr_4']?></p>
							<p class="fs_16 fw_300"><?=get_text(cut_str($row['wr_name'], 1, '**'))?></p>
							<p class="fs_16 fw_300"><?=$row['wr_7']?></p>
						</div>
						<? } ?>
						<? if($i==0) { ?>
						<div class="swiper-slide tbody dfbox">
							<p class="fs_16 fw_300" style="width: 100%;">데이터가 없습니다.</p>
						</div>	
						<? } ?>
						<!-- <div class="swiper-slide tbody dfbox">
							<p><span class="fs_16 fw_300 date">2024.1.23</span></p>
							<p class="fs_16 fw_300">종합건설</p>
							<p class="fs_16 fw_300">서울시 동작구</p>
							<p class="fs_16 fw_300">김OO</p>
							<p class="fs_16 fw_300">1개월 이내</p>
						</div> -->
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="inquiry_section main pt100 pb120">
	<div class="inner_container">
		<h3 class="tits fs_40 fw_800 mb50">무료 시공 문의</h3>
		<?php include_once(G5_THEME_PATH.'/sub/contact_form.php'); ?>
	</div>
</div>

<div class="constr_section pbt120">
	<div class="inner_container">
		<h3 class="tits fs_40 fw_800 mb65">시공사례</h3>
		<div class="tab_wrap">
			<div class="tabs">
				<button class="active" type="button" rel="tab1"><span class="fs_18 fw_600">종합건설</span></button>
				<button type="button" rel="tab2"><span class="fs_18 fw_600">창호</span></button>
				<button type="button" rel="tab3"><span class="fs_18 fw_600">인테리어</span></button>
			</div>
		</div>
		<div class="board_container">
			<div id="tab1" class="tab_content">
				<div class="board_wrap"><?php echo latest('theme/portfolio', 'construction', 5, 60); ?></div>
			</div>
			<div id="tab2" class="tab_content">
				<div class="board_wrap"><?php echo latest('theme/portfolio', 'windows', 5, 60); ?></div>
			</div>
			<div id="tab3" class="tab_content">
				<div class="board_wrap"><?php echo latest('theme/portfolio', 'interior', 5, 60); ?></div>
			</div>
		</div>
	</div>
</div>

<div class="realty_section pbt120">
	<div class="inner_container">
		<h3 class="tits fs_40 fw_800 mb50">부동산 정보</h3>
		<div class="board_wrap"><?php echo latest('theme/latest_pic_b', 'realty', 5, 60); ?></div>
	</div>
	<p class="bg_txt">INT-X</p>
</div>


<script>
$(document).ready(function(){
	var mainSwiper = new Swiper(".mainSwiper", {
		loop: true,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
	});

	var quot = new Swiper(".quot_slide", {
		direction: "vertical",
		autoHeight: false,
		slidesPerView: <?=$slide_cnt < 5 ? $slide_cnt: 5 ?>,//보여줄 이미지갯수
		slidesPerGroup: 1,
		slidesPerColumn: 1,      // 한 열에 보여지는 슬라이드 수
		loop: true,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
	});

	let quotSlide = document.querySelector('.quot_slide');
	let slides = quotSlide.querySelectorAll('.swiper-slide:not(.swiper-slide-duplicate)');
	let slideCount = slides.length;
	slides.forEach(function(slide) {
		slide.style.height = '50px';
	});

	quotSlide.style.height = Math.min(slideCount, 5) * 50 + 'px';

	$(".tab_content").hide();
	$(".tab_content:nth-child(1)").show();

  /* if in tab mode */
	/*$(".tabs button").click(function() {
	
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn();		
	
		$(".tabs button").removeClass("active");
		$(this).addClass("active");
	});*/
	function initializeSlider(tabId) {
			$('#' + tabId + ' .slider').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				responsive: [{
					breakpoint: 767,
					settings: {
						slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1
						}
					}
				]
			});
    }

    function destroySlider(tabId) {
      $('#' + tabId + ' .slider').slick('unslick');
    }

		initializeSlider($('.tabs .active').attr('rel'));

		$('.tabs button').on('click', function () {
			var selectedTab = $(this).attr('rel');

			destroySlider($('.tabs .active').attr('rel'));

			$('.tabs button').removeClass('active');
			$(this).addClass('active');

			if (selectedTab === 'tab2') {
				$('.main_exBoard .txt_wrap small').text('windows');
				$('.main_exBoard .txt_wrap h4').text('창호');
				$('.main_exBoard .txt_wrap p').html('<p class="fs_18 fw_500">발코니 전체 교체<br>알루미늄, 커튼월</p>');
			} else if (selectedTab === 'tab3') {
				$('.main_exBoard .txt_wrap small').text('interior');
				$('.main_exBoard .txt_wrap h4').text('인테리어');
				$('.main_exBoard .txt_wrap p').html('<p class="fs_18 fw_500">주택/아파트<br>식당/병 · 한의원<br>호텔/공공기관</p>');
			} else {
				$('.main_exBoard .txt_wrap small').text('construction');
				$('.main_exBoard .txt_wrap h4').text('종합건설');
				$('.main_exBoard .txt_wrap p').html('<p class="fs_18 fw_500">인허가 및 준공<br>신축/대수선/용도변경<br>유지 및 관리</p>');
			}

			$('.tab_content').hide();
			$('#' + selectedTab).show();

			initializeSlider(selectedTab);
		});
});
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');