<?php

namespace app\shop\controller;

use think\Controller;
use app\common\model\Address;
use think\Request;

class Order extends Controller
{
    protected $beforeActionList=[
        'checkAuth'
    ];
    public function checkAuth(){
        if (!session('user.id')){
            abort(redirect(url('user/auth/login',['redirect'=>request()->url()])));
        }
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function preview()
    {
        $address = Address::all();
        $total = cartTotal(session('cart'));

        return view('order_preview',[
            'address'=>$address,
            'products'=>session('cart'),
            'total'=>$total
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $operate = createOrder(request()->post('address_id'));
        if ($operate){
            session('cart',null);
            return redirect(url('user/order/index'));
        }
        fail('Fail to pay.');
    }

}
