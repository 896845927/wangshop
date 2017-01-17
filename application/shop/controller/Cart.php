<?php

namespace app\shop\controller;

use app\common\model\Product;
use think\Controller;
use think\Request;

class Cart extends Controller
{
    public function add(){
        if (request()->isAjax()){
            $id = request()->post('id');
            if ($id){
                $product = Product::find($id);
                $num = session("cart.$id")['num'] ? session("cart.$id")['num'] : 0;
                session("cart.$id",[
                    'num'=>$num+1,
                    'price'=>$product->price,
                    'name'=>$product->name
                ]);
                return session("cart.$id");
            }
        }
    }

    public function subtract(){
        if (request()->isAjax()){
            $id = request()->post('id');
            if ($id){
                $num = session("cart.$id")['num'];
                $num = $num-1<=0 ? null:$num-1;
                if (!$num){
                    session("cart.$id",null);
                    return 0;
                }
                $product = Product::find($id);
                session("cart.$id",[
                    'num'=>$num,
                    'price'=>$product->price,
                    'name'=>$product->name
                ]);
                return session("cart.$id");
            }
        }
    }

    public function clear(){
        if (request()->isAjax()){
            session("cart",null);
            return session("cart")?false:true;
        }
    }
}
