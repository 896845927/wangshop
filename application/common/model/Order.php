<?php

namespace app\common\model;

use think\Model;

class Order extends Model
{
    protected $table='sp_orders';
    protected $createTime='create_time';
    protected $updateTime=false;
    protected $autoWriteTimestamp = 'datetime';
}
