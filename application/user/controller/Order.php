<?php

namespace app\user\controller;

use think\Controller;
use think\Request;
use app\common\model\Order as OrderModel;
use app\common\model\User;

class Order extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $orders = User::find(session('user.id'))->order()
            ->field([
                'id',
                'order_num',
                'total',
                'info',
                'create_time',
                'status',
            ])
            ->order(['create_time'=>'desc'])
            ->select();

        return view('order_index',['orders'=>$orders]);
    }

}
