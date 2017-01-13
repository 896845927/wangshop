<?php

namespace app\common\model;

use think\Model;

class Address extends Model
{
    protected $table='sp_address';

    protected static function init()
    {
        Address::event('before_write', function ($address) {
            if (isset($address->is_default)&&$address->is_default == 1) {
                Address::where(['user_id'=>$address->user_id,'is_default'=>1])->setField('is_default',2);
            }
        });
    }

    public function getGenderAttr($value)
    {
        $status = [1=>'male',2=>'female'];
        return $status[$value];
    }
}
