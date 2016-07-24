<?php
/* 
 * 控制层处理
 * date:2016-07-20
 * author:张华民
 */
namespace Core;
use Core\Controller;
class App{
    public $request = '';

    public function __construct()
    {
            $this->request = new Request;
    }
    /*
    * mvc实现
    */
    public function run(){
            $c = $this->request->get('c')?$this->request->get('c'):Controller::$controller;
            $a = $this->request->get('a')?$this->request->get('a'):Controller::$action;
            $controller =  "controller\\".$c;
            $class = new $controller;
            if(class_exists($controller)){
                    $class->before();
                    $class->$a();
                    $class->after();
            }else{
                    exit('class not find!');
            }
    }
}
?>