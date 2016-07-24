<?php
/* 
 * 控制层基础类
 * date:2016-07-20
 * author:张华民
 */
namespace Core; 
class Controller{
    public static $controller = "welcome";
    public static $action = "index";
    public function before(){

    }

    public function after(){

    }

    public function display($tmp_path){
        include_once(APPPATH."/views/".$tmp_path);
    }
}
?>