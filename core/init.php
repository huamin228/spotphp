<?php
/* 
 * 框架初始化
 * date:2016-07-20
 * author:张华民
 */
spl_autoload_register(function ($class) {
    if ($class) {
        $file = APPPATH.'/'.str_replace('\\', '/', strtolower($class));
        $file .= '.php';
        if (file_exists($file)) { 	
            include $file;
        }
    }
});
?>