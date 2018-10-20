<?php
/**
 *
 */
namespace apijson;

class Api
{
    /**
     * init
     */
    public static function init()
    {
        echo 333;
    }
    public function param($param = null)
    {
        if (!$param) {
            $param = file_get_contents('php://input', 'r');
            $param = $param ?? [];
        }
    }
}
