<?php
use app\common\model\User;

function cartTotal($cart){
    $total = 0;
    foreach ($cart as $item){
        $total += $item['num']*$item['price'];
    }
    return $total;
}

function makeOrderNum(){
    return date('YmdHis') . rand(10000000,99999999);
}

function makeOrderInfo($cart){
    foreach ($cart as $item){
        $arr[] = [
            'name'=>$item['name'],
            'num'=>$item['num']
        ];
    }
    return json_encode($arr);
}

function createOrder($address_id){
    return User::find(session('user.id'))->order()
        ->save([
            'order_num'=>makeOrderNum(),
            'address_id'=>$address_id,
            'total'=>cartTotal(session('cart')),
            'info'=>makeOrderInfo(session('cart')),
            'status'=>1
        ]);
}