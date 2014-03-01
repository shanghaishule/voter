<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>创卫志愿</title>

<link type="text/css" rel="stylesheet" href="../Public/css/reset.css">
<link type="text/css" rel="stylesheet" href="../Public/css/style.css">
<link type="text/css" rel="stylesheet" href="../Public/css/font-awesome.css">

</head>
<body>

<div id="web">
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
		<!-- 鍝嶅簲寮忚璁℃爣绛�-->
	<!-- 鍦ㄦ墜鏈轰笂涓嶅彲鏀惧ぇ缂╁皬 -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<!-- 閫氳繃蹇嵎鏂瑰紡鎵撳紑鏃跺叏灞忔樉绀�-->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- 闅愯棌鐘舵�鏍�-->
	<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
	<!-- 蹇界暐灏嗘暟瀛楄瘑鍒负鐢佃瘽鍙风爜 -->
	<meta name="format-detection" content="telephone=no" />
	<!-- end 鍝嶅簲寮忚璁℃爣绛�-->

	<div id="header">
	</div>
	<div class="nav"></div>

	<div id="menu">
<!-- 		娲诲姩淇℃伅<br />
		鈥斺�鈥斺�<a href="__APP__/Active/active_form">娲诲姩椤圭洰</a><br />
		鈥斺�鈥斺�<a href="__APP__/Active/active_jianbao">娲诲姩绠�姤</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/item_desc">椤圭洰绠�粙</a><br />
		鈥斺�鈥斺�<a href="__APP__/Index/personal">涓汉淇℃伅</a><br />

		鍒涘崼鐩戠潱<br />
		鈥斺�鈥斺�<a href="__APP__/Contents/add_form?type=1">鍙戝竷淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/article_list?type=1">鍗敓鎯呭喌</a><br />

		缇や紬璺嚎<br />
		鈥斺�鈥斺�<a href="__APP__/Contents/add_form?type=2">鍙戝竷淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/article_list?type=2">娲诲姩绠�</a><br /> -->
		娲诲姩淇℃伅<br />
		鈥斺�鈥斺�<a href="__APP__/Active/newest_active">鏈�柊娲诲姩</a><br />
		鈥斺�鈥斺�<a href="__APP__/Active/active_info">娲诲姩淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Active/active_form">鍙戝竷娲诲姩</a><br />
		鈥斺�鈥斺�<a href="__APP__/Index/register_form">娉ㄥ唽淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/item_desc">甯告�椤圭洰绠�粙</a><br />

		鍒涘崼鐩戠潱<br />
		鈥斺�鈥斺�<a href="__APP__/Contents/add_form?type=1">鍙戝竷淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/article_list?type=1">鍒涘崼娲诲姩</a><br />

		缇や紬璺嚎鍏氬憳蹇楁効鏈嶅姟<br />
		鈥斺�鈥斺�<a href="__APP__/Contents/add_form?type=2">鍙戝竷淇℃伅</a><br />
		鈥斺�鈥斺�<a href="__APP__/Contents/article_list?type=2">娲诲姩绠�</a><br />
	</div>

	<div class="nav"></div>

<!-- 
娉ㄥ唽缁勭粐銆佸彂甯冪畝鎶ャ�鍚屾剰鍔犲叆銆佸彇娑堝姞鍏ャ�绠＄悊鍛樼晫闈�
-->

	<div id="container">
		<br />
		您好，创卫志愿欢迎您！
		<br />
	</div>

	<div id="footer">
		<p><a href="__APP__">创卫志愿@蜀乐</a></p>

<?php if($vvv_id == ''): ?><p><a href="<?php echo U('Index/login_form');?>">登录</a></p>
<?php elseif($vvv_id != '' && $_SESSION['temp'] == 0 ): ?>
	<p><?php echo ($vvv_id); ?>，欢迎您！<a href="<?php echo U('Index/logout');?>">退出</a></p>
<?php elseif($vvv_id != '' && $_SESSION['temp'] == 1 ): ?>
	<p><?php echo ($vvv_id); ?>(游客账号)，请<a href="__APP__/Index/personal">绑定</a>或<a href="<?php echo U('Index/login_form');?>">登录</a>账号<?php endif; ?>
	</div>
</div>

</body>
</html>