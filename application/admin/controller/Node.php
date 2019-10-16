<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Node extends Controller
{
    public function show(){
        if(request()->isGet()){
            $node=new \app\admin\model\Node();
            $node=$node->nodeTree();
            return view("",['node'=>$node]);
        }
    }
    public function add(){
        if(request()->isGet()){
            $node=new \app\admin\model\Node();
            $node=$node->nodeTree();
            return view("",['node'=>$node]);
        }
        if(request()->isPost()){
            $data=request()->post();
            $node=new \app\admin\model\Node();
            $res=$node->save($data);
            if($res){
                $this->success("添加权限成功","show");
            }else{
                $this->error("添加权限失败");
            }
        }
    }

}
