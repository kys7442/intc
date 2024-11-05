<?php 
	require_once G5_ADMIN_PATH . '/form_admin/form_config.php';

	// 불법접근을 막도록 토큰생성
	$token = md5(uniqid(rand(), true));
	set_session("ss_token", $token);
	set_session("ss_cert_no",   "");
	set_session("ss_cert_hash", "");
	set_session("ss_cert_type", "");

	add_javascript('<script src="'.G5_THEME_JS_URL.'/main.js"></script>', 0);
	if ($config['cf_cert_use'] && ($config['cf_cert_simple'] || $config['cf_cert_ipin'] || $config['cf_cert_hp']))
	add_javascript('<script src="'.G5_JS_URL.'/certify.js?v='.G5_JS_VER.'"></script>', 0);

?>

<form action="/form/form_write.php" class="questioning" method="post" name="fregisterform" id="fregisterform" onSubmit="return CheckForm()" autocomplete="off">
	<input type="hidden" name="w" value="<?=$w?>" />
	<input type="hidden" name="token" value="<?=$token?>" />
	
	<input type="hidden" name="cert_type" value="">
	<input type="hidden" name="cert_no" id="cert_no" value="">

	<div class="form_box">
		<div class="input_col_box dfbox">
			<div class="input_col dfbox">
				<label for="wr_name" class="thead">이름</label>
				<input type="text" id="wr_name" name="wr_name" class="txt_input tbody" placeholder="이름을 입력하세요">
			</div>
			<div class="input_col dfbox">
				<label for="wr_tel" class="thead">연락처</label>
				<div class="txt_btn tbody dfbox">
					<input type="tel" id="wr_tel" name="wr_tel" class="txt_input tbody" maxlength="13" placeholder="본인인증 시 자동입력 됩니다" readonly>

					<?php 
					if ($config['cf_cert_use']) {
						if ($config['cf_cert_hp']){
							echo '<button type="button" id="win_hp_cert" class="btn btn_form">본인인증</button>'.PHP_EOL;
						}
					}
					?>
					<?php
					if ($config['cf_cert_use'] && $member['mb_certify']) {
						switch  ($member['mb_certify']) {
							case "simple": 
								$mb_cert = "간편인증";
								break;
							case "ipin": 
								$mb_cert = "아이핀";
								break;
							case "hp": 
								$mb_cert = "휴대폰";
								break;
						}                 
					?>
					<? } ?>
				</div>
			</div>
		</div>
		<!-- <div class="input_col_box dfbox countbox">
			<div class="input_col dfbox">
				<label for="i_item3" class="thead">본인인증</label>
				<div class="txt_btn tbody dfbox">
					<input type="tel" id="i_item3" name="i_item3" class="txt_input" placeholder="핸드폰번호를 입력하세요">
					<button type="button">인증번호 전송</button>
				</div>
			</div>
			<div class="input_col">
				<div class="txt_btn dfbox">
					<div class="cert_box">
						<div class="cert_input">
							<input type="tel" id="i_item4" name="i_item4" class="txt_input" placeholder="인증번호를 입력하세요">
							<span class="count">유효기간 : 03:00</span>
						</div>
						<p class="info">인증번호가 전송되었습니다. <br>번호가 전송되지 않았을 경우, 재시도 해주시기 바랍니다.</p>
					</div>
					<button type="button">인증하기</button>
				</div>
			</div>
		</div> -->
		<div class="input_col_box dfbox">
			<div class="input_col dfbox">
				<label for="i_item5" class="thead">구분</label>
				<?php if($depth1 == 1){ ?>
				<span class="def_text">종합건설</span>
				<?php } ?>
				<?php if($depth1 == 2){ ?>
				<span class="def_text">창호</span>
				<?php } ?>
				<?php if($depth1 == 3){ ?>
				<span class="def_text">인테리어</span>
				<?php } ?>
			</div>
			<div class="input_col dfbox">
				<label for="sub_category" class="thead">소구분</label>
				<select name="wr_2" id="sub_category" class="tbody">
						<option value="" disabled selected>하위항목 선택</option>
				</select>
			</div>
		</div>
		<div class="input_col_box dfbox">
			<div class="input_col dfbox">
				<label for="i_item6" class="thead">현장주소</label>
				<div class="select_box dfbox tbody">
					<select name="wr_3" id="i_item6" data-gtm-form-interact-field-id="2">
						<option value="" disabled selected>시/도</option>
						<option value="강원도">강원도</option>
						<option value="경기도">경기도</option>
						<option value="경상남도">경상남도</option>
						<option value="경상북도">경상북도</option>
						<option value="광주광역시">광주광역시</option>
						<option value="대구광역시">대구광역시</option>
						<option value="대전광역시">대전광역시</option>
						<option value="부산광역시">부산광역시</option>
						<option value="서울특별시">서울특별시</option>
						<option value="세종특별자치시">세종특별자치시</option>
						<option value="울산광역시">울산광역시</option>
						<option value="인천광역시">인천광역시</option>
						<option value="전라남도">전라남도</option>
						<option value="전라북도">전라북도</option>
						<option value="제주특별자치도">제주특별자치도</option>
						<option value="충청남도">충청남도</option>
						<option value="충청북도">충청북도</option>
					</select>
					<select name="wr_4" id="i_item7" data-gtm-form-interact-field-id="2">
					</select>
				</div>
			</div>
			<div class="input_col dfbox">
				<label for="wr_5" class="thead">현장 상세주소</label>
				<input type="text" id="wr_5" name="wr_5" class="txt_input tbody" placeholder="현장 상세주소를 입력해주세요">
			</div>
		</div>
		<div class="input_col_box dfbox">
			<div class="input_col dfbox">
				<p class="fw_600 thead">부동산 계약여부</p>
				<div class="radio_box row2 tbody">
					<input type="radio" id="wr_6-1" name="wr_6" value="예" checked>
					<label for="wr_6-1"><span class="radio_figure"></span>예</label>
					<input type="radio" id="wr_6-2" name="wr_6" value="아니오">
					<label for="wr_6-2"><span class="radio_figure"></span>아니오</label>
				</div>
			</div>
			<div class="input_col dfbox">
				<label for="wr_7" class="thead">예정일(희망)</label>
				<input type="text" id="wr_7" name="wr_7" class="txt_input tbody" placeholder="예) 1개월 이내, 2주 후">
			</div>
		</div>
		<div class="input_col textarea_wrap dfbox">
			<label for="wr_content">문의내용</label>
			<textarea name="wr_content" id="wr_content" placeholder="문의내용을 입력해주세요"></textarea>
		</div>
		<div class="privacy_wrap">
			<p class="fw_600">개인정보 수집 및 동의</p>
			<div class="txt_wrap">
				<div class="textarea"><?php include(G5_THEME_PATH."/sub/privacy_form.php")?></div>
				<!-- <ul>
					<li>1. 수집 목적: 시공문의에 대한 기본적인 인적사항 체크</li>
					<li>2. 수집 항목: 이름, 휴대폰 전화번호</li>
					<li>3. 보유 및 이용 기간: 입력일로부터 1년까지</li>
				</ul> -->
			</div>
			<div class="agree_wrap">
				<input type="checkbox" id="i_agree1" name="i_agree1" value="Y">
				<label for="i_agree1"><span></span>개인정보 수집 및 이용 정책에 동의합니다.</label>
			</div>
		</div>
		<button type="submit" class="mt50 fs_18 fw_700 submit_btn">문의하기</button>
	</div>
</form>

<script>
/**
 * 공백이나 널인지 확인
 */
String.prototype.isEmpty = function () {
    var str = this.trim();
    for (var i = 0; i < str.length; i++) {
        if ((str.charAt(i) != "\t") && (str.charAt(i) != "\n") && (str.charAt(i)!="\r")) {
            return false;
        }
    }
    return true;
};

/**
 * 폼체크
 * if(!checkEmpty('#abc', '- 선택하세요', '')) return false;
 */
function checkEmpty(element, strMsg, elementFocus) {
	if($(element).val() == null){
        alert(strMsg);
        if(elementFocus != '') {
            $(elementFocus).focus();
        } else {
            $(element).focus();
        }
		return false;
	}
    if($(element).val().isEmpty()){
        alert(strMsg);
        $(element).val('');

        if(elementFocus != '') {
            $(elementFocus).focus();
        } else {
            $(element).focus();
        }
        return false;
    }
    return true;
}
/**
 * 폼체크 체크박스
 * if(!checkEmpty('#abc', '- 체크해주세요', 'Y')) return false;
 */
function checkEmptyByCheckbox(element, strMsg, val) {
    if($(element+":checked").val() != val){
        alert(strMsg);
        return false;
    }
    return true;
}

</script>

<script>
function CheckForm(){ 
	// 검증
	if(!checkEmpty('#wr_name', '이름을 입력하세요', '')) return false;
	// 본인확인 체크
	if($("#cert_no").val()=="") {
		alert("본인인증이 필요합니다.");
		return false;
	}
	if(!checkEmpty('#sub_category', '소구분을 선택하세요', '')) return false;
	if(!checkEmpty('#i_item6', '현장주소를 선택하세요', '')) return false;
	if(!checkEmpty('#i_item7', '현장주소를 선택하세요', '')) return false;
	if(!checkEmpty('#wr_5', '현장주소 상세주소를 입력하세요', '')) return false;
	if(!checkEmpty('#wr_7', '예정일(희망)을 입력하세요', '')) return false;
	if(!checkEmpty('#wr_content', '문의내용을 입력하세요', '')) return false;
	if(!checkEmptyByCheckbox('#i_agree1', '개인정보동의를 체크해주세요', 'Y')) return false;
	
	return true;
}
function updateSubSelect() {
		let mainSelect = document.getElementById('i_item5');
		let subSelect = document.getElementById('sub_category');

		subSelect.innerHTML = '<option value="" disabled selected>하위항목 선택</option>';

		if (mainSelect.value === '종합건설') {
				addOption(subSelect, '신축');
				addOption(subSelect, '증축');
				addOption(subSelect, '대수선');
		} else if (mainSelect.value === '창호') {
				addOption(subSelect, '올수리(인테리어)');
				addOption(subSelect, '부분교체');
				addOption(subSelect, '덧창');
		} else if (mainSelect.value === '인테리어') {
				addOption(subSelect, '주택/빌라');
				addOption(subSelect, '아파트');
				addOption(subSelect, '상가');
		} else if (mainSelect.value === '부분공사') {
				addOption(subSelect, '화장실');
				addOption(subSelect, '씽크대');
				addOption(subSelect, '도배/장판/마루');
		}
}

function addOption(selectElement, optionText) {
		let option = document.createElement('option');
		option.value = optionText;
		option.text = optionText;
		selectElement.add(option);
}

window.onload = function () {
	updateSubSelect();
};

$(function(){
	<?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
	// 휴대폰인증
	var params = "";
	$("#win_hp_cert").click(function() {
		if(!cert_confirm()) return false;

		var pageTypeParam = "pageType=request";
		params = "?" + pageTypeParam;
		<?php     
		switch($config['cf_cert_hp']) {
			case 'kcb':                
				$cert_url = G5_OKNAME_URL.'/hpcert1.php';
				$cert_type = 'kcb-hp';
				break;
			case 'kcp':
				$cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
				$cert_type = 'kcp-hp';
				break;
			case 'lg':
				$cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
				$cert_type = 'lg-hp';
				break;
			default:
				echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
				echo 'return false;';
				break;
		}
		?>
		
		certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>"+params);
		return;
	});
	<?php } ?>
});
</script>