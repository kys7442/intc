<ul class="gnb_dep1">
  <li class="menu-item-has-children <?php if ($depth1 == 1) echo "on"; ?>"><a href="<?= G5_URL; ?>/sub/construction_inquiry">종합건설</a>
    <ul class="sub_menu">
      <li <?php if ($depth1 == 1 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/construction_inquiry">견적 및 문의</a></li>
      <li <?php if ($depth1 == 1 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/construction">시공사례</a></li>
    </ul>
  </li>
  <li class="menu-item-has-children <?php if ($depth1 == 2) echo "on"; ?>"><a href="<?= G5_URL; ?>/sub/windows_inquiry">창호</a>
		<ul class="sub_menu">
      <li <?php if ($depth1 == 2 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/windows_inquiry">견적 및 문의</a></li>
      <li <?php if ($depth1 == 2 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/windows">시공사례</a></li>
    </ul>
	</li>
  <li class="menu-item-has-children <?php if ($depth1 == 3) echo "on"; ?>"><a href="<?= G5_URL; ?>/sub/interior_inquiry">인테리어</a>
		<ul class="sub_menu">
      <li <?php if ($depth1 == 3 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/interior_inquiry">견적 및 문의</a></li>
      <li <?php if ($depth1 == 3 && $depth2 == 2) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/interior">시공사례</a></li>
    </ul>
	</li>
  <li class="menu-item-has-children <?php if ($depth1 == 4) echo "on"; ?>"><a href="<?= G5_URL; ?>/realty">부동산정보</a>
    <ul class="sub_menu">
      <li <?php if ($depth1 == 4 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/realty">부동산정보</a></li>
    </ul>
  </li>
  <li class="menu-item-has-children <?php if ($depth1 == 5) echo "on"; ?>"><a href="<?= G5_URL; ?>/sub/inquiry_etc">부분공사 문의</a>
	<ul class="sub_menu">
	  <li <?php if ($depth1 == 5 && $depth2 == 1) echo "class='on'"; ?>><a href="<?= G5_URL; ?>/sub/inquiry_etc">시공문의</a></li>
	</ul>
  </li>
</ul>	