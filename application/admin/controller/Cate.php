<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Cate extends Common
{
    public function show(){
        if(request()->isGet()){
            $cate=new \app\admin\model\Cate();
            $data=$cate->cateTree();
            return view("",['data'=>$data]);
        }
        if(request()->isPost()){
        }
    }
    public function add(){
        if(request()->isGet()){
            $cate=new \app\admin\model\Cate();
            $data=$cate->cateTree();
            return view("",['data'=>$data]);
        }
        if(request()->isPost()){
            $data=request()->post();
            $res=Db::name("cate")->insert($data);
            if($res){
                $this->success("添加成功","show");
            }else{
                $this->error("网络异常");
            }
        }
    }

}
