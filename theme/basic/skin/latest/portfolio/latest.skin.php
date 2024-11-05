<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 280;
$thumb_height = 360;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>



<div class="full_container main_exBoard dfbox">
	<!--portfolio title-->
	<div class="main_exBoard_txt">
		<div class="txt_wrap pt50">
			<small>construction</small>
			<h4 class="fs_40 fw_800">종합건설</h4>
			<p class="fs_18 fw_500">인허가 및 준공<br>신축/대수선/용도변경<br>유지 및 관리</p>
		</div>
		<!-- paging_box -->
		<div class="paging_box dfbox mt110">
			<div class="current-slide count_txt fs_14 fw_600"></div>
			<div class="progress_bar_wrap">
				<div class="inner_container">
					<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						<span class="slider__label sr-only"></span>
					</div>
				</div>
			</div>
			<div class="total-slides count_txt fs_14 fw_600"></div>
		</div>
		<!-- //paging_box -->
	</div>
	<!--//portfolio title-->
	<div class="content">
			<div class="slider">
					<?php
		for ($i=0; $i<$list_count; $i++) {
		$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

		if($thumb['src']) {
			$img = $thumb['src'];
		} else {
			$img = G5_IMG_URL.'/no_img.png';
			$thumb['alt'] = '이미지가 없습니다.';
		}
		$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
		?>
					<div>
							<div class="image">
									<a href="<?php echo $list[$i]['href'] ?>">
											<div class="img_holder">
													<?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
											</div>
											<div class="slider_txt">
													<h3 class="fs_18 fw_600"><?php echo $list[$i]['subject'];?></h3>
											</div>
									</a>
							</div>
					</div>
					<?php }  ?>
					<?php if ($list_count == 0) { //게시물이 없을 때  ?>
					<div class="empty_li">게시물이 없습니다.</div>
					<?php }  ?>
			</div>
	</div> <!-- end content -->
</div>

<script>

$('.slider').each(function(index, element) {
	//포트폴리오 슬라이더
	let $slider = $(element);
	let $progressBar = $slider.closest('.main_exBoard').find('.progress');
	let $progressBarLabel = $progressBar.find('.slider__label');

	$slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
		let calc = ((nextSlide) / (slick.slideCount - 1)) * 100;
		$progressBar
			.css('background-size', calc + '% 100%')
			.attr('aria-valuenow', calc);

		$progressBarLabel.text(calc + '% completed');
	});

	$('.slider').on('init afterChange', function(event, slick, currentSlide){
    $('.current-slide').text(currentSlide + 1);
  });

  $('.slider').on('init', function(event, slick){
    $('.total-slides').text(slick.slideCount);
		$('.current-slide').text(slick.currentSlide + 1);
  });
});
/*
	$slider.slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		pauseOnHover: true,
		responsive: [{
			breakpoint: 981,
			settings: {
				slidesToShow: 4
			}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 481,
				settings: {
					slidesToShow: 2
				}
			}
		]
	});
	$slider.slick('refresh');
});*/
</script>