<?php

namespace app\shop\controller;

use app\common\model\Product as ProductModel;
use think\Controller;
use think\Request;

class Product extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $products = ProductModel::order("'update_time' desc")->select();
//        halt($products);
        return view('product_list',['products'=>$products]);
    }
    
    public function closed(){
        return view('shop_closed');
    }

}
