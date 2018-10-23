<?php
namespace apijson;

use PDO;

class Db
{
    //连接PDO实例
    public static $con = null;
    //数据库所有表
    public static $tables;
    //当前操作的表
    public $table;
    public $field = "*";
    public $key   = [];
    public $logic = [];
    public $val   = [];
    private $PDOStatement;

    public function __construct()
    {
    }
    /**
     * connect
     */
    public static function connect($server, $database, $name, $pwd, $port = 3306)
    {
        if (!self::$con) {
            try {
                self::$con    = new PDO("mysql:host={$server};dbname={$database}", $name, $pwd);
                self::$tables = self::$con->query("show tables")->fetchAll(PDO::FETCH_COLUMN);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
    /**
     * exe main
     */
    public function exe($request)
    {
        var_dump($request);
    }
    /**
     * table
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }
    /**
     * field
     */
    public function field($field)
    {
        $this->field = $field;
        return $this;
    }
    /**
     * where
     */
    public function where($where = [])
    {
        $count = func_num_args();
        if ($count == 1) {
            if (is_array($where)) {
                foreach ($where as $k => $v) {
                    $this->key[] = $k;
                    if (is_array($v)) {

                    } else {
                        $this->logic[] = '=';
                        $this->val[]   = $v;
                    }
                }
            }
        }
    }
    /**
     * query
     */
    public function query($sql)
    {
        $this->PDOStatement = self::$con->prepare($sql);
        $this->PDOStatement->execute();
        return $this->PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * get
     */
    public function get()
    {

    }
}
