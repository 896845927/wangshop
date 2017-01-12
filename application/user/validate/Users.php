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
        'repass' => 'require|confirm:pass'
    ];

    protected $message = [
        'name.require'    => 'name is required',
        'login.require'    => 'login is required',
        'login.unique'     => 'login has existed',
        'pass.require'     => 'password is required',
        'repass.require'   => 'confirm password is required',
        'repass.confirm'   => 'Two input password is not the same',
    ];

    protected $scene = [
        'login' => ['login'=>'require', 'pass'],
        'register' => ['name','login', 'pass','repass'],
    ];
}