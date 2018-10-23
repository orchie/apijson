<?php
namespace test;

require "vendor/autoload.php";

use apijson\Db;
use apijson\Api;

class Test
{

    public static function main()
    {
        Db::connect("127.0.0.1", "test", "root", "root");
        var_dump(Db::$tables);die;
        try{
            $api = new Api();
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        $a  = ['[]' => ['count' => 3, 'User' => ['id&{}' => ">800,<900"]]];
        // var_dump($a);
    }

}
Test::main();
