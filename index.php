<?php
/**
 *  1.入口文件
 *  2.定义常量
 *  3.启动框架
 */

define("imooc",dirname(__FILE__));
define("core",imooc.'/core');
define("app",imooc.('/app'));


define('DEBUG',true);
if(DEBUG){
    ini_set("display_error",'On');
}else{
    ini_set('display_error','Off');
}
include core.'/common/function.php';
include core.'/imooc.php';

\core\imooc::run();
