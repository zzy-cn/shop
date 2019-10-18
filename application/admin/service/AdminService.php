<?php
namespace app\admin\service;
use app\admin\model\Admin;
use app\admin\model\AdminRole;
use app\admin\model\Node;
use app\admin\model\Role;
use think\facade\Session;
class AdminService{
    //取得所有权限,控制器，方法
    public function getNodeByAdminId($admin_id){
        $adminrole=new AdminRole();
        //根据admin_id 取role_id
        $role_id=$adminrole->where("admin_id",$admin_id)->column("role_id");
        //根据role_id 取所有角色
        $roleModel=new Role();
        $role=$roleModel->all($role_id);
        //取得角色所对应的权限
        $mynode=[];
        foreach($role as $key=>$val){
            $mynode=array_merge($mynode,$val->node->toArray());
        }
        //取得控制器和方法
        $myaccess=[];
        foreach($mynode as $key=>$val){
            array_push($myaccess,ucfirst(strtolower($val["node_controller"]))."/".strtolower($val["node_action"]));
        }
        $myaccess=array_unique($myaccess);
        return $myaccess;
    }
    //取左侧菜单
    public function getMenu(){
        //取当前用户
        $admin_name=Session::get("admin")["admin_name"];
        //判断是否为超级管理员,如果是就显示所有,如果不是就显示自己所拥有的
        if(in_array($admin_name,config("web.super_admin"))){
            $menu=(new Node())->where("node_ismenu",1)->select()->toArray();
        }else{
            //取当前用户id
            $admin_id=Session::get("admin")["admin_id"];
            $adminModel=new Admin();
            $admin=$adminModel->get($admin_id);
            foreach($admin->role as $key=>$val){
                foreach($val->node->toArray() as $k=>$v){
                    if(($v["node_ismenu"])==1){
                        $menu[]=$v;
                    }
                }
            }
        }
        return $menu;
    }
    //分级展示
    public function getMenuTree($menu,$pid=0){
        $menuTree=[];
        foreach($menu as $key=>$val){
            if($val["node_pid"]==$pid){
                if($son=$this->getMenuTree($menu,$val["node_id"])){
                    $val["son"]=$son;
                }
                $menuTree[]=$val;
            }
        }
        return $menuTree;
    }



}