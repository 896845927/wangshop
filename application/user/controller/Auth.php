<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 14:15
 */

namespace app\user\controller;

use app\user\model\User;
use think\Loader;
use think\Session;
use app\user\model\User as UserModel;

class Auth
{
    //同一个方法支持两种请求，get显示登录页，post处理登录操作
    public function login(){
        //处理post请求
        if (request()->isPost()){
            $data = [
                'login'=>request()->put('login'),
                'pass'=>encrypt(request()->put('pass'))
            ];
            // 验证
            $validate = Loader::validate('Users');
            if (!$validate->scene('login')->check($data)) fail($validate->getError());

            $user = UserModel::where($data)->find();
            if($user){
                session('user.id',$user['id']);
                session('user.name',$user['name']);
                win('login success', url('/user/auth/index'));
            }else{
                fail('login fail');
            }
        }
        return view('login');
    }

    public function register(){
        $data = request()->post();
        $va = Loader::validate('Users');
        if(!$va->scene('register')->check($data)) fail($va->getError());
        $create_data = [
            'name'=>$data['name'],
            'login'=>$data['login'],
            'pass'=>encrypt($data['pass'])
        ];
        $user = User::create($create_data);
        if ($user){
            Session::set('user.id',$user['id']);
            Session::set('user.name',$user['name']);
            win("welcome $user->name.", url('/user/auth/index'));
        }
        fail('register fail');
    }

    public function changePassword(){
        //处理post请求
        if (request()->isPost()){
            $data = request()->post();
            // 验证
            $validate = Loader::validate('Users');
            if (!$validate->scene('login')->check($data)) fail($validate->getError());
            $user = UserModel::where([
                'id'=>session('user.id'),
                'pass'=>encrypt($data['pass'])
            ])->setField('pass', encrypt($data['new_pass']));
            if($user){
                win('login success', url('/user/auth/index'));
            }else{
                fail('login fail');
            }
        }
        return view('login');
    }

    public function logout(){
        Session::clear();
        return redirect(url('/user/auth/login'));
    }

    public function index()
    {
        $user = User::find(Session::get('user.id'));
        $address = $user->address()->where(['is_default'=>1])->find();
        $notice = $address?null:"You don't have shipping address.Please enter a shipping address.";
        return view('index',[
            'notice'=>$notice,
            'address'=>$address
        ]);
    }
}