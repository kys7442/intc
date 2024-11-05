<div class="subCommon">
  <div class="sub_visual visualBg<? echo $depth1 ?>">
    <div class="inner_container">
      <div class="txts">
		<h2 class="fs_50 fw_800"><?php echo $main_menu ?></h2>
        <ul class="dfbox">
          <li class="fs_14 fw_300">HOME</li>
          <li class="fs_14 fw_300">&nbsp;-&nbsp;</li>
          <li class="fs_14 fw_300"><?php echo $main_menu; ?></li>
		  <?php if($depth1 == 1 || $depth1 == 2 || $depth1 == 3) { ?>
          <li class="fs_14 fw_300">&nbsp;-&nbsp;</li>
          <li class="fs_14 fw_300"><?php echo $g5['title'] ?></li>
		  <?php } ?>
        </ul>
      </div>
    </div>
  </div>


  <div id="subLnb_container">
    <div class="inner_container">
      <?php if ($depth1 == 1) { ?>
        <ul class="subLnb dfbox col02">
          <li <?php if ($depth1 == 1 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/construction_inquiry">견적 및 문의</a></li>
          <li <?php if ($depth1 == 1 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/construction">시공사례</a></li>
        </ul>

      <?php } else if ($depth1 == 2) { ?>
        <ul class="subLnb dfbox col02">
          <li <?php if ($depth1 == 2 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/windows_inquiry">견적 및 문의</a></li>
          <li <?php if ($depth1 == 2 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/windows">시공사례</a></li>
        </ul>
      <?php } else if ($depth1 == 3) { ?>
        <ul class="subLnb dfbox col02">
          <li <?php if ($depth1 == 3 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/interior_inquiry">견적 및 문의</a></li>
          <li <?php if ($depth1 == 3 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/interior">시공사례</a></li>
        </ul>
      <?php } ?>
    </div>
  </div>
</div>