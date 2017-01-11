<?php
namespace app\user\behavior;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 14:05
 */
class CheckLogin
{
    public function run(&$params)
    {
        if ('login' != request()->action() && 'auth' != request()->controller()) {
            if (!session('user.id')) {
                abort(redirect(url('user/auth/login')));
            }
        }

    }
}