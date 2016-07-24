<?php
/* 
 * 参数获取
 * date:2016-07-20
 * author:张华民
 */
namespace Core;
class Request{

    public function get($key=''){
        if($key){
            return isset($_GET[$key])?$_GET[$key]:"";
        }else{
            if(is_array($_GET) && !empty($_GET)){
                foreach ($_GET as $key=>$value) {
                    $_GET[$key] = $this->filter($value);
                }
            }
            return $_GET;
        }

    }
    public function post($key=''){
        if($key){
                return isset($_POST[$key])?$_POST[$key]:"";
        }else{
            if(is_array($_POST) && !empty($_POST)){
                foreach ($_POST as $key=>$value) {
                    $_POST[$key] = $this->filter($value);
                }
            }
            return $_POST;
        }
    }
    /*
     *数据处理
     */
    private function filter($value){
        $value = trim($value);
        $value = strip_tags($value);
        return $value;
    }
}
?>