<?php

namespace app\admin\controller;

use app\admin\service\TypeService;
use think\Controller;
use think\Request;

class Type extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function show()
    {
        $type=new TypeService();
        $type=$type->getType();
        return view("",["type"=>$type]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $data=request()->post();
            $type=new \app\admin\model\Type();
            if($type->save($data)){
                $this->success("添加类型成功","show");
            }else{
                $this->error("添加类型失败");
            }
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function getGroup(){
        $type_id=request()->post("type_id");
        $type1=\app\admin\model\Type::where('type_id',$type_id)->value('group_name');
        $type=explode(",",$type1);
        if($type1){
            echo json_encode(["status"=>1,"message"=>"ok","data"=>$type]);
        }else{
            echo json_encode(["status"=>0,"message"=>"没有查到相关数据"]);
        }
    }


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
