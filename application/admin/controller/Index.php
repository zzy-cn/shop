<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Index extends Common
{
    public function index(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){

        }
    }
}
