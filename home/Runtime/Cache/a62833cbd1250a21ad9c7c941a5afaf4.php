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
			<!-- 响应式设计标签 -->
	<!-- 在手机上不可放大缩小 -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<!-- 通过快捷方式打开时全屏显示 -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- 隐藏状态栏 -->
	<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
	<!-- 忽略将数字识别为电话号码 -->
	<meta name="format-detection" content="telephone=no" />
	<!-- end 响应式设计标签 -->

	<div id="header">
	</div>
	<div class="nav"></div>

	<div id="menu">
<!-- 		活动信息<br />
		————<a href="__APP__/Active/active_form">活动项目</a><br />
		————<a href="__APP__/Active/active_jianbao">活动简报</a><br />
		————<a href="__APP__/Contents/item_desc">项目简介</a><br />
		————<a href="__APP__/Index/personal">个人信息</a><br />

		创卫监督<br />
		————<a href="__APP__/Contents/add_form?type=1">发布信息</a><br />
		————<a href="__APP__/Contents/article_list?type=1">卫生情况</a><br />

		群众路线<br />
		————<a href="__APP__/Contents/add_form?type=2">发布信息</a><br />
		————<a href="__APP__/Contents/article_list?type=2">活动简讯</a><br /> -->
		活动信息<br />
		————<a href="__APP__/Active/newest_active">最新活动</a><br />
		————<a href="__APP__/Active/active_info">活动信息</a><br />
		————<a href="__APP__/Active/active_form">发布活动</a><br />
		————<a href="__APP__/Index/register_form">注册信息</a><br />
		————<a href="__APP__/Contents/item_desc">常态项目简介</a><br />

		创卫监督<br />
		————<a href="__APP__/Contents/add_form?type=1">发布信息</a><br />
		————<a href="__APP__/Contents/article_list?type=1">创卫活动</a><br />

		群众路线党员志愿服务<br />
		————<a href="__APP__/Contents/add_form?type=2">发布信息</a><br />
		————<a href="__APP__/Contents/article_list?type=2">活动简讯</a><br />
	</div>

	<div class="nav"></div>

<!-- 
注册组织、发布简报、同意加入、取消加入、管理员界面
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