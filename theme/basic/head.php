<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
	<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
	<div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

	<?php
	if (defined('_INDEX_')) { // index에서만 실행
		include G5_BBS_PATH . '/newwin.inc.php'; // 팝업레이어
	}
	?>

	<div class="hd_pc">
		<div class="header_inner">
			<div class="logo">
				<a href="<?= G5_URL; ?>"><img src="<?= G5_THEME_IMG_URL; ?>/main/logo.png" alt="logo"></a>
			</div>
			<div class="menu">
				<?php include("main_menu.php"); ?>
			</div>
		</div>
	</div>

	<!-- 모바일 메뉴 -->
	<div class="header_hamburger_menu">
		<div id="hamburger-btn" class="navbar-toggle">
			<span class="hamburger">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</span>
		</div>
	</div>
	<div class="mobile-container-overlay"></div>

	<div id="mobile_menu_box" class="mobile_menu_contents">
		<div class="mobile_menu_inner_wrap">
			<?php include("main_menu.php"); ?>
		</div>
	</div>

	<div class="mobile_menu_logo">
		<a href="<?php echo G5_URL ?>" title="<?php echo $config['cf_title']; ?>"></a>
	</div>
	<!-- //모바일 메뉴 -->

	<script>
		$('.hd_pc').on('mouseover', function() {
			$(this).addClass('hov');
		})
		$('.hd_pc').on('mouseleave', function() {
			$(this).removeClass('hov');
		})
		var mobileMenuDepth1 = $('#mobile_menu_box .gnb_dep1>li');
		var reverseArray = [];
		for (var k = 0; k < mobileMenuDepth1.length; k++) {
			reverseArray.push(k);
		}
		reverseArray.reverse();
		var holdHamburger = "No";

		//서브메뉴 있을때 플러스 추가
		mobileMenuDepth1.each(function() {
			if ($(this).hasClass('menu-item-has-children')) {
				$(this).children('a').append('<span class="plus"><span class="plus_add"></span></span>');
			}
		});

		//모바일 가로모드일때 체크
		resizeBgdiagram();
		$(window).resize(function() {
			resizeBgdiagram();
		});

		function resizeBgdiagram() {
			if (screen.availWidth > screen.availHeight) {
				var reDiagram = screen.availWidth * 2.5;
				var rePosition = (reDiagram / 2) * -1;
				$('.mobile-container-overlay').css({
					'width': reDiagram + 'px',
					'height': reDiagram + 'px'
				});
				$('.mobile-container-overlay').css({
					'top': rePosition + 'px',
					'right': rePosition + 'px'
				});
			}
		}


		//햄버거메뉴 클릭시
		$('#hamburger-btn').click(function() {

			if ($('.mobile-container-overlay').hasClass('open') && holdHamburger == "No") {
				//닫힐때
				$('#hamburger-btn').removeClass('open');
				$('.header_hamburger_menu').removeClass('open');
				$('#mobile_menu_box li.menu-item-has-children').removeClass('open');
				// $('#mobile_menu_box .sub_menu').slideUp(200);
				for (var i = mobileMenuDepth1.length - 1; i >= 0; i--) {
					closeVisibleMenu(i);
				}
				setTimeout(function() {
					$('#mobile_menu_box .gnb_dep1>li').removeClass('visible');
					$('.mobile_menu_contents').removeClass('open');
					$('.mobile-container-overlay').removeClass('open').addClass('close');
					$('.mobile_menu_logo').removeClass('open');
				}, 800);


			} else if (!$('.mobile-container-overlay').hasClass('open') && holdHamburger == "No") {
				//열릴때
				holdHamburger = "Yes";
				$('#hamburger-btn').addClass('open');
				$('.header_hamburger_menu').addClass('open');
				$('.mobile_menu_contents').addClass('open');
				$('.mobile-container-overlay').addClass('open').removeClass('close');
				$('.mobile_menu_logo').addClass('open');
				setTimeout(function() {
					for (var i = 0; i < mobileMenuDepth1.length; i++) {
						openVisibleMenu(i);
					}
				}, 500);
				setTimeout(function() {
					holdHamburger = "No";
				}, mobileMenuDepth1.length * 400);
			}
		});


		function openVisibleMenu(index) {
			setTimeout(function() {
				$('#mobile_menu_box .gnb_dep1>li:eq(' + index + ')').addClass('visible');
			}, index * 200);
		}

		function closeVisibleMenu(index) {
			var returnNum = reverseArray[index];
			setTimeout(function() {
				$('#mobile_menu_box .gnb_dep1>li:eq(' + index + ')').removeClass('visible');
			}, returnNum * 80);
		}



		//윈도우 사이즈 조정시 초기값으로 셋팅
		$(window).resize(function() {
			if ($(window).width() > 1024) {
				$('#hamburger-btn').removeClass('open');
				$('#mobile_menu_box li.menu-item-has-children').removeClass('open');
				$('#mobile_menu_box li').removeClass('visible');
				$('#mobile_menu_box .sub_menu').hide();
				$('.mobile_menu_contents').removeClass('open');
				$('.mobile-container-overlay').removeClass('open').removeClass('close');
				$('.mobile_menu_logo').removeClass('open');
			}
		});


		//모바일 서브 메뉴 클릭시 slide open
		$('#mobile_menu_box li.menu-item-has-children>a').on('click', function() {
			$(this).removeAttr('href');
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp(200);
			} else {
				element.addClass('open');
				element.children('ul').slideDown(200);
				element.siblings('li').children('ul').slideUp(200);
				element.siblings('li').removeClass('open');
				element.siblings('li').find('li').removeClass('open');
				element.siblings('li').find('ul').slideUp(200);
			}
		});

		// ******모바일 메뉴 끝*****

		$(window).on('scroll', function() {
			if ($(window).width() <= 1024) {
				if ($(window).scrollTop() > 200) {
					$('.mobile_menu_logo').addClass('open');
				} else {
					$('.mobile_menu_logo').removeClass('open');
				}
			}
		})
	</script>
</div>
<!-- } 상단 끝 -->
<script>
	AOS.init({
		once: true,
		easing: 'ease-in-out',
		duration: 600
	}); // 자바스크립트로 init()을 해야 동작한다.
</script>


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }