<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 277;
$thumb_height = 180;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="swiper-overflow-container">
	<div class="swiper-container realty_swiper"> 

		<div class="latest_pic_slide swiper-wrapper">
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
			<div class="galley_li swiper-slide">
				<div class="line"></div>
				<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link fs_14 fw_500"><?php echo $list[$i]['ca_name'] ?></a>
				<?php
					echo "<div class='cont'>";
					echo "<a class='title fs_18 fw_600' href=\"".$list[$i]['href']."\"> ";
						if ($list[$i]['is_notice'])
								echo $list[$i]['subject'];
						else
								echo $list[$i]['subject'];
						echo "</a>";
					echo "</div>";
				?>
				<div class="img_box">
					<a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
			</div>
		</div>
		<?php }  ?>
		<?php if ($list_count == 0) { //게시물이 없을 때  ?>
			<div class="empty_li">게시물이 없습니다.</div>
		<?php }  ?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</div>

<script>
$(document).ready(function(){

	var realtySwiper = new Swiper(".realty_swiper", {
		slidesPerView: 4,
    spaceBetween: 30,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			300: {
				slidesPerView: 1,
				spaceBetween: 10,
			},
			480: {
				slidesPerView: 1,
				spaceBetween: 20,
			},
			767: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
		},
	});
/*
  $('.latest_pic_slide').slick({
		 slidesToShow: 4,
         slidesToScroll: 1,
         infinite: true,
         arrows: true,
         //dot: true,
         autoplay: false,
         autoplaySpeed: 2000,
         responsive: [
    {
      breakpoint: 980,
      settings: {
        arrows: true,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
        settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
	});
*/
});
</script>
