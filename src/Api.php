<?php
/**
 *
 */
namespace apijson;
use Db;
class Api
{
    public $param;  //数组参数
    public $action; //操作

    public $allowTable; //允许操作的表
    public $allowAction;    //允许的操作

    public $table;  //表名
    public $table_prefix
    /**
     * init
     * 不传参数 默认从php://input 读取 json 从url读取 action
     * 传参数 则 指定param 与 action
     */
    public  function __construct($param =null,$action =null)
    {
        if (!$param) {
            $param = file_get_contents('php://input', 'r');
            $param = $param ?? [];
        }
        if(!is_array($param)){
            $param = json_decode($param,1);
        }
        if(!$param){
                throw new \Exception("apijson:param empty or invalid", 1);
        }
        if(!$action){
            $action = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'],"/")+1);
            if(!in_array($action, ['get','gets','head','heads','post','put','delete'])){
                throw new \Exception("apijson:action not exsit or wrong", 1);
            }
        }
        $this->param = $param;
        $this->action = $action;
    }
    /**
     * 执行操作
     */
    public function exe(){

    }
    /**
     * 解析param
     */
    private function parse(){
        foreach ($this->param as $k => $v) {
            
        }
    }
}
