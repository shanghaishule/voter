<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>个人信息 - 创卫志愿</title>

<link type="text/css" rel="stylesheet" href="../Public/css/reset.css">
<link type="text/css" rel="stylesheet" href="../Public/css/style.css">
<link type="text/css" rel="stylesheet" href="../Public/css/font-awesome.css">
<style type="text/css">
.labels{
	margin-left: 2px;
	float: left;
	text-align: right;
	width: 122px;
	font-size: 20px;
}
form{margin:0px}
input{
	width: 180px;
	border:1px solid #808080;
	margin: 2px;
	padding: 2px;
}

textarea{
	width: 250px;
	height: 150px;
}

.button{
	margin-left: 90px;
	margin-top: 5px;
	width: 140px;
}

.star{ color:red;}

br{
	clear: left;
}
.input_class{
	margin-top: 5px;
	padding-top: 5px;
}
</style>

<script type="text/javascript" src="../Public/js/alert.js"></script>
<script language="javascript">
	var index = new Array();
	var obj = new Array();　//创建一个数组

	index[0] = 'weixin_id';
	obj['weixin_id'] = '微信帐号必须!';

	index[1] = 'name';
	obj['name'] = '姓名必须!';

	index[2] = 'pwds';
	obj['pwds'] = '密码必须!';

    function input_check(form) {
    	for(var i = 0; i < index.length; i++){
          	if (form[index[i]].value == ""){
                sAlert(obj[index[i]]);
                return false;
          	}
    	}
    }
</script>

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
		<!-- <b><a href="__APP__/Index/personal">完善个人信息</a></b>&nbsp;&nbsp;<b><a href="__APP__/Group/group">完善志愿者组织信息</a></b> -->
		<center><b>完善个人信息</b></center>
		<form action="__URL__/personal_insert" method="POST">

			<div class="input_class">
				<input type="hidden" name="id" value="<?php echo ($res['id']); ?>" />
				<span class="labels">志愿者编号：</span>
				<input type="text" name="volunteer_id" value="<?php echo ($vid); ?>" readonly />
			</div>

			<div class="input_class">
				<span class="labels">微信账号：</span>
				<input type="text" name="weixin_id" value="<?php echo ($res['weixin_id']); ?>" />
				<span class="star">*</span>
			</div>

			<div class="input_class">
				<span class="labels">姓名：</span>
				<input type="text" name="name" value="<?php echo ($res['name']); ?>" />
				<span class="star">*</span>
			</div>
			
			<div class="input_class">	
				<span class="labels">性别：</span>
				<input type="text" name="sex" value="<?php echo ($res['sex']); ?>" />
			</div>

			<div class="input_class">
				<span class="labels">工作单位：</span>
				<input type="text" name="work" value="<?php echo ($res['work']); ?>" />
			</div>

			<div class="input_class">
				<span class="labels">电话：</span>
				<input type="text" name="phone" value="<?php echo ($res['phone']); ?>" />
			</div>

			<div class="input_class">
				<span class="labels">爱好特长：</span>
				<input type="text" name="love" value="<?php echo ($res['love']); ?>" />
			</div>

			<div class="input_class">
				<span class="labels">状态：</span>
				<input type="text" name="pwd" value="<?php echo ($res['type_content']); ?>" readonly/>
			</div>

			<div class="input_class">
				<span class="labels">密码：</span>
				<input type="text" name="pwds" value="<?php echo ($res['pwd']); ?>" />
				<span class="star">*</span>
			</div>

			<div class="input_class">
				<input type="submit" class="button" onclick="return input_check(this.form);" value="提交" />
				<!-- <input type="submit" class="button" value="返回" onclick="window.history.go(-1)"> -->
			</div>

		</form>
<!-- 		<br />
		<b>我报名的活动</b><br />
		<?php if(is_array($my_act)): $i = 0; $__LIST__ = $my_act;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>标题：<a href="__URL__/news_detail?c_id=<?php echo ($vo['c_id']); ?>"><?php echo ($vo['title']); ?></a><br />
			发布者：<?php echo ($vo['volun_id']); ?><br />
			状态：<?php echo ($vo['join']); ?><br /><br /><?php endforeach; endif; else: echo "" ;endif; ?> -->
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