<?php

namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $table='sp_users';
    protected $createTime = true;
    protected $updateTime = false;
    
    public function address(){
        return $this->hasMany('Address','user_id');
    }

    public function order(){
        return $this->hasMany('Order','user_id');
    }
}
