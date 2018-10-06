<?php

/**
 * 用户表模型
 */

namespace App\Logics\User\Users;

use \App\Logics\Base;

class Users extends Base
{
    /**
     * 静态方法，单例统一访问入口
     *
     * @return mixed|static
     */
    static public function getInstance()
    {
        if (is_null(self::$_instance) || !isset (self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}
