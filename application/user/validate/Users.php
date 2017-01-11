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
        'login'     => 'require|unique:users',
        'pass'    => 'require',
        'repass' => 'require|confirm:pass'
    ];

    protected $message = [
        'login.require'    => 'username is required',
        'login.unique'     => 'username has existed',
        'pass.require'     => 'password is required',
        'repass.require'   => 'confirm password is required',
        'repass.confirm'   => 'Two input password is not the same',
    ];

    protected $scene = [
        'login' => ['login', 'pass'],
    ];
}