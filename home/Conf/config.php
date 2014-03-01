<?php
if (!defined('THINK_PATH')) exit();

$arr1 = array(

    //模版配置
    'DEFAULT_THEME'         => 'default',
    'THEME_LIST'            => 'default,test',
    'TMPL_DETECT_THEME'     => 	true, // 自动侦测模板主题

    //'URL_MODEL'=>2,
    //'LOAD_EXT_FILE' 		=> 'Common',

);

$arr2 = include './config.inc.php';

return array_merge($arr1, $arr2);
