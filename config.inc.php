<?php
if (!defined('THINK_PATH')) exit();

return array(
    //'配置项'=>'配置值'
    'DB_TYPE'    => 'mysql',        //使用的数据库类型
    'DB_HOST'    => 'localhost',
    'DB_NAME'    => 'db_weixin_volunteer',      //数据库名
    'DB_USER'    => 'bestchoi_shule',     //访问数据库账号
    'DB_PWD'     => 'shule_123',       //访问数据库密码
    'DB_PORT'    => '3306',
    'DB_PREFIX'  => '',     //表前缀
    
    'DB_FIELD_CACHE'        => false,
    'HTML_CACHE_ON'         => false,
    'HTML_CACHE_ON'         => false,
    'TMPL_CACHE_ON'         => false,
    'ACTION_CACHE_ON'       => false,

    'TMPL_ACTION_ERROR'     => 'Public:error', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => 'Public:success', // 

    //'LOAD_EXT_FILE' => 'Common',
);
?>
