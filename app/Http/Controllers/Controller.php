<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * ajax方式返回数据到客户端
     *
     * @param mixed $data 要返回的数据
     * @param string $info 提示信息
     * @param int $status 返回状态
     * @param string $type ajax返回类型 JSON XML
     *
     * @return  void
     */
    public static function ajaxReturn($data, $info = '', $status = 1, $type = 'json')
    {
        $res = [
            'status' => $status,
            'info' => $info,
            'data' => $data,
        ];

        //判断ajax返回类型
        if ($type == 'json') {
            //返回JSON数据格式到客户端,包含状态信息
            header("Content-Type:text/html; charset=utf-8");
            exit(json_encode($res));
        } elseif ($type == 'xml') {
            //返回xml格式数据
            header("Content-Type:text/xml; charset=utf-8");
            exit(xml_encode($res));
        } elseif ($type == 'eval') {
            //返回可执行的js脚本
            header("Content-Type:text/html; charset=utf-8");
            exit($data);
        } elseif ($type == 'jsonp'){
            header("Content-Type:text/html; charset=utf-8");
            exit('try{' . Http::get("callback") . '(' . json_encode($res) . ')}catch(e){};');
        }
    }
}
