<?php

/* 
 * mysql基础操作类
 * date:2016-07-20
 * author:张华民
 */
namespace Core\Db;
class Mysql {
    public $con = '';
    
    public function __construct($config) {
        $this->con = mysql_connect($config['host'],$config['usename'],$config['password']);
        if($con){
            mysql_select_db($config['db_name']);
            mysql_query("set names utf8");
        }
    }
    /*
     * 获取查询的记录数
     */
    public function count($table,$where){
        $count_sql = "select count(*) from ".$table." where ".$this->buildWhere($where);
        $result = mysql_query($count_sql);
        $row = mysql_fetch_array($result);
        return isset($row[0])?$row[0]:0;
    }
    /*
    * 返回单条查询数据
    */
    public function findRow($table,$where,$order='id desc',$filed='*'){
        $sql = "select ".$filed." from ".$table." where ".$this->buildWhere($where)." order by ".$order." limit 1";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }
    /*
    * 返回多条查询数据
    */
    public function findAll($table,$where,$order,$limit){
        $sql = "select ".$filed." from ".$table." where ".$this->buildWhere($where)." order by ".$order." limit ".$limit;
        $result = mysql_query($sql);
        $data_list = [];
        while ($row = mysql_fetch_array($result)){
            $data_list[] = $row;
        }
        return $data_list;
    }
    /*
    * 返回最近插入id
    */
    public function insertId(){
        return mysql_insert_id($this->con);
    }
    /*
    * 执行sql
    */
    public function query($sql){
        return mysql_query($sql);
    }
    /*
    *  插入数据
    */
    public function insert($table,$data){
        $insert_sql = "insert into ".$table." value (".$this->buildData($data).")";
        return mysql_query($insert_sql);
    }
    /*
    *  更新数据
    */
    public function update($table,$data,$where){
        $update_sql = "update ".$table." set ".$this->buildData($data)." where ".$this->buildWhere($where);
        return mysql_query($update_sql);
    }
    /*
    *  组织数据
    */
    private function buildData($data){
        $data_str = [];
        foreach ($data as $key=>$val){
            $data_str[] = "`".$key."`='".$val."'";
        }
        return implode(",", $data_str);
    }
    /*
    *  组织where条件
    */
    private function buildWhere($where){
        $where_str = [];
        foreach ($where as $key=>$val){
            $where_str[] = "`".$key."`='".$val."'";
        }
        return implode(" and ", $where_str);
    }
}

