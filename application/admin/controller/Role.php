<?php
namespace app\admin\controller;
use app\admin\model\Node;
use think\Controller;
use think\Db;
class Role extends Controller
{
    public function show(){
        if(request()->isGet()){
            $data=new \app\admin\model\Role();
            $data=$data->allRole();
            return view("",['data'=>$data]);
        }
    }
    public function add(){
        if(request()->isGet()){
            $data=new Node();
            $data=$data->nodeTree();
            return view("",['data'=>$data]);
        }
        if(request()->isPost()){
            $data=request()->post();

        }
    }

}
