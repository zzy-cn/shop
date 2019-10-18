<?php
namespace app\admin\controller;
use app\admin\model\Role;
use think\Db;
use think\facade\Request;
use think\Controller;
class Admin extends Common
{
    public function show(){
            $admin=(new \app\admin\model\Admin())->all();
            return view("",['admin'=>$admin]);
    }
    public function add(){
        if(request()->isGet()){
            $role=(new Role())->all();
            return view('',["role"=>$role]);
        }
        if(request()->isPost()){
            $adminModel=new \app\admin\model\Admin();
            $adminModel->admin_name=request()->post("admin_name");
            $adminModel->admin_sult=$admin_sult=substr(uniqid(),-4);
            $adminModel->admin_pwd=md5(md5(request()->post("admin_pwd")).$admin_sult);
            $adminModel->admin_add_time=time();
            $adminModel->save();
            $adminModel->role()->saveAll(request()->post("role_id/a"));
            $this->success("添加管理员成功",'show');
        }
    }
}
