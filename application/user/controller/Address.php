<?php

namespace app\user\controller;

use app\common\model\Address as AddressModel;
use app\common\model\User as UserModel;
use think\Controller;
use think\Request;
use think\Loader;

class Address extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $address = UserModel::find(session('user.id'))->address()->select();
        return view('address_index',['address'=>$address]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        if (UserModel::find(session('user.id'))->address()->count()>=5) fail('You cannot have more than 5 addresses',5000,url('/user/auth/index'));
        return view('address_create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if (UserModel::find(session('user.id'))->address()->count()>=5) fail("You can't have more than 5 addresses",5000,url('/user/auth/index'));
        if ($request->isPost()){
            $data = $request->post();

            $va = Loader::validate('Address');
            if(!$va->scene('create')->check($data)) fail($va->getError());
            $data['user_id'] = session('user.id');
            $address = UserModel::find(session('user.id'))->address()->save($data);
            if ($address) win('Sucess', url('/user/address/index'));
        }
        fail('fail');
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $address = UserModel::find(session('user.id'))->address()->find($id);
        return view('address_edit',['address'=>$address]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isPost()){
            $data = $request->post();
            $va = Loader::validate('Address');
            if(!$va->scene('update')->check($data)) fail($va->getError());
            $data['user_id'] = session('user.id');
            $address = UserModel::find(session('user.id'))
                ->address()
                ->find($id)
                ->update($data);
            if ($address) win('Sucess', url('/user/address/index'));
        }
        fail('fail');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $res = UserModel::find(session('user.id'))->address()->find($id)->delete();
        if ($res){
            win('Sucess', url('/user/address/index'));
        }
        fail('fail');
    }
}
