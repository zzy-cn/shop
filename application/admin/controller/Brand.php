<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Brand extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function show()
    {
        $brand=\app\admin\model\Brand::all();
        return view("",["brand"=>$brand]);
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
            // 获取表单上传文件 例如上传了001.jpg
            $brand_logo_name= request()->file('brand_logo');
            // 移动到框架应用根目录/uploads/ 目录下
            $info = $brand_logo_name->validate(['size'=>3567800,'ext'=>'jpg,png,gif,jpeg'])
                ->move( '../public/static/uplodes/brand');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $brand_logo_name=$info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $brand_logo_name->getError();
            }
            $data['brand_logo']=$brand_logo_name;
            if((new \app\admin\model\Brand())->save($data)){
                $this->success("添加品牌成功","show");
            }else{
                $this->error("添加品跑失败");
            }

        }


    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
