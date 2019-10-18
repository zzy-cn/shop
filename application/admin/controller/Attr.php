<?php

namespace app\admin\controller;

use app\admin\model\Type;
use think\Controller;
use think\Request;

class Attr extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function show()
    {
        $type_id=input("type_id");
//        if($type_id == null){
//            $type=Type::all();
//            foreach($type as $key=>$val){
//                return $type=$val;
//            }
//            $attr=\app\admin\model\Attr::all();
//        }else{
            $type=Type::get($type_id);
            $attr=$type->attr;
//        }
        return view("",["type"=>$type,"attr"=>$attr,"type_id"=>$type_id]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        if(request()->isGet()){
            $type_id=input("type_id");
            //需要获取所有的类型名称
            $type=Type::all();
            return view("",["type"=>$type,'type_id'=>$type_id]);
        }
        if(request()->isPost()){

        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */


    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
