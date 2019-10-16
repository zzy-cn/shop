<?php
namespace app\admin\controller;
use think\Db;
use think\facade\Request;
class Admin extends Common
{
    public function show(){
        if(request()->isGet()){
            $admin=new \app\admin\model\Admin();
            $data=$admin->allAdmin();
            return view("",['data'=>$data]);
        }
    }
    public function add(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $admin=Request::except('admin_repwd','post');
            $admin['admin_add_time']=time();
            $data=new \app\admin\model\Admin();
            $res=$data->add($admin);
            if($res){
                $this->success("添加管理员成功","show");
            }else{
                $this->error("添加失败");
            }
        }
    }
}
