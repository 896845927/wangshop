<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 17:09
 */

namespace app\user\validate;
use think\Validate;

class Address extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'phone' => 'require',
        'address'   => 'require',
        'gender' => 'require',
    ];

    protected $message = [
        'name.require'    => 'name is required',
        'phone.require'    => 'phone is required',
        'address.require'     => 'address is required',
        'gender.require'   => 'gender is required',
    ];

    protected $scene = [
        'create' => ['name','phone', 'address','gender'],
        'update' => ['name','phone', 'address','gender'],
    ];
}