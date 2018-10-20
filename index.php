<?php
namespace test;

require "vendor/autoload.php";

use apijson\Db;

class Test
{

    public static function main()
    {
        Db::connect("127.0.0.1", "test", "root", "root");
        $db = new Db();
        $a  = ['[]' => ['count' => 3, 'User' => ['id&{}' => ">800,<900"]]];
        var_dump($a);
        $res = $db->exe(file_get_contents('php://input', 'r'));
        // var_dump($res);
    }

}
Test::main();
