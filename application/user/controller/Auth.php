<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 14:15
 */

namespace app\user\controller;

use think\Session;
use app\user\model\User as UserModel;

class Auth
{
    //同一个方法支持两种请求，get显示登录页，post处理登录操作
    public function login(){
        //处理post请求
        if (request()->isPost()){
            $login = request()->put('login');
            $pass = request()->put('pass');
            UserModel::where($map)->find();
            
        }
        return view('login');
    }

    public function register(){

    }

    public function logout(){
        Session::clean();
        return redirect(url('/user/auth/login'));
    }
}