<?php

namespace app\common\model;

use think\Model;

class Product extends Model
{
    protected $table='sp_products';
    protected $createTime='create_time';
    protected $updateTime='update_time';
    protected $autoWriteTimestamp = 'datetime';
}
