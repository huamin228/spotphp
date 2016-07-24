<?php
/* 
 * mvc入口
 * date:2016-07-20
 * author:张华民
 */
use core\App;
define("APPPATH",dirname(__FILE__));
include(APPPATH."/config/config.php"); //引入配置文件
include(APPPATH."/core/init.php");
$app = new App();
$app->run();
?>