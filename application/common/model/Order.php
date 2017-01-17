<?php

namespace app\common\model;

use think\Model;

class Order extends Model
{
    protected $table='sp_orders';
    protected $createTime='create_time';
    protected $updateTime=false;
    protected $autoWriteTimestamp = 'datetime';

    public function getStatusAttr($value)
    {
        $status = [1=>'新订单',2=>'已接单',3=>'订单被拒绝'];
        return $status[$value];
    }

    public function getInfoAttr($value)
    {
        $info = '';
        foreach (json_decode($value) as $item){
            $info.="{$item->name}x{$item->num};";
        }
        return $info;
    }
}
