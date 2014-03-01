<?php
//开启调试模式
define('APP_DEBUG', true);
//定义 ThinkPHP 框架路径
define( 'THINK_PATH' , './ThinkPHP/' );
//定义项目名称和路径
define( 'APP_NAME' , 'home' );
define( 'APP_PATH' , './home/' );

//加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");