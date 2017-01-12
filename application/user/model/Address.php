<?php

namespace app\user\model;

use think\Model;

class Address extends Model
{
    protected $table='sp_address';

    public function getGenderAttr($value)
    {
        $status = [1=>'male',2=>'female'];
        return $status[$value];
    }
}
