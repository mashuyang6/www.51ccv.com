<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        //渲染模板
        return view("admin.index")->with([
            'test' => 'mashuyang',
        ]);
    }

    public function login(){
        //渲染模板
        return view("admin.login")->with([
            'test' => 'mashuyang',
        ]);
    }
}
