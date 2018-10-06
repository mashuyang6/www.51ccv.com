<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 管理登录
     *
     * @return $this
     */
    public function login()
    {
        //渲染模板
        return view("admin.login")->with([
            'test' => 'mashuyang',
        ]);
    }

    /**
     * 执行登录
     */
    public function doLogin()
    {
        //渲染模板
        return $this->ajaxReturn(2, '登录成功', 1);
    }

    /**
     * 退出登录
     *
     * @return $this
     */
    public function logout()
    {
        //渲染模板
        return view("admin.login")->with([
            'test' => 'mashuyang',
        ]);
    }
}
