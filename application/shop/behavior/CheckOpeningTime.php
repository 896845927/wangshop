<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16
 * Time: 15:42
 */

namespace app\shop\behavior;
use app\common\model\Config;

class CheckOpeningTime
{
    public function run(&$params)
    {
        $now = date('H:i:s',time());
        $config = Config::find(1);
        $open_time =$config->open_time;
        if (request()->url()!=url('shop/product/closed')){
            if ($now < $config->open_time || $now > $config->close_time){
                abort(redirect(url('shop/product/closed')));
            }
        }

    }
}