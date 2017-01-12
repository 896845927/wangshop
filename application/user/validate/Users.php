<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 17:09
 */

namespace app\user\validate;
use think\Validate;

class Users extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'login'     => 'require|unique:users',
        'pass'    => 'require',
        'repass' => 'require|confirm:pass',
        'new_pass' => 'require',
        're_new_pass' => 'require|confirm:new_pass',
    ];

    protected $message = [
        'name.require'    => 'name is required',
        'login.require'    => 'login is required',
        'login.unique'     => 'login has existed',
        'pass.require'     => 'password is required',
        'repass.require'   => 'confirm password is required',
        'repass.confirm'   => 'Two input password is not the same',
        'new_pass.require'     => 'new password is required',
        're_new_pass.require'   => 'confirm new password is required',
        're_new_pass.confirm'   => 'Two input new password is not the same',
    ];

    protected $scene = [
        'login' => ['login'=>'require', 'pass'],
        'register' => ['name','login', 'pass','repass'],
        'change' => ['pass','new_pass','re_new_pass']
    ];
}