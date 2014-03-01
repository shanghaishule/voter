<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo ($res['title']); ?> - 创卫志愿</title>

<link type="text/css" rel="stylesheet" href="../Public/css/reset.css">
<link type="text/css" rel="stylesheet" href="../Public/css/style.css">
<link type="text/css" rel="stylesheet" href="../Public/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="../Public/css/detail_v2.css">
<style>
.labels{
	float: left;
	width: 60px;
	font-size: 20px;
}
form{margin:0px}
input{
	width: 180px;
	border:1px solid #808080;
	margin: 0px;
	padding: 0px;
}
.button{
	margin-top: 5px;
	margin-bottom: 5px;
	width: 70px;
}
textarea{
	width: 260px;
	height: 40px;
}
.star{ color:red;}
br{
	clear: left;
}
.input_class{
	margin-top: 5px;
	padding-top: 5px;
}
.button2{
	margin-left: 0px;
	margin-top: 0px;
	width: 66px;
	height: 40px;
}
.time{
	color: blue;
	font-weight:bold;
}
.end{
	margin: 1px;
	padding: 1px;
}
.start_end{
	margin: 1px;
	padding: 1px;
}

.baoming{
	background-color: silver;
	border: silver 1px dashed;
}
.picture{

}
.picture img{
	width: 100px;
	height: 100px;
	margin: 0 auto;
}
</style>

<script type="text/javascript" src="../Public/js/jquery.min.js"></script>
<script type="text/javascript" src="../Public/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="../Public/js/changImg.js"></script>

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
		<center><b><?php echo ($res['title']); ?></b></center>

		<div>&nbsp;&nbsp;发起人：<?php echo ($res['v_id']); ?></div>
		<?php if($res['flag'] == '-1'): if(!empty($img)): if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="picture fl">
						<img src="__PUBLIC__/Uploads/<?php echo ($vo['pic']); ?>">
					</div>
					<div class="nav"></div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
				<div class="picture">
					<img src="../Public/images/default.jpg">
				</div><?php endif; ?>
		<?php else: ?>
			<?php if(!empty($res['pic'])): ?><div class="picture">
					<img src="__PUBLIC__/Uploads/<?php echo ($res['pic']); ?>">
				</div>
			<?php else: ?>
				<div class="picture">
					<img src="../Public/images/default.jpg">
				</div><?php endif; endif; ?>

		<div>
			<div class="time">时间：</div>
			<div class="end">&nbsp;&nbsp;截止<?php echo ($res['date_time_end']); ?></div>
			<div class="start_end">&nbsp;&nbsp;活动<?php echo ($res['date_time_start']); ?> 至 <?php echo ($res['date_time_end']); ?></div>
		</div>

		<div>
			<div class="time">地点：</div>
			<div>&nbsp;&nbsp;<?php echo ($res['place']); ?></div>
		</div>

		<div>
			<div class="time">内容：</div>
			<div>&nbsp;&nbsp;<?php echo ($res['contents']); ?></div>
		</div>

		<div>
			<div class="time">志愿者：</div>
			&nbsp;&nbsp;报名<?php echo ($res['num_baoming']); ?>人，招募<?php echo ($res['num']); ?>人
		</div>

		<?php if($res['is_admin'] == '0'): ?><div>
				<?php if($res['flag'] == '0'): ?><center><a class="baoming" href="__URL__/join?a_id=<?php echo ($res['a_id']); ?>&v_id=<?php echo ($res['v_id']); ?>">我要报名</a></center>
				<?php elseif($res['flag'] == '-1'): ?>
					<form action="__URL__/upload_file" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="a_id" value="<?php echo ($res['a_id']); ?>" />
						<div class="input_class">
							<span class="labels">图片：</span>
							<input type="file" name="pic" id="pic" onchange="changImg('__APP__/Pic/upload_image', '__PUBLIC__/Uploads/')" />
							<input type="hidden" name="pic_url" id="pic_url" value=""/>  
							<div id="imgContainer1" style="max-width: 200px;margin: 5px auto;"></div>
							<center><input type="submit" class="button" value="提交" /></center>
							<!-- <input type="submit" class="button" value="返回" onclick="window.history.go(-1)"> -->
						</div>
					</form>
				<?php elseif($res['flag'] == '1'): ?>
					&nbsp;&nbsp;通知：<?php echo ($notice); ?>
				<?php elseif($res['flag'] == '2'): ?>
					<center><a class="baoming" href="__URL__/unjoin?a_id=<?php echo ($res['a_id']); ?>&v_id=<?php echo ($res['v_id']); ?>">取消报名</a></center><?php endif; ?>
			</div>
		<?php elseif($res['is_admin'] == '1'): ?>
			<div>
				<?php if(is_array($volun_res)): $i = 0; $__LIST__ = $volun_res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>&nbsp;&nbsp;报名者：<?php echo ($vo['volun_join_id']); ?>
						<?php if($res['flag'] != '-1'): if($vo['join'] == 2): ?>，<a href="__URL__/agree_join?vg_id=<?php echo ($vo['vg_id']); ?>">同意</a>或取消<?php endif; ?>
							<?php if($vo['join'] == 1): ?>，同意或<a href="__URL__/agree_join?vg_id=<?php echo ($vo['vg_id']); ?>">取消</a><?php endif; endif; ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php if($res['flag'] != '-1'): ?><div class="input_class">
						<form action="__URL__/add_notice" method="POST">
							<input type="hidden" name="a_id" value="<?php echo ($res['a_id']); ?>" />
							<textarea name="notice">请于<?php echo ($res['date_time_start']); ?>在<?php echo ($res['place']); ?>集中</textarea>
							<input type="submit" class="button2" value="提交" />
						</form>
					</div><?php endif; ?>
				<div style="margin:3px;">
					<?php if($res['flag'] == '-1'): ?><form action="__URL__/upload_file" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="a_id" value="<?php echo ($res['a_id']); ?>" />
							<div class="input_class">
								<span class="labels">图片：</span>
								<input type="file" name="pic" id="pic" onchange="changImg('__APP__/Pic/upload_image', '__PUBLIC__/Uploads/')" />
								<input type="hidden" name="pic_url" id="pic_url" value=""/>  
								<div id="imgContainer1" style="max-width: 200px;margin: 5px auto;"></div>
								<center><input type="submit" class="button" value="提交" /></center>
								<!-- <input type="submit" class="button" value="返回" onclick="window.history.go(-1)"> -->
							</div>
						</form>
					<?php else: ?>
						<center><a class="baoming" href="__URL__/end_active?a_id=<?php echo ($res['a_id']); ?>">结束活动</a></center><?php endif; ?>
				</div>
			</div><?php endif; ?>
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